<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function index()
    {
        return view('loginview');
    }

    public function logout()
    {
        // Start the session
        $session = session();
        
        // Destroy the session
        $session->destroy();
        
        // Redirect to the login page with a success message
        return redirect()->to('/auth')->with('success', 'You have been logged out successfully.');
    }
}
