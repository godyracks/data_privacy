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

    // Method to get testimonials with user profile images
    public function getTestimonialsWithImages()
    {
        // Initialize UserModel
        $userModel = new UserModel();
        
        // Fetch all testimonials
        $testimonials = $this->findAll();

        // Add profile image to each testimonial
        foreach ($testimonials as &$testimonial) {
            $user = $userModel->getProfileImage($testimonial['user_id']);
            $testimonial['profile_image'] = $user ? $user['profile_image'] : null;
        }

        return $testimonials;
    }
}
