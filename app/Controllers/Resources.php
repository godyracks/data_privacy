<?php
namespace App\Controllers;

use App\Models\ResourceModel;

class Resources extends BaseController
{
    public function index()
    {
        $resourceModel = new ResourceModel();
        $resources = $resourceModel->findAll();

        return view('resourcesview', ['resources' => $resources]);
    }
}
