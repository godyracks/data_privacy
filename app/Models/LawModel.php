<?php
namespace App\Models;

use CodeIgniter\Model;

class LawModel extends Model
{
    protected $table      = 'Laws';
    protected $primaryKey = 'LawID';
    protected $allowedFields = ['CountryID', 'LawName', 'Description', 'KeyProvisions'];
}
