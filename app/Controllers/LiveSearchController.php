<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\SearchIndexModel;

class LiveSearchController extends Controller
{
    public function search()
    {
        $query = $this->request->getVar('query');

        $searchModel = new SearchIndexModel();
        $results = $searchModel->like('Content', $query)->findAll();

        // Process results to handle delimited content
        foreach ($results as &$result) {
            // Split content using the delimiter
            $result['Content'] = $this->processContent($result['Content']);
        }

        return $this->response->setJSON($results);
    }

    private function processContent($content)
    {
        // Split content using the delimiter
        $parts = explode('###', $content);
        
        // Ensure we have at least one part
        if (count($parts) > 1) {
            // Extract different parts of the content
            $contentText = $parts[0];
            $videoUrl = $parts[1] ?? '';
            $imageUrl = $parts[2] ?? '';
            $date = $parts[3] ?? '';

            return [
                'text' => $contentText,
                'videoUrl' => $videoUrl,
                'imageUrl' => $imageUrl,
                'date' => $date
            ];
        }

        return ['text' => $content];
    }
}
