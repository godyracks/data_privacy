<?php
namespace App\Models;

use CodeIgniter\Model;

class DocumentModel extends Model
{
    protected $table      = 'Documents';
    protected $primaryKey = 'DocumentID';
    protected $allowedFields = ['CountryID', 'DocumentName', 'Description', 'Type', 'Date', 'Image'];

    public function getSimilarDocuments($countryID, $documentID)
    {
        return $this->where('CountryID', $countryID)
                    ->where('DocumentID !=', $documentID)
                    ->findAll(5);
    }
}
