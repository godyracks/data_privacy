<?php

namespace App\Controllers;

use App\Models\TestimonialsModel;

class Home extends BaseController
{
    public function index(): string
    {
        $model = new TestimonialsModel();
        $data['testimonials'] = $model->getTestimonialsWithImages();
        
        return view('homeview', $data);
    }
}
