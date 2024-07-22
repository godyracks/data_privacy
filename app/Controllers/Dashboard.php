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
        $data = [
            'CountryID' => $this->request->getPost('CountryID'),
            'LawName' => $this->request->getPost('LawName'),
            'Description' => $this->request->getPost('Description'),
            'KeyProvisions' => $this->request->getPost('KeyProvisions')
        ];
        $lawModel->save($data);
        return redirect()->to('/dashboard');
    }

    public function addDocument()
    {
        $documentModel = new DocumentModel();
        $data = [
            'CountryID' => $this->request->getPost('CountryID'),
            'DocumentName' => $this->request->getPost('DocumentName'),
            'Description' => $this->request->getPost('Description'),
            'Type' => $this->request->getPost('Type'),
            'Date' => $this->request->getPost('Date')
        ];
        $documentModel->save($data);
        return redirect()->to('/dashboard');
    }

    public function addCaseStudy()
    {
        $caseStudyModel = new CaseStudyModel();
        $data = [
            'CountryID' => $this->request->getPost('CountryID'),
            'Title' => $this->request->getPost('Title'),
            'Summary' => $this->request->getPost('Summary'),
            'Date' => $this->request->getPost('Date')
        ];
        $caseStudyModel->save($data);
        return redirect()->to('/dashboard');
    }

    public function addResource()
    {
        $resourceModel = new ResourceModel();
        $data = [
            'CountryID' => $this->request->getPost('CountryID'),
            'Title' => $this->request->getPost('Title'),
            'Type' => $this->request->getPost('Type'),
            'URL' => $this->request->getPost('URL')
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
