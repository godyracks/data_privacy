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

        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/google-login')->with('warning', 'Please log in to submit a review.');
        }

        $userID = session()->get('user_id');
        if (!$userID) {
            return redirect()->back()->with('error', 'User not found.');
        }

        $reviewData = [
            'user_id' => $userID,
            'content' => $this->request->getPost('review_text'),
            'rating' => $this->request->getPost('rating'),
        ];

        if ($reviewModel->insert($reviewData)) {
            return redirect()->back()->with('success', 'Review submitted successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to submit review.');
        }
    }
}
