<?php
namespace App\Controllers;

use App\Models\LawModel;

class Map extends BaseController
{
    public function index()
    {
        // Fetch laws from the database
        $lawModel = new LawModel();
        $laws = $lawModel->getLaws(6); // Limit to 6 laws

        // Pass the laws to the view
        return view('mapview', ['laws' => $laws]);
    }
}
