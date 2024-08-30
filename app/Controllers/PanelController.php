<?php
namespace App\Controllers;

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

        // Function to hyphenate titles
        $hyphenateTitle = function($title) {
            return strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', trim($title)));
        };

        // Hyphenate law titles and case study titles
        foreach ($laws as &$law) {
            $law['HyphenatedTitle'] = $hyphenateTitle($law['LawName']);
        }
        foreach ($caseStudies as &$caseStudy) {
            $caseStudy['HyphenatedTitle'] = $hyphenateTitle($caseStudy['Title']);
        }

        // Send the results as JSON
        return $this->response->setJSON([
            'laws' => $laws,
            'caseStudies' => $caseStudies
        ]);
    }
}
