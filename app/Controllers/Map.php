<?php

namespace App\Controllers;

use App\Models\LawModel;
use App\Models\CaseStudyModel;
use App\Models\ResourceModel;

class Map extends BaseController
{
    public function index()
    {
        // Fetch laws from the database
        $lawModel = new LawModel();
        $laws = $lawModel->getLaws(6); // Limit to 6 laws

        // Fetch case studies from the database
        $caseStudyModel = new CaseStudyModel();
        $ukCaseStudies = $caseStudyModel->where('CountryID', 1)->findAll(); // UK case studies
        $indiaCaseStudies = $caseStudyModel->where('CountryID', 2)->findAll(); // India case studies

        // Fetch resources from the database
        $resourceModel = new ResourceModel();
        $ukResources = $resourceModel->where('CountryID', 1)->findAll(); // UK resources
        $indiaResources = $resourceModel->where('CountryID', 2)->findAll(); // India resources

        // Pass the laws, case studies, and resources to the view
        return view('mapview', [
            'laws' => $laws,
            'ukCaseStudies' => $ukCaseStudies,
            'indiaCaseStudies' => $indiaCaseStudies,
            'ukResources' => $ukResources,
            'indiaResources' => $indiaResources,
        ]);
    }
}
