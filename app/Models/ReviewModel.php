<?php namespace App\Models;

use CodeIgniter\Model;

class ReviewModel extends Model
{
    protected $table = 'reviews';
    protected $primaryKey = 'id';

    protected $allowedFields = ['user_id', 'content', 'rating'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
}
