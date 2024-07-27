<?php
namespace App\Controllers;

use App\Models\FavoritesModel;
use App\Models\CaseStudyModel;
use App\Models\DocumentModel;

class Profile extends BaseController
{
    public function index()
    {
        $favoritesModel = new FavoritesModel();
        $caseStudyModel = new CaseStudyModel();
        $documentModel = new DocumentModel();
    
        $googleId = session()->get('google_id');
    
        // Debugging output for user ID
       // log_message('debug', 'User ID from session: ' . $googleId);
        
        if (!$googleId) {
            log_message('error', 'No user ID found in session');
            return view('profileview', [
                'favorites' => [],
            ]);
        }
    
        $favorites = $favoritesModel->where('user_id', $googleId)->findAll();
    
        // Debugging output for favorites
       // log_message('debug', 'Favorites for user ' . $googleId . ': ' . print_r($favorites, true));
    
        // Prepare favorite details
        foreach ($favorites as &$favorite) {
            if ($favorite['post_type'] === 'case-study') {
                $favorite['details'] = $caseStudyModel->find($favorite['post_id']);
            } elseif ($favorite['post_type'] === 'document') {
                $favorite['details'] = $documentModel->find($favorite['post_id']);
            }
        }
    
        // Log the prepared favorites with details
      //  log_message('debug', 'Prepared favorites with details: ' . print_r($favorites, true));
    
        return view('profileview', [
            'favorites' => $favorites,
        ]);
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
    public function deleteFavorite($postId, $postType)
    {
        // Assume you have a model for favorites
        $favoriteModel = new FavoritesModel();
    
        // Perform the deletion based on your database structure
        $result = $favoriteModel->deleteFavorite($postId, $postType);
    
        if ($result) {
            // Redirect back to the profile page with a success message
            return redirect()->to('/profile')->with('message', 'Favorite deleted successfully.');
        } else {
            // Handle failure
            return redirect()->to('/profile')->with('error', 'Could not delete favorite.');
        }
    }
    
    
}
