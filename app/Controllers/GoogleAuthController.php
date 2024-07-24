<?php 
namespace App\Controllers;

use App\Libraries\GoogleApi;
use App\Models\UserModel;
use CodeIgniter\Controller;

class GoogleAuthController extends Controller
{
    protected $googleApi;

    public function __construct()
    {
        $this->googleApi = new GoogleApi();
    }

    public function login()
    {
        return redirect()->to($this->googleApi->getLoginUrl());
    }

    public function callback()
    {
        $code = $this->request->getGet('code');
        
        if ($code) {
            $token = $this->googleApi->authenticate($code);
            $userInfo = $this->googleApi->getUserInfo();

            $googleId = $userInfo['id'];
            $email = $userInfo['email'];
            $username = $userInfo['name'];
            $profileImage = $userInfo['picture'];

            // Check if user already exists
            $userModel = new UserModel();
            $existingUser = $userModel->where('google_id', $googleId)->orWhere('email', $email)->first();

            if ($existingUser) {
                // User exists, log them in
                $session = session();
                $session->set('isLoggedIn', true);
                $session->set('userData', $existingUser);

                return redirect()->to('/profile');
            } else {
                // User does not exist, create a new user
                $userData = [
                    'username' => $username,
                    'email' => $email,
                    'google_id' => $googleId,
                    'profile_image' => $profileImage,
                    'is_email_verified' => true // Assuming Google authenticated users are verified
                ];
                $userModel->save($userData);

                // Log the new user in
                $newUser = $userModel->where('google_id', $googleId)->first();
                $session = session();
                $session->set('isLoggedIn', true);
                $session->set('userData', $newUser);

                return redirect()->to('/profile');
            }
        }

        return redirect()->to('/');
    }
}