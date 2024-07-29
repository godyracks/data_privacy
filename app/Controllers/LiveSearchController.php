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

        $processedResults = [];
        foreach ($results as $result) {
            $contentParts = explode('###', $result['Content']);
            $title = $contentParts[0] ?? '';
            $firstLine = isset($contentParts[1]) ? explode('.', strip_tags($contentParts[1]))[0] . '.' : '';

            // Check if the query is in the title or the rest of the content
            if (stripos($title, $query) !== false || (isset($contentParts[1]) && stripos($contentParts[1], $query) !== false)) {
                $processedResults[] = [
                    'title' => $title,
                    'content' => $firstLine,
                ];
            }
        }

        return $this->response->setJSON($processedResults);
    }
}
