<?php
namespace App\Models;

use CodeIgniter\Model;

class ReviewModel extends Model
{
    protected $table = 'reviews';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'content', 'rating', 'post_id', 'post_type', 'created_at'];

     // Disable automatic timestamp handling for updated_at
     protected $useTimestamps = true;
     protected $createdField  = 'created_at';
     protected $updatedField  = ''; // Disable updated_at

    // Method to get reviews by post ID and post type
    public function getReviewsByPost($postId, $postType)
    {
        return $this->where('post_id', $postId)
                    ->where('post_type', $postType)
                    ->findAll();
    }
}


   

