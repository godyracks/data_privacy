<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\TestimonialsModel;

class Testimonials extends Controller
{
    public function index()
    {
        $session = session();

        // Check if user is logged in by checking session variables
        if ($session->has('google_id') && $session->has('username')) {
            // User is logged in, render the testimonials view
            return view('testimonialsview');
        } else {
            // User is not logged in, render the testimonials view with a prompt to log in
            return view('testimonialsview', [
                'login_prompt' => 'You need to <a href="' . site_url('/google-login') . '">Continue with Google</a> to submit a testimonial.'
            ]);
        }
    }

  
    public function submitTestimonial()
    {
        $session = session();
    
        // Check if user is logged in
        if (!$session->get('isLoggedIn')) {
            return redirect()->to('/auth'); // Redirect to login if not logged in
        }
    
        $model = new TestimonialsModel();
    
        // Get user data from session
        $userData = $session->get('userData');
        
        // Check if user data is available
        if (!$userData || !isset($userData['google_id']) || !isset($userData['username'])) {
            log_message('error', 'User data not found in session.');
            return redirect()->back()->with('error', 'Unable to retrieve user data.');
        }
    
        // Prepare data for insertion
        $data = [
            'user_id' => $userData['google_id'],
            'username' => $userData['username'],
            'stars' => $this->request->getPost('stars'),
            'review' => $this->request->getPost('review'),
        ];
    
        // Log data being inserted
        log_message('debug', 'Testimonial Data: ' . print_r($data, true));
    
        // Insert data into the database
        if ($model->insert($data)) {
            log_message('info', 'Testimonial successfully inserted.');
            return redirect()->to('/testimonials')->with('success', 'Your review has been submitted successfully.');
        } else {
            // Log any database errors
            $errors = $model->errors();
            log_message('error', 'Insert Error: ' . print_r($errors, true));
            return redirect()->back()->with('error', 'Unable to submit your review. Please try again.');
        }
    }
    
    
    
}