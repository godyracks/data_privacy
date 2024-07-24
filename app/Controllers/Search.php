<?php
namespace App\Controllers;

use App\Models\DocumentModel;
use App\Models\CaseStudyModel;

class Search extends BaseController
{
    public function index()
    {
        // Load models
        $documentModel = new DocumentModel();
        $caseStudyModel = new CaseStudyModel();

        // Fetch data
        $documents = $documentModel->findAll();
        $caseStudies = $caseStudyModel->findAll();

        // Pass data to view
        return view('searchview', [
            'documents' => $documents,
            'caseStudies' => $caseStudies
        ]);
    }
}
