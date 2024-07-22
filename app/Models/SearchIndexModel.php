<?php
namespace App\Models;

use CodeIgniter\Model;

class SearchIndexModel extends Model
{
    protected $table      = 'SearchIndex';
    protected $primaryKey = 'SearchID';
    protected $allowedFields = ['Type', 'ReferenceID', 'Content'];
}
