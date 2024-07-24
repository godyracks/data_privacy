<?php
namespace App\Models;

use CodeIgniter\Model;

class ResourceModel extends Model
{
    protected $table      = 'Resources';
    protected $primaryKey = 'ResourceID';
    protected $allowedFields = ['CountryID', 'Title', 'Type', 'URL', 'Date', 'Image'];
}
