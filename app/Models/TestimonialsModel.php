<?php
namespace App\Models;

use CodeIgniter\Model;

class TestimonialsModel extends Model
{
    protected $table = 'testimonials';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'username', 'stars', 'review'];
    protected $useTimestamps = true;

    // Optionally, you can define validation rules here
}
