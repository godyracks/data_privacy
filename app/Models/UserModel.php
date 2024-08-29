<?php
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'email', 'password', 'is_email_verified', 'verification_code', 'google_id', 'profile_image'];

    // Method to get profile image by google_id
    public function getProfileImage($google_id)
    {
        return $this->where('google_id', $google_id)
                    ->first(); // Fetches the first row that matches
    }
}
