<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>

<style>
   
        /* Add your styles here */
        .table-container {
            width: 90%;
            margin: auto;
            overflow-x: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        h2 {
            text-align: center;
            margin-top: 20px;
        }
 
</style>

<h2>UK Biometric Data</h2>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Year</th>
                    <th>Biometric Data Breaches</th>
                    <th>Data Protection Complaints Received</th>
                    <th>Compliance Rates (%)</th>
                    <th>Outcome Decisions</th>
                    <th>Monetary Penalties (millions GBP)</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($uk_data as $row): ?>
                    <tr>
                        <td><?php echo $row['Year']; ?></td>
                        <td><?php echo $row['Biometric Data Breaches']; ?></td>
                        <td><?php echo number_format($row['Data Protection Complaints Received']); ?></td>
                        <td><?php echo $row['Compliance Rates (%)']; ?></td>
                        <td><?php echo number_format($row['Outcome Decisions']); ?></td>
                        <td><?php echo $row['Monetary Penalties (millions GBP)']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <h2>India Biometric Data</h2>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Year</th>
                    <th>Digital Payments (% of Active Internet Users)</th>
                    <th>AEPS Transactions (crore)</th>
                    <th>BHIM Aadhaar Transactions (crore)</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($india_data as $row): ?>
                    <tr>
                        <td><?php echo $row['Year']; ?></td>
                        <td><?php echo $row['Digital Payments (% of Active Internet Users)']; ?></td>
                        <td><?php echo number_format($row['AEPS Transactions (crore)'], 2); ?></td>
                        <td><?php echo number_format($row['BHIM Aadhaar Transactions (crore)'], 2); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <h2>India Biometric Data Breaches</h2>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Year</th>
                    <th>Biometric Data Breaches</th>
                    <th>Compliance Rates (%)</th>
                    <th>Authentication Transactions (in Crore)</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($india_breach_data as $row): ?>
                    <tr>
                        <td><?php echo $row['Year']; ?></td>
                        <td><?php echo $row['Biometric Data Breaches']; ?></td>
                        <td><?php echo $row['Compliance Rates (%)']; ?></td>
                        <td><?php echo number_format($row['Authentication Transactions (in Crore)'], 2); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <h2>India Internet and Aadhaar Data</h2>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Year</th>
                    <th>Active Internet Users (millions)</th>
                    <th>Non-Active Internet Users (millions)</th>
                    <th>Aadhaar Authentication Transactions (crore)</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($india_internet_data as $row): ?>
                    <tr>
                        <td><?php echo $row['Year']; ?></td>
                        <td><?php echo number_format($row['Active Internet Users (millions)']); ?></td>
                        <td><?php echo number_format($row['Non-Active Internet Users (millions)']); ?></td>
                        <td><?php echo number_format($row['Aadhaar Authentication Transactions (crore)'], 2); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <h2>Aadhaar Generation and Authentication Transactions</h2>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Year</th>
                    <th>Aadhaar Generated (in Crore)</th>
                    <th>Cumulative Aadhaar Generated (in Crore)</th>
                    <th>Authentication Transactions (in Crore)</th>
                    <th>Cumulative Authentication Transactions (in Crore)</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($aadhaar_data as $row): ?>
                    <tr>
                        <td><?php echo $row['Year']; ?></td>
                        <td><?php echo number_format($row['Aadhaar Generated (in Crore)'], 2); ?></td>
                        <td><?php echo number_format($row['Cumulative Aadhaar Generated (in Crore)'], 2); ?></td>
                        <td><?php echo number_format($row['Authentication Transactions (in Crore)'], 2); ?></td>
                        <td><?php echo number_format($row['Cumulative Authentication Transactions (in Crore)'], 2); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>



    <h2>Data Protection Complaints (UK, 2018-2023)</h2>
    <div>
        <canvas id="complaintsChart" width="400" height="200"></canvas>
    </div>
    <div>
        <canvas id="penaltiesChart" width="400" height="200"></canvas>
    </div>
    <div>
        <canvas id="complianceChart" width="400" height="200"></canvas>
    </div>
    <div>
        <canvas id="outcomeChart" width="400" height="200"></canvas>
    </div>
    <script>
        // Data for the charts
        const ukComplaintsData = <?php echo json_encode($uk_complaints); ?>;
        const ukPenaltiesData = <?php echo json_encode($uk_penalties); ?>;
        const ukComplianceData = <?php echo json_encode($uk_compliance); ?>;
        const ukOutcomeData = <?php echo json_encode($uk_outcome); ?>;

        // Debug statements to check the data
        console.log("UK Complaints Data:", ukComplaintsData);
        console.log("UK Penalties Data:", ukPenaltiesData);
        console.log("UK Compliance Data:", ukComplianceData);
        console.log("UK Outcome Data:", ukOutcomeData);

        // Create complaints chart
        const ctxComplaints = document.getElementById('complaintsChart').getContext('2d');
        new Chart(ctxComplaints, {
            type: 'line',
            data: {
                labels: ukComplaintsData.map(data => data.Year),
                datasets: [{
                    label: 'Data Protection Complaints',
                    data: ukComplaintsData.map(data => data.Complaints),
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: true },
                    tooltip: { callbacks: { label: function(tooltipItem) { return tooltipItem.dataset.label + ': ' + tooltipItem.raw; } } }
                }
            }
        });

        // Debug statement to confirm chart creation
        console.log("Complaints Chart created successfully");

        // Create penalties chart
        const ctxPenalties = document.getElementById('penaltiesChart').getContext('2d');
        new Chart(ctxPenalties, {
            type: 'bar',
            data: {
                labels: ukPenaltiesData.map(data => data.Year),
                datasets: [{
                    label: 'Monetary Penalties (£ millions)',
                    data: ukPenaltiesData.map(data => data.Penalties),
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: true },
                    tooltip: { callbacks: { label: function(tooltipItem) { return tooltipItem.dataset.label + ': £' + tooltipItem.raw; } } }
                }
            }
        });

        // Debug statement to confirm chart creation
        console.log("Penalties Chart created successfully");

        // Create compliance chart
        const ctxCompliance = document.getElementById('complianceChart').getContext('2d');
        new Chart(ctxCompliance, {
            type: 'line',
            data: {
                labels: ukComplianceData.map(data => data.Year),
                datasets: [{
                    label: 'Compliance Rates (%)',
                    data: ukComplianceData.map(data => data.Compliance),
                    borderColor: 'rgba(54, 162, 235, 1)',
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: true },
                    tooltip: { callbacks: { label: function(tooltipItem) { return tooltipItem.dataset.label + ': ' + tooltipItem.raw + '%'; } } }
                }
            }
        });

        // Debug statement to confirm chart creation
        console.log("Compliance Chart created successfully");

        // Create outcome chart
        const ctxOutcome = document.getElementById('outcomeChart').getContext('2d');
        new Chart(ctxOutcome, {
            type: 'bar',
            data: {
                labels: ukOutcomeData.map(data => data.Year),
                datasets: [{
                    label: 'Outcome Decisions',
                    data: ukOutcomeData.map(data => data.Decisions),
                    backgroundColor: 'rgba(153, 102, 255, 0.2)',
                    borderColor: 'rgba(153, 102, 255, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: true },
                    tooltip: { callbacks: { label: function(tooltipItem) { return tooltipItem.dataset.label + ': ' + tooltipItem.raw; } } }
                }
            }
        });

        // Debug statement to confirm chart creation
        console.log("Outcome Chart created successfully");
    </script>
    <?= $this->endSection() ?>
