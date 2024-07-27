<?php

namespace App\Helpers;

use App\Models\DocumentModel;

if (!function_exists('getdocumentById')) {
    function getdocumentById($id)
    {
        $documentModel = new DocumentModel();
        return $documentModel->find($id);
    }
}
