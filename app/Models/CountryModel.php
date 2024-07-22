<?php
namespace App\Models;

use CodeIgniter\Model;

class CountryModel extends Model
{
    protected $table      = 'Countries';
    protected $primaryKey = 'CountryID';
    protected $allowedFields = ['CountryName', 'CountryCode'];
}
