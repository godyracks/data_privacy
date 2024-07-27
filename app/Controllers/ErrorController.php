<?php
namespace App\Controllers;

class ErrorController extends BaseController
{
    public function index()
    {
        $data['error'] = session()->getFlashdata('error');
        return view('error_view', $data);
    }
}
