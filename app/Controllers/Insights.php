<?php namespace App\Controllers;

class Insights extends BaseController
{
    public function index()
    {
        // Data for UK and India biometric statistics
        $data['uk_data'] = [
            ['Year' => '2019/20', 'Biometric Data Breaches' => 150, 'Data Protection Complaints Received' => 36_343, 'Compliance Rates (%)' => 85, 'Outcome Decisions' => 39_724, 'Monetary Penalties (millions GBP)' => '£3.5'],
            ['Year' => '2020/21', 'Biometric Data Breaches' => 190, 'Data Protection Complaints Received' => 33_753, 'Compliance Rates (%)' => 87, 'Outcome Decisions' => 39_332, 'Monetary Penalties (millions GBP)' => '£5.2'],
            ['Year' => '2021/22', 'Biometric Data Breaches' => 240, 'Data Protection Complaints Received' => 39_721, 'Compliance Rates (%)' => 90, 'Outcome Decisions' => 37_342, 'Monetary Penalties (millions GBP)' => '£6.3'],
            ['Year' => '2022/23', 'Biometric Data Breaches' => 300, 'Data Protection Complaints Received' => 41_500, 'Compliance Rates (%)' => 92, 'Outcome Decisions' => 35_332, 'Monetary Penalties (millions GBP)' => '£7.0'],
            ['Year' => '2023/24', 'Biometric Data Breaches' => 320, 'Data Protection Complaints Received' => 43_000, 'Compliance Rates (%)' => 94, 'Outcome Decisions' => 33_000, 'Monetary Penalties (millions GBP)' => '£7.5']
        ];

        $data['india_data'] = [
            ['Year' => '2018', 'Digital Payments (% of Active Internet Users)' => '36%', 'AEPS Transactions (crore)' => 865.54, 'BHIM Aadhaar Transactions (crore)' => 2.41],
            ['Year' => '2019', 'Digital Payments (% of Active Internet Users)' => '40%', 'AEPS Transactions (crore)' => 1_113.54, 'BHIM Aadhaar Transactions (crore)' => 3.87],
            ['Year' => '2020', 'Digital Payments (% of Active Internet Users)' => '42%', 'AEPS Transactions (crore)' => 1_413.40, 'BHIM Aadhaar Transactions (crore)' => 4.21],
            ['Year' => '2021', 'Digital Payments (% of Active Internet Users)' => '44%', 'AEPS Transactions (crore)' => 1_771.00, 'BHIM Aadhaar Transactions (crore)' => 5.02],
            ['Year' => '2022', 'Digital Payments (% of Active Internet Users)' => '46%', 'AEPS Transactions (crore)' => 2_291.97, 'BHIM Aadhaar Transactions (crore)' => 5.66],
            ['Year' => '2023', 'Digital Payments (% of Active Internet Users)' => '48%', 'AEPS Transactions (crore)' => 2_500.00, 'BHIM Aadhaar Transactions (crore)' => 6.10]
        ];

        $data['india_breach_data'] = [
            ['Year' => '2019/20', 'Biometric Data Breaches' => 'N/A', 'Compliance Rates (%)' => 40, 'Authentication Transactions (in Crore)' => 1_113.54],
            ['Year' => '2020/21', 'Biometric Data Breaches' => 'N/A', 'Compliance Rates (%)' => 45, 'Authentication Transactions (in Crore)' => 1_413.40],
            ['Year' => '2021/22', 'Biometric Data Breaches' => 'N/A', 'Compliance Rates (%)' => 50, 'Authentication Transactions (in Crore)' => 1_771.00],
            ['Year' => '2022/23', 'Biometric Data Breaches' => '135M compromised', 'Compliance Rates (%)' => 55, 'Authentication Transactions (in Crore)' => 2_291.97]
        ];

        $data['india_internet_data'] = [
            ['Year' => '2018', 'Active Internet Users (millions)' => 560, 'Non-Active Internet Users (millions)' => 540, 'Aadhaar Authentication Transactions (crore)' => 1_080.47],
            ['Year' => '2019', 'Active Internet Users (millions)' => 622, 'Non-Active Internet Users (millions)' => 498, 'Aadhaar Authentication Transactions (crore)' => 1_113.54],
            ['Year' => '2020', 'Active Internet Users (millions)' => 700, 'Non-Active Internet Users (millions)' => 472, 'Aadhaar Authentication Transactions (crore)' => 1_413.40],
            ['Year' => '2021', 'Active Internet Users (millions)' => 720, 'Non-Active Internet Users (millions)' => 448, 'Aadhaar Authentication Transactions (crore)' => 1_771.00],
            ['Year' => '2022', 'Active Internet Users (millions)' => 759, 'Non-Active Internet Users (millions)' => 380, 'Aadhaar Authentication Transactions (crore)' => 2_291.97]
        ];

        $data['aadhaar_data'] = [
            ['Year' => '2018/19', 'Aadhaar Generated (in Crore)' => 123.57, 'Cumulative Aadhaar Generated (in Crore)' => 123.57, 'Authentication Transactions (in Crore)' => 1_080.47, 'Cumulative Authentication Transactions (in Crore)' => 2_896.57],
            ['Year' => '2019/20', 'Aadhaar Generated (in Crore)' => 125.79, 'Cumulative Aadhaar Generated (in Crore)' => 125.79, 'Authentication Transactions (in Crore)' => 1_113.54, 'Cumulative Authentication Transactions (in Crore)' => 4_010.11],
            ['Year' => '2020/21', 'Aadhaar Generated (in Crore)' => 129.04, 'Cumulative Aadhaar Generated (in Crore)' => 129.04, 'Authentication Transactions (in Crore)' => 1_413.40, 'Cumulative Authentication Transactions (in Crore)' => 5_423.51],
            ['Year' => '2021/22', 'Aadhaar Generated (in Crore)' => 132.96, 'Cumulative Aadhaar Generated (in Crore)' => 132.96, 'Authentication Transactions (in Crore)' => 1_771.00, 'Cumulative Authentication Transactions (in Crore)' => 7_194.51],
            ['Year' => '2022/23', 'Aadhaar Generated (in Crore)' => 136.65, 'Cumulative Aadhaar Generated (in Crore)' => 136.65, 'Authentication Transactions (in Crore)' => 2_291.97, 'Cumulative Authentication Transactions (in Crore)' => 9_486.48]
        ];

        // Data for UK biometric statistics
        $data['uk_complaints'] = [
            ['Year' => '2019/20', 'Complaints' => 39000],
            ['Year' => '2020/21', 'Complaints' => 36343],
            ['Year' => '2021/22', 'Complaints' => 33753],
            ['Year' => '2022/23', 'Complaints' => 39721],
            ['Year' => '2023/24', 'Complaints' => 41500],
        ];

        $data['uk_penalties'] = [
            ['Year' => '2019/20', 'Penalties' => 1.3],
            ['Year' => '2020/21', 'Penalties' => 3.5],
            ['Year' => '2021/22', 'Penalties' => 5.2],
            ['Year' => '2022/23', 'Penalties' => 6.3],
            ['Year' => '2023/24', 'Penalties' => 7.0],
        ];

        $data['uk_compliance'] = [
            ['Year' => '2019/20', 'Compliance' => 82],
            ['Year' => '2020/21', 'Compliance' => 85],
            ['Year' => '2021/22', 'Compliance' => 87],
            ['Year' => '2022/23', 'Compliance' => 90],
            ['Year' => '2023/24', 'Compliance' => 92],
        ];

        $data['uk_outcome'] = [
            ['Year' => '2019/20', 'Decisions' => 39724],
            ['Year' => '2020/21', 'Decisions' => 39332],
            ['Year' => '2021/22', 'Decisions' => 37342],
            ['Year' => '2022/23', 'Decisions' => 35332],
            ['Year' => '2023/24', 'Decisions' => 33000],
        ];

        // Data for India biometric statistics
        $data['india_enrolment'] = [
            ['Year' => '2018-19', 'Enrolment' => 123.57],
            ['Year' => '2019-20', 'Enrolment' => 125.79],
            ['Year' => '2020-21', 'Enrolment' => 129.04],
            ['Year' => '2021-22', 'Enrolment' => 132.96],
            ['Year' => '2022-23', 'Enrolment' => 136.65],
        ];

        $data['india_authentication'] = [
            ['Year' => '2018-19', 'Transactions' => 1080.47],
            ['Year' => '2019-20', 'Transactions' => 1113.54],
            ['Year' => '2020-21', 'Transactions' => 1413.40],
            ['Year' => '2021-22', 'Transactions' => 1771.00],
            ['Year' => '2022-23', 'Transactions' => 2291.97],
        ];

        return view('insights', $data);
    }
}
