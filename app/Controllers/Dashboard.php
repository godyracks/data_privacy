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
        $session = session();
        if (!$session->get('isLoggedIn') || !$session->get('isAdmin')) {
            return redirect()->to('/error')->with('error', 'You do not have admin privileges.');
        }

        $countryModel = new CountryModel();
        $data['countries'] = $countryModel->findAll();
      
        $lawModel = new LawModel();
        $documentModel = new DocumentModel();
        $caseStudyModel = new CaseStudyModel();
        $resourceModel = new ResourceModel();
    
        $data['countries'] = $countryModel->findAll();
        $data['laws'] = $lawModel->findAll();
        $data['documents'] = $documentModel->findAll();
        $data['caseStudies'] = $caseStudyModel->findAll();
        $data['resources'] = $resourceModel->findAll();
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
        return redirect()->to('/sivasakthi-dashboard');
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
        return redirect()->to('/sivasakthi-dashboard');
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
        return redirect()->to('/sivasakthi-dashboard');
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
        return redirect()->to('/sivasakthi-dashboard');
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
            'Description' => $this->request->getPost('Description'),
            'Date' => $this->request->getPost('Date'),
           'Image' => $imagePath
        ];
        $resourceModel->save($data);
        return redirect()->to('/sivasakthi-dashboard');
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
        return redirect()->to('/sivasakthi-dashboard');
    }

    public function editLaw($id)
    {
        $lawModel = new LawModel();
        $data['law'] = $lawModel->find($id);
        return view('edit_law_view', $data);
    }
    public function updateLaw($id)
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
            $imagePath = $this->request->getPost('existingImage'); // Keep existing image if no new file is uploaded
        }
    
        $data = [
            'CountryID' => $this->request->getPost('CountryID'),
            'LawName' => $this->request->getPost('LawName'),
            'Description' => $this->request->getPost('Description'),
            'KeyProvisions' => $this->request->getPost('KeyProvisions'),
            'Date' => $this->request->getPost('Date'),
            'Image' => $imagePath
        ];
        $lawModel->update($id, $data);
        return redirect()->to('/sivasakthi-dashboard');
    }
    public function deleteLaw($id)
    {
        $lawModel = new LawModel();
        $law = $lawModel->find($id);
        
        if ($law && $law['Image'] && file_exists(ROOTPATH . $law['Image'])) {
            unlink(ROOTPATH . $law['Image']);
        }
    
        $lawModel->delete($id);
        return redirect()->to('/sivasakthi-dashboard');
    }

    public function editDocument($id)
{
    $documentModel = new DocumentModel();
    $data['document'] = $documentModel->find($id);
    return view('edit_document_view', $data);
}
public function updateDocument($id)
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
        $imagePath = $this->request->getPost('existingImage'); // Keep existing image if no new file is uploaded
    }

    $data = [
        'CountryID' => $this->request->getPost('CountryID'),
        'DocumentName' => $this->request->getPost('DocumentName'),
        'Description' => $this->request->getPost('Description'),
        'Type' => $this->request->getPost('Type'),
        'Date' => $this->request->getPost('Date'),
        'Image' => $imagePath
    ];
    $documentModel->update($id, $data);
    return redirect()->to('/sivasakthi-dashboard');
}
public function deleteDocument($id)
{
    $documentModel = new DocumentModel();
    $document = $documentModel->find($id);
    
    if ($document && $document['Image'] && file_exists(ROOTPATH . $document['Image'])) {
        unlink(ROOTPATH . $document['Image']);
    }

    $documentModel->delete($id);
    return redirect()->to('/sivasakthi-dashboard');
}
public function editCaseStudy($id)
{
    $caseStudyModel = new CaseStudyModel();
    $data['caseStudy'] = $caseStudyModel->find($id);
    return view('edit_case_study_view', $data);
}
public function updateCaseStudy($id)
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
        $imagePath = $this->request->getPost('existingImage'); // Keep existing image if no new file is uploaded
    }

    $data = [
        'CountryID' => $this->request->getPost('CountryID'),
        'Title' => $this->request->getPost('Title'),
        'Summary' => $this->request->getPost('Summary'),
        'Date' => $this->request->getPost('Date'),
        'Image' => $imagePath
    ];
    $caseStudyModel->update($id, $data);
    return redirect()->to('/sivasakthi-dashboard');
}
public function deleteCaseStudy($id)
{
    $caseStudyModel = new CaseStudyModel();
    $caseStudy = $caseStudyModel->find($id);
    
    if ($caseStudy && $caseStudy['Image'] && file_exists(ROOTPATH . $caseStudy['Image'])) {
        unlink(ROOTPATH . $caseStudy['Image']);
    }

    $caseStudyModel->delete($id);
    return redirect()->to('/sivasakthi-dashboard');
}

public function editResource($id)
{
    $resourceModel = new ResourceModel();
    $data['resource'] = $resourceModel->find($id);
    return view('edit_resource_view', $data);
}

public function updateResource($id)
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
        $imagePath = $this->request->getPost('existingImage'); // Keep existing image if no new file is uploaded
    }

    $data = [
        'CountryID' => $this->request->getPost('CountryID'),
        'Title' => $this->request->getPost('Title'),
        'Type' => $this->request->getPost('Type'),
        'URL' => $this->request->getPost('URL'),
        'Date' => $this->request->getPost('Date'),
        'Description' => $this->request->getPost('Description'),
        'Image' => $imagePath
    ];
    $resourceModel->update($id, $data);
    return redirect()->to('/sivasakthi-dashboard');
}

public function deleteResource($id)
{
    $resourceModel = new ResourceModel();
    $resource = $resourceModel->find($id);
    
    if ($resource && $resource['Image'] && file_exists(ROOTPATH . $resource['Image'])) {
        unlink(ROOTPATH . $resource['Image']);
    }

    $resourceModel->delete($id);
    return redirect()->to('/sivasakthi-dashboard');
}

}