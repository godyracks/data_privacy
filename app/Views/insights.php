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
    <?= $this->endSection() ?>
