<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Profile extends Controller
{
    public function index()
    {
        $session = session();
        
        if (!$session->get('google_id') && !$session->get('user_id')) {
            return redirect()->to('/auth');
        }

        return view('profileview');
    }
}
