<?php
namespace App\Models;

use CodeIgniter\Model;
use App\Models\UserModel;

class TestimonialsModel extends Model
{
    protected $table = 'testimonials';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'username', 'stars', 'review'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at'; 
    protected $updatedField = 'updated_at';

    // Method to get testimonials with user profile images
    public function getTestimonialsWithImages()
    {
        // Initialize UserModel
        $userModel = new UserModel();
        
       // Fetch all testimonials ordered by created_at in descending order
       $testimonials = $this->orderBy('created_at', 'DESC')->findAll();
    
        // Add profile image and email to each testimonial
        foreach ($testimonials as &$testimonial) {
            $user = $userModel->where('google_id', $testimonial['user_id'])->first();
    
            // If user exists, add profile image and email to the testimonial
            if ($user) {
                $testimonial['profile_image'] = $user['profile_image'];
                $testimonial['email'] = $user['email'];
            } else {
                // If no user found, set them to null
                $testimonial['profile_image'] = null;
                $testimonial['email'] = null;
            }
        }
    
        return $testimonials;
    }
    
}