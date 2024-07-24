<?php 
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'email', 'password', 'is_email_verified', 'verification_code', 'google_id', 'profile_image'];

    // Add other model methods as needed
}