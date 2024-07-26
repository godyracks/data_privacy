<?php
namespace App\Models;

use CodeIgniter\Model;

class CaseStudyModel extends Model
{
    protected $table = 'CaseStudies';
    protected $primaryKey = 'CaseStudyID';
    protected $allowedFields = ['CountryID', 'Title', 'Summary', 'Date', 'Image'];

    /**
     * Get similar case studies based on the content of the given case study.
     *
     * @param int $caseStudyID
     * @param int $limit
     * @return array
     */
    public function getSimilarCaseStudies($caseStudyID, $limit = 5)
    {
        // Fetch the current case study
        $currentCaseStudy = $this->find($caseStudyID);

        if (!$currentCaseStudy) {
            return [];
        }

        // Fetch similar case studies
        $db = \Config\Database::connect();
        $builder = $db->table('SearchIndex');

        $query = $builder->select('ReferenceID')
            ->where('Type', 'CaseStudy')
            ->like('Content', $currentCaseStudy['Title'])
            ->orLike('Content', $currentCaseStudy['Summary'])
            ->where('ReferenceID !=', $caseStudyID)
            ->limit($limit)
            ->get();

        $similarCaseStudyIDs = array_column($query->getResultArray(), 'ReferenceID');

        if (empty($similarCaseStudyIDs)) {
            return [];
        }

        return $this->whereIn('CaseStudyID', $similarCaseStudyIDs)
            ->findAll();
    }
}
