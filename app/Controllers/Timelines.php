<?php
namespace App\Controllers;

use App\Models\LawModel;

class Timelines extends BaseController
{
    public function index()
    {
        $lawModel = new LawModel();
        $laws = $lawModel->getLaws();

        $timelineItems = [];
        $id = 1;

        foreach ($laws as $law) {
            // Extract the year from the law name
            if (preg_match('/(\d{4})/', $law['LawName'], $matches)) {
                $year = $matches[1];
            } else {
                // Default to the date field if year not found in law name
                $year = substr($law['Date'], 0, 4);
            }

            $countryGroup = $law['CountryID'] == 1 ? 'UK' : 'India';

            $timelineItems[] = [
                'id' => $id++,
                'content' => "{$countryGroup}: {$law['LawName']}",
                'start' => "{$year}-01-01",
                'group' => $law['CountryID'],
                'className' => 'timeline-item'
            ];
        }

        return view('timelineview', ['timelineItems' => json_encode($timelineItems)]);
    }
}
