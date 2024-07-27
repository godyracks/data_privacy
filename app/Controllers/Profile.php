<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\FavoritesModel;

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

    public function addFavorite() {
        // Check if the request is an AJAX request
        if ($this->request->isAJAX()) {
            $data = json_decode($this->request->getBody(), true);
            $postId = $data['post_id'];
            $postType = $data['post_type'];
            $userId = session()->get('google_id'); // Ensure the user is logged in
    
            // Validate the input (add necessary validation)
            if (!$postId || !$postType || !$userId) {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid data.']);
            }
    
            // Insert into favorites table (adjust according to your table structure)
            $favoriteModel = new FavoritesModel(); // Ensure you have the correct model
            $favoriteData = [
                'user_id' => $userId,
                'post_id' => $postId,
                'post_type' => $postType,
            ];
    
            if ($favoriteModel->insert($favoriteData)) {
                return $this->response->setJSON(['status' => 'success', 'message' => 'Favorite added.']);
            } else {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to add favorite.']);
            }
        }
    
        return $this->response->setStatus(400);
    }
    
}
