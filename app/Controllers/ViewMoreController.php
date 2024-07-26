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

        $reviewModel = new ReviewModel();
        $reviews = $reviewModel->where('id', $contentID)->findAll();

        $expectedTitle = url_title($content['Title'] ?? $content['DocumentName'] ?? $content['LawName'] ?? '', '-', true);
        if ($title !== $expectedTitle) {
            return redirect()->to(site_url('view-more/' . $type . '/' . $id . '/' . $expectedTitle));
        }

        return view('viewmoreview', [
            'content' => $content,
            'type' => $type,
            'similarPosts' => $similarPosts,
            'reviews' => $reviews,
            'contentID' => $contentID,
        ]);
    }

    public function submitReview()
{
    $reviewModel = new ReviewModel();

    // Debugging: Check if the user is logged in
    if (!session()->get('isLoggedIn')) {
        log_message('error', 'User not logged in.');
        return redirect()->to('/google-login')->with('warning', 'Please log in to submit a review.');
    }

    // Debugging: Check the session data
    log_message('debug', 'Session Data: ' . json_encode(session()->get()));

    $userID = session()->get('userData')['id'];
    if (!$userID) {
        log_message('error', 'User ID not found in session.');
        return redirect()->back()->with('error', 'User not found.');
    }

    $reviewText = $this->request->getPost('review_text');
    $rating = $this->request->getPost('rating');

    // Debugging: Check if the form data is received
    log_message('debug', "User ID: " . $userID);
    log_message('debug', "Review Text: " . $reviewText);
    log_message('debug', "Rating: " . $rating);

    if (!$reviewText || !$rating) {
        log_message('error', 'Review text or rating is missing.');
        return redirect()->back()->with('error', 'Review text or rating is missing.');
    }

    $reviewData = [
        'user_id' => $userID,
        'content' => $reviewText,
        'rating' => $rating,
    ];

    if ($reviewModel->insert($reviewData)) {
        log_message('debug', 'Review inserted successfully.');
        return redirect()->back()->with('success', 'Review submitted successfully.');
    } else {
        log_message('error', 'Failed to insert review.');
        return redirect()->back()->with('error', 'Failed to submit review.');
    }
}

    
}
