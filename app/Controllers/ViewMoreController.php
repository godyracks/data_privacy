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

        switch ($type) {
            case 'case-study':
                $model = new CaseStudyModel();
                $content = $model->find($id);
                if ($content) {
                    $similarPosts = $model->getSimilarCaseStudies($id);
                }
                break;

            case 'document':
                $model = new DocumentModel();
                $content = $model->find($id);
                if ($content) {
                    $similarPosts = $model->getSimilarDocuments($content['CountryID'], $id);
                }
                break;

            case 'law':
                $model = new LawModel();
                $content = $model->find($id);
                if ($content) {
                    $similarPosts = $model->where('CountryID', $content['CountryID'])
                                          ->where('LawID !=', $id)
                                          ->findAll(5);
                }
                break;

            case 'resource':
                $model = new ResourceModel();
                $content = $model->find($id);
                if ($content) {
                    $similarPosts = $model->where('CountryID', $content['CountryID'])
                                          ->where('ResourceID !=', $id)
                                          ->findAll(5);
                }
                break;

            default:
                throw new PageNotFoundException("Content type not found: " . $type);
        }

        if (!$content) {
            throw new PageNotFoundException("Content not found with ID: " . $id);
        }

        $similarPosts = array_filter($similarPosts, function($post) use ($id, $type) {
            $postIdKey = $type === 'case-study' ? 'CaseStudyID' : ($type === 'document' ? 'DocumentID' : ($type === 'law' ? 'LawID' : 'ResourceID'));
            return $post[$postIdKey] != $id;
        });

        $expectedTitle = url_title($content['Title'] ?? $content['DocumentName'] ?? $content['LawName'] ?? '', '-', true);
        if ($title !== $expectedTitle) {
            return redirect()->to(site_url('view-more/' . $type . '/' . $id . '/' . $expectedTitle));
        }

        $reviewModel = new ReviewModel();
        $reviews = $reviewModel->where('content_id', $id) // Adjusted query to use `content_id` for filtering
                               ->findAll();

        return view('viewmoreview', [
            'content' => $content,
            'similarPosts' => $similarPosts,
            'type' => $type,
            'reviews' => $reviews
        ]);
    }

    public function submitReview()
    {
        $reviewModel = new ReviewModel();
        $session = session();
    
        if (!$session->get('isLoggedIn')) {
            $session->set('redirect_url', current_url());
            return redirect()->to('/google-login');
        }
    
        $userId = $session->get('userData')['google_id']; // Ensure this is the correct field from session data
        $reviewText = $this->request->getPost('review_text');
        $rating = $this->request->getPost('rating');
        $contentId = $this->request->getPost('id');
        $contentType = $this->request->getPost('content');
    
        $reviewData = [
            'user_id' => $userId,
            'content' => $reviewText,
            'rating' => $rating,
            'created_at' => date('Y-m-d H:i:s')
        ];
    
        $reviewModel->save($reviewData);
    
        // Redirect back to the original page
        return redirect()->to(site_url('view-more/' . $contentType . '/' . $contentId))->with('message', 'Review submitted successfully.');
    }
}
