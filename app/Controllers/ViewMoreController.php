<?php

namespace App\Controllers;

use App\Models\CaseStudyModel;
use App\Models\DocumentModel;
use App\Models\LawModel;
use App\Models\ResourceModel;
use CodeIgniter\Controller;

class ViewMoreController extends Controller
{
    public function index($type, $id)
    {
        $content = null;
        $similarPosts = [];

        switch ($type) {
            case 'case-study':
                $model = new CaseStudyModel();
                $content = $model->find($id);
                $similarPosts = $model->where('CountryID', $content['CountryID'])
                                      ->where('CaseStudyID !=', $id)
                                      ->findAll(5);
                break;

            case 'document':
                $model = new DocumentModel();
                $content = $model->find($id);
                $similarPosts = $model->where('CountryID', $content['CountryID'])
                                      ->where('DocumentID !=', $id)
                                      ->findAll(5);
                break;

            case 'law':
                $model = new LawModel();
                $content = $model->find($id);
                $similarPosts = $model->where('CountryID', $content['CountryID'])
                                      ->where('LawID !=', $id)
                                      ->findAll(5);
                break;

            case 'resource':
                $model = new ResourceModel();
                $content = $model->find($id);
                $similarPosts = $model->where('CountryID', $content['CountryID'])
                                      ->where('ResourceID !=', $id)
                                      ->findAll(5);
                break;

            default:
                throw new \CodeIgniter\Exceptions\PageNotFoundException("Content type not found: " . $type);
        }

        if (!$content) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Content not found with ID: " . $id);
        }

        return view('viewmoreview', [
            'content' => $content,
            'similarPosts' => $similarPosts,
            'type' => $type
        ]);
    }
}
