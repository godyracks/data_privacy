<?php
namespace App\Controllers;

use App\Models\CountryModel;
use App\Models\LawModel;
use App\Models\DocumentModel;
use App\Models\CaseStudyModel;
use App\Models\ResourceModel;
use App\Models\SearchIndexModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $countryModel = new CountryModel();
        $data['countries'] = $countryModel->findAll();
        return view('dashboardview', $data);
    }

    public function addCountry()
    {
        $countryModel = new CountryModel();
        $data = [
            'CountryName' => $this->request->getPost('CountryName'),
            'CountryCode' => $this->request->getPost('CountryCode')
        ];
        $countryModel->save($data);
        return redirect()->to('/dashboard');
    }

    public function addLaw()
    {
        $lawModel = new LawModel();
        
        // Ensure uploads directory and subdirectory exist
        $uploadPath = ROOTPATH . 'uploads/laws';
        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        // Handle file upload
        $image = $this->request->getFile('Image');
        if ($image && $image->isValid() && !$image->hasMoved()) {
            $newName = $image->getRandomName();
            $image->move($uploadPath, $newName);
            $imagePath = 'uploads/laws/' . $newName;
        } else {
            $imagePath = null;
        }

        $data = [
            'CountryID' => $this->request->getPost('CountryID'),
            'LawName' => $this->request->getPost('LawName'),
            'Description' => $this->request->getPost('Description'),
            'KeyProvisions' => $this->request->getPost('KeyProvisions'),
            'Date' => $this->request->getPost('Date'),
            'Image' => $imagePath
        ];
        $lawModel->save($data);
        return redirect()->to('/dashboard');
    }

    public function addDocument()
    {
        $documentModel = new DocumentModel();
        
        // Ensure uploads directory and subdirectory exist
        $uploadPath = ROOTPATH . 'uploads/documents';
        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        // Handle file upload
        $image = $this->request->getFile('Image');
        if ($image && $image->isValid() && !$image->hasMoved()) {
            $newName = $image->getRandomName();
            $image->move($uploadPath, $newName);
            $imagePath = 'uploads/documents/' . $newName;
        } else {
            $imagePath = null;
        }

        $data = [
            'CountryID' => $this->request->getPost('CountryID'),
            'DocumentName' => $this->request->getPost('DocumentName'),
            'Description' => $this->request->getPost('Description'),
            'Type' => $this->request->getPost('Type'),
            'Date' => $this->request->getPost('Date'),
            'Image' => $imagePath
        ];
        $documentModel->save($data);
        return redirect()->to('/dashboard');
    }

    public function addCaseStudy()
    {
        $caseStudyModel = new CaseStudyModel();
        
        // Ensure uploads directory and subdirectory exist
        $uploadPath = ROOTPATH . 'uploads/case_studies';
        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        // Handle file upload
        $image = $this->request->getFile('Image');
        if ($image && $image->isValid() && !$image->hasMoved()) {
            $newName = $image->getRandomName();
            $image->move($uploadPath, $newName);
            $imagePath = 'uploads/case_studies/' . $newName;
        } else {
            $imagePath = null;
        }

        $data = [
            'CountryID' => $this->request->getPost('CountryID'),
            'Title' => $this->request->getPost('Title'),
            'Summary' => $this->request->getPost('Summary'),
            'Date' => $this->request->getPost('Date'),
            'Image' => $imagePath
        ];
        $caseStudyModel->save($data);
        return redirect()->to('/dashboard');
    }

    public function addResource()
    {
        $resourceModel = new ResourceModel();
        
        // Ensure uploads directory and subdirectory exist
        $uploadPath = ROOTPATH . 'uploads/resources';
        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        // Handle file upload
        $image = $this->request->getFile('Image');
        if ($image && $image->isValid() && !$image->hasMoved()) {
            $newName = $image->getRandomName();
            $image->move($uploadPath, $newName);
            $imagePath = 'uploads/resources/' . $newName;
        } else {
            $imagePath = null;
        }

        $data = [
            'CountryID' => $this->request->getPost('CountryID'),
            'Title' => $this->request->getPost('Title'),
            'Type' => $this->request->getPost('Type'),
            'URL' => $this->request->getPost('URL'),
            'Date' => $this->request->getPost('Date'),
            'Image' => $imagePath
        ];
        $resourceModel->save($data);
        return redirect()->to('/dashboard');
    }

    public function addSearchIndex()
    {
        $searchIndexModel = new SearchIndexModel();
        $data = [
            'Type' => $this->request->getPost('Type'),
            'ReferenceID' => $this->request->getPost('ReferenceID'),
            'Content' => $this->request->getPost('Content')
        ];
        $searchIndexModel->save($data);
        return redirect()->to('/dashboard');
    }

    // Add similar methods for editing, deleting, and retrieving data as needed
}
