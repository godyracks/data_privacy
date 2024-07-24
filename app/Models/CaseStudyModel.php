<?php
namespace App\Models;

use CodeIgniter\Model;

class CaseStudyModel extends Model
{
    protected $table      = 'CaseStudies';
    protected $primaryKey = 'CaseStudyID';
    protected $allowedFields = ['CountryID', 'Title', 'Summary', 'Date', 'Image'];
}
