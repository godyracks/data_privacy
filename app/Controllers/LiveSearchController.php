<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\SearchIndexModel;

class LiveSearchController extends Controller
{
    public function search()
    {
        // Fetch the query parameter from the request
        $query = $this->request->getVar('query');

        // Instantiate the search model and search for the query
        $searchModel = new SearchIndexModel();
        $results = $searchModel->like('Content', $query)->findAll();

        // Initialize an array to hold processed search results
        $processedResults = [];

        // Iterate through the search results
        foreach ($results as $result) {
            // Split content at '###' delimiter
            $contentParts = explode('###', $result['Content']);

            // Get the title (first part of the content)
            $title = $contentParts[0] ?? '';

            // Get the first sentence after stripping HTML tags (second part of the content)
            $firstLine = isset($contentParts[1]) ? explode('.', strip_tags($contentParts[1]))[0] . '.' : '';

            // Check if the query exists in the title or content
            if (stripos($title, $query) !== false || (isset($contentParts[1]) && stripos($contentParts[1], $query) !== false)) {
                // Append the processed result to the array
                $processedResults[] = [
                    'title' => $title,
                    'content' => $firstLine,
                ];
            }
        }

        // Return the processed results as JSON response
        return $this->response->setJSON($processedResults);
    }
}
