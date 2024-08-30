<?php
namespace App\Controllers;

use App\Models\CountryModel;
use App\Models\LawModel;
use App\Models\CaseStudyModel;
use CodeIgniter\Controller;

class PanelController extends Controller
{
    public function index()
    {
        // Render the initial view with buttons for country selection
        return view('/partials/_info-panel');
    }

    public function fetchLawsAndCaseStudies($countryId)
    {
        // Models
        $lawModel = new LawModel();
        $caseStudyModel = new CaseStudyModel();

        // Fetch laws and case studies based on the selected country
        $laws = $lawModel->where('CountryID', $countryId)->findAll();
        $caseStudies = $caseStudyModel->where('CountryID', $countryId)->findAll();

        // Send the results as JSON
        return $this->response->setJSON([
            'laws' => $laws,
            'caseStudies' => $caseStudies
        ]);
    }
}
