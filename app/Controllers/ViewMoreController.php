<?php namespace App\Controllers;

use App\Models\DocumentModel;
use App\Models\CaseStudyModel;
use App\Models\LawModel;
use App\Models\ResourceModel;
use App\Models\ReviewModel;
use CodeIgniter\Controller;
use CodeIgniter\Exceptions\PageNotFoundException;

class ViewMoreController extends Controller
{
    public function index($type, $id, $title = null)
{
    $content = null;
    $similarPosts = [];
    $contentID = null;

    switch ($type) {
        case 'case-study':
            $model = new CaseStudyModel();
            $content = $model->find($id);
            $contentID = $content['CaseStudyID'] ?? null;
            if ($content) {
                $similarPosts = $model->getSimilarCaseStudies($id);
            }
            break;

        case 'document':
            $model = new DocumentModel();
            $content = $model->find($id);
            $contentID = $content['DocumentID'] ?? null;
            if ($content) {
                $similarPosts = $model->getSimilarDocuments($content['CountryID'], $id);
            }
            break;

        case 'law':
            $model = new LawModel();
            $content = $model->find($id);
            $contentID = $content['LawID'] ?? null;
            if ($content) {
                $similarPosts = $model->where('CountryID', $content['CountryID'])
                                      ->where('LawID !=', $id)
                                      ->findAll(5);
            }
            break;

        case 'resource':
            $model = new ResourceModel();
            $content = $model->find($id);
            $contentID = $content['ResourceID'] ?? null;
            if ($content) {
                $similarPosts = $model->where('CountryID', $content['CountryID'])
                                      ->where('ResourceID !=', $id)
                                      ->findAll(5);
            }
            break;

        default:
            throw new PageNotFoundException("Invalid type: $type");
    }

    if (!$content || !$contentID) {
        throw new PageNotFoundException("Content not found");
    }

    // Fetch reviews associated with the current content
    $reviewModel = new ReviewModel();
    $reviews = $reviewModel->where('post_id', $contentID)
                           ->where('post_type', $type) // Use the post type to filter reviews
                           ->findAll();

    $expectedTitle = url_title($content['Title'] ?? $content['DocumentName'] ?? $content['LawName'] ?? '', '-', true);
    if ($title !== $expectedTitle) {
        return redirect()->to(site_url('view-more/' . $type . '/' . $id . '/' . $expectedTitle));
    }

    return view('viewmoreview', [
        'content' => $content,
        'type' => $type,
        'similarPosts' => $similarPosts,
        'reviews' => $reviews, // Pass the filtered reviews to the view
        'contentID' => $contentID,
    ]);
}


public function submitReview()
{
    // Check if the user is logged in
    $session = session();
    if (!$session->get('isLoggedIn')) {
        return redirect()->to('/auth'); // Redirect to login if not logged in
    }

    // Get user data from session
    $userData = $session->get('userData');

    // Prepare review data
    $reviewData = [
        'user_id' => $userData['google_id'], // Use google_id as user_id
        'username' => $userData['username'], // Capture username
        'content' => $this->request->getPost('content'),
        'rating' => $this->request->getPost('rating'),
        'post_id' => $this->request->getPost('post_id'), // Correctly include post_id
        'post_type' => $this->request->getPost('post_type'), // Correctly include post_type
    ];

    // Debugging: Check the data being inserted
  //  log_message('debug', 'Review Data: ' . json_encode($reviewData));

    // Insert review into the database
    $reviewModel = new ReviewModel();
    if ($reviewModel->insert($reviewData) === false) {
        // Debugging: Log any errors that occur
       // log_message('error', 'Review Insertion Error: ' . json_encode($reviewModel->errors()));
        return redirect()->back()->with('error', 'Failed to submit review.'); // Show error message
    }

    // Redirect after successful insertion
    return redirect()->to('/profile')->with('success', 'Review submitted successfully.');
}


    
}
