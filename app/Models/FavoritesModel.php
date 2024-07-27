<?php

namespace App\Models;

use CodeIgniter\Model;

class FavoritesModel extends Model
{
    protected $table = 'Favorites';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'post_id', 'post_type', 'created_at'];

    public function deleteFavorite($postId, $postType)
    {
        // Find the favorite entry based on user_id, post_id, and post_type
        return $this->where(['post_id' => $postId, 'post_type' => $postType])->delete();
    }
}
