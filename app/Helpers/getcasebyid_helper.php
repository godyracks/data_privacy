<?php

namespace App\Helpers;

use App\Models\CaseStudyModel;

if (!function_exists('getcaseStudyById')) {
    function getcaseStudyById($id)
    {
        $caseStudyModel = new CaseStudyModel();
        return $caseStudyModel->find($id);
    }
}
