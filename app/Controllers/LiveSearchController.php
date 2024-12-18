<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\DocumentModel;
use App\Models\CaseStudyModel;
use App\Models\LawModel;

class LiveSearchController extends Controller
{
    public function search()
    {
        $query = $this->request->getVar('query');
        
        $documentModel = new DocumentModel();
        $caseStudyModel = new CaseStudyModel();
        $lawModel = new LawModel();

        // Fetch search results from each model
        $documents = $documentModel->like('DocumentName', $query)->orLike('Description', $query)->findAll(5);
        $caseStudies = $caseStudyModel->like('Title', $query)->orLike('Summary', $query)->findAll(5);
        $laws = $lawModel->like('LawName', $query)->orLike('Description', $query)->findAll(5);

        // Merge results and process them
        $results = [];

        foreach ($documents as $document) {
            $hyphenatedTitle = $this->sanitizeTitle($document['DocumentName']);
            $results[] = [
                'title' => $document['DocumentName'],
                'hyphenated_title' => $hyphenatedTitle,
                'Type' => 'Document',
                'ReferenceID' => $document['DocumentID']
            ];
        }

        foreach ($caseStudies as $caseStudy) {
            $hyphenatedTitle = $this->sanitizeTitle($caseStudy['Title']);
            $results[] = [
                'title' => $caseStudy['Title'],
                'hyphenated_title' => $hyphenatedTitle,
                'Type' => 'Case Study',
                'ReferenceID' => $caseStudy['CaseStudyID']
            ];
        }

        foreach ($laws as $law) {
            $hyphenatedTitle = $this->sanitizeTitle($law['LawName']);
            $results[] = [
                'title' => $law['LawName'],
                'hyphenated_title' => $hyphenatedTitle,
                'Type' => 'Law',
                'ReferenceID' => $law['LawID']
            ];
        }

        return $this->response->setJSON($results);
    }

    private function sanitizeTitle($title)
    {
        // Remove special characters and replace spaces with hyphens
        $title = preg_replace('/[^\w\s-]/', '', $title); // Remove non-alphanumeric characters, except hyphens and spaces
        $title = preg_replace('/\s+/', '-', trim($title)); // Replace spaces with hyphens
        return strtolower($title); // Convert to lowercase
    }
}
