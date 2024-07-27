<?php

namespace App\Models;

use CodeIgniter\Model;

class FavoritesModel extends Model
{
    protected $table = 'Favorites';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'post_id', 'post_type', 'created_at'];
}
