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
 .charts{
    max-width: 800px;
    margin: 0 auto;
 }
     /* General styles for the charts */
     .charts-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        gap: 20px; /* Adds space between the charts */
        margin: 0 auto;
        padding: 20px;
    }

    .charts-container > div {
        flex: 1 1 calc(50% - 20px); /* Allows charts to take up half the container width minus the gap */
        box-sizing: border-box;
        max-width: 100%;
    }

    .charts-container canvas {
        width: 100% !important;
        height: auto !important;
        max-height: 260px; /* Limit the maximum height for better responsiveness */
    }

    /* Responsive styles for smaller screens */
    @media (max-width: 768px) {
        .charts-container {
            flex-direction: column; /* Stack charts vertically on small screens */
        }

        .charts-container > div {
            flex: 1 1 100%; /* Make each chart take full width */
            margin-bottom: 20px; /* Adds space between stacked charts */
        }
    }

    .modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1000; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0, 0, 0); /* Fallback color */
    background-color: rgba(0, 0, 0, 0.4); /* Black w/ opacity */
}

.modal-content {
    background-color: #fefefe;
    margin: 15% auto; /* 15% from the top and centered */
    padding: 20px;
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
    max-width: 500px;
    text-align: center;
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}

.download-btn {
    display: inline-block;
    padding: 10px 20px;
    margin-top: 20px;
    background-color: #4CAF50;
    color: white;
    text-decoration: none;
    border-radius: 5px;
}

.download-btn:hover {
    background-color: #45a049;
}

.download-container {
    text-align: center;
    margin: 50px 0;
}

.download-btn2 {
    display: inline-block;
    padding: 15px 30px;
    background-color: #4CAF50;
    color: white;
    text-decoration: none;
    font-size: 18px;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.download-btn2:hover {
    background-color: #45a049;
}
</style>
<div class="download-container">
        <a href="<?= base_url('public/pdf/uk_v_india_biometric_data_privacy.pdf')?>" download class="download-btn2">Download PDF</a>
    </div>
<div id="modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Download Our PDF</h2>
            <p>Click the button below to download the PDF.</p>
            <a href="<?= base_url('public/pdf/uk_v_india_biometric_data_privacy.pdf')?>" download class="download-btn">Download PDF</a>
        </div>
    </div>
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

    <h2>Charts</h2>
<div class="charts-container">
    <div>
        <h3>UK Charts</h3>
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
            <canvas id="ukGdprCompliancePieChart" width="400" height="200"></canvas>
        </div>
        <div>
            <canvas id="outcomeChart" width="400" height="200"></canvas>
        </div>
    </div>

    <div>
        <h3>India Charts</h3>
        <div>
            <canvas id="indiaEnrolmentChart" width="400" height="200"></canvas>
        </div>
        <div>
            <canvas id="indiaAuthenticationChart" width="400" height="200"></canvas>
        </div>
        <div>
            <canvas id="compliancePieChart" width="400" height="200"></canvas>
        </div>
        <div>
            <canvas id="paymentsPieChart" width="400" height="200"></canvas>
        </div>
    </div>
</div>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        console.log("Document loaded");

        // Data from PHP
        const ukComplaintsData = <?= json_encode($uk_complaints); ?>;
        const ukPenaltiesData = <?= json_encode($uk_penalties); ?>;
        const ukComplianceData = <?= json_encode($uk_compliance); ?>;
        const ukOutcomeData = <?= json_encode($uk_outcome); ?>;

        // Fetch India data
        const indiaEnrolmentData = <?= json_encode($india_enrolment); ?>;
        const indiaAuthenticationData = <?= json_encode($india_authentication); ?>;
        
        console.log("UK Complaints Data:", ukComplaintsData);
        console.log("UK Penalties Data:", ukPenaltiesData);
        console.log("UK Compliance Data:", ukComplianceData);
        console.log("UK Outcome Data:", ukOutcomeData);
        console.log("India Enrolment Data:", indiaEnrolmentData);
        console.log("India Authentication Data:", indiaAuthenticationData);

        // Get context for each chart
        const ctxComplaints = document.getElementById('complaintsChart').getContext('2d');
        const ctxPenalties = document.getElementById('penaltiesChart').getContext('2d');
        const ctxCompliance = document.getElementById('complianceChart').getContext('2d');
        const ctxOutcome = document.getElementById('outcomeChart').getContext('2d');
        const ctxIndiaEnrolment = document.getElementById('indiaEnrolmentChart').getContext('2d');
        const ctxIndiaAuthentication = document.getElementById('indiaAuthenticationChart').getContext('2d');

        // Prepare data for India Enrolment chart
        const labelsIndiaEnrolment = indiaEnrolmentData.map(item => item.Year);
        const dataIndiaEnrolment = indiaEnrolmentData.map(item => item.Enrolment);

        // Prepare data for India Authentication chart
        const labelsIndiaAuthentication = indiaAuthenticationData.map(item => item.Year);
        const dataIndiaAuthentication = indiaAuthenticationData.map(item => item.Transactions);

        // Chart for UK Complaints
        new Chart(ctxComplaints, {
            type: 'line',
            data: {
                labels: ukComplaintsData.map(data => data.Year),
                datasets: [{
                    label: 'Complaints',
                    data: ukComplaintsData.map(data => data.Complaints),
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    fill: false,
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                let label = context.dataset.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                if (context.parsed.y !== null) {
                                    label += context.parsed.y;
                                }
                                return label;
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Year'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Complaints'
                        }
                    }
                }
            }
        });

        // Chart for UK Penalties
        new Chart(ctxPenalties, {
            type: 'bar',
            data: {
                labels: ukPenaltiesData.map(data => data.Year),
                datasets: [{
                    label: 'Penalties (in million GBP)',
                    data: ukPenaltiesData.map(data => data.Penalties),
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1,
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                let label = context.dataset.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                if (context.parsed.y !== null) {
                                    label += context.parsed.y;
                                }
                                return label;
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Year'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Penalties (in million GBP)'
                        }
                    }
                }
            }
        });

        // Chart for UK Compliance
        new Chart(ctxCompliance, {
            type: 'line',
            data: {
                labels: ukComplianceData.map(data => data.Year),
                datasets: [{
                    label: 'Compliance Rate (%)',
                    data: ukComplianceData.map(data => data.Compliance),
                    borderColor: 'rgba(153, 102, 255, 1)',
                    backgroundColor: 'rgba(153, 102, 255, 0.2)',
                    fill: false,
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                let label = context.dataset.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                if (context.parsed.y !== null) {
                                    label += context.parsed.y;
                                }
                                return label;
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Year'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Compliance Rate (%)'
                        }
                    }
                }
            }
        });

        // Chart for UK Outcome
        new Chart(ctxOutcome, {
            type: 'bar',
            data: {
                labels: ukOutcomeData.map(data => data.Year),
                datasets: [{
                    label: 'Outcome Decisions',
                    data: ukOutcomeData.map(data => data.Decisions),
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                let label = context.dataset.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                if (context.parsed.y !== null) {
                                    label += context.parsed.y;
                                }
                                return label;
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Year'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Outcome Decisions'
                        }
                    }
                }
            }
        });

        // Chart for India Enrolment
        new Chart(ctxIndiaEnrolment, {
            type: 'line',
            data: {
                labels: labelsIndiaEnrolment,
                datasets: [{
                    label: 'Aadhaar Enrolment (India) - Crore',
                    data: dataIndiaEnrolment,
                    fill: false,
                    borderColor: 'rgba(255, 159, 64, 1)',
                    tension: 0.1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                let label = context.dataset.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                if (context.parsed.y !== null) {
                                    label += context.parsed.y;
                                }
                                return label;
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Year'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Enrolment (Crore)'
                        }
                    }
                }
            }
        });

        // Chart for India Authentication
        new Chart(ctxIndiaAuthentication, {
            type: 'bar',
            data: {
                labels: labelsIndiaAuthentication,
                datasets: [{
                    label: 'Aadhaar Authentication Transactions (India) - Crore',
                    data: dataIndiaAuthentication,
                    backgroundColor: 'rgba(255, 206, 86, 0.2)',
                    borderColor: 'rgba(255, 206, 86, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                let label = context.dataset.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                if (context.parsed.y !== null) {
                                    label += context.parsed.y;
                                }
                                return label;
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Year'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Transactions (Crore)'
                        }
                    }
                }
            }
        });
    });

    document.addEventListener("DOMContentLoaded", function() {
        // Compliance Rates by Sector
        const complianceData = [
            { "Sector": "Large Organizations", "ComplianceRate": 85 },
            { "Sector": "SMEs", "ComplianceRate": 67 },
            { "Sector": "Private Entities (India)", "ComplianceRate": 40 }
        ];

        const ctxCompliancePie = document.getElementById('compliancePieChart').getContext('2d');
        new Chart(ctxCompliancePie, {
            type: 'pie',
            data: {
                labels: complianceData.map(data => data.Sector),
                datasets: [{
                    data: complianceData.map(data => data.ComplianceRate),
                    backgroundColor: ['rgba(75, 192, 192, 0.2)', 'rgba(255, 99, 132, 0.2)', 'rgba(153, 102, 255, 0.2)'],
                    borderColor: ['rgba(75, 192, 192, 1)', 'rgba(255, 99, 132, 1)', 'rgba(153, 102, 255, 1)'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                let label = context.label || '';
                                if (context.parsed !== null) {
                                    label += ': ' + context.parsed + '%';
                                }
                                return label;
                            }
                        }
                    }
                }
            }
        });

        // Digital Payments Distribution
        const paymentsData = [
            { "Year": "2022", "Percentage": 46 }
        ];

        const ctxPaymentsPie = document.getElementById('paymentsPieChart').getContext('2d');
        new Chart(ctxPaymentsPie, {
            type: 'pie',
            data: {
                labels: paymentsData.map(data => data.Year),
                datasets: [{
                    data: paymentsData.map(data => data.Percentage),
                    backgroundColor: ['rgba(255, 206, 86, 0.2)'],
                    borderColor: ['rgba(255, 206, 86, 1)'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                let label = context.label || '';
                                if (context.parsed !== null) {
                                    label += ': ' + context.parsed + '%';
                                }
                                return label;
                            }
                        }
                    }
                }
            }
        });
    });
    document.addEventListener("DOMContentLoaded", function() {
    // UK GDPR Compliance Data
    const ukGdprComplianceData = [
        { year: '2019/20', compliance: 82 },
        { year: '2020/21', compliance: 85 },
        { year: '2021/22', compliance: 87 },
        { year: '2022/23', compliance: 90 },
        { year: '2023/24', compliance: 92 }
    ];

    // Get the context for the UK GDPR Compliance Pie Chart
    const ctxUkGdprCompliance = document.getElementById('ukGdprCompliancePieChart').getContext('2d');

    // Create the Pie Chart
    new Chart(ctxUkGdprCompliance, {
        type: 'pie',
        data: {
            labels: ukGdprComplianceData.map(data => data.year),
            datasets: [{
                label: 'GDPR Compliance Rate (%)',
                data: ukGdprComplianceData.map(data => data.compliance),
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true,
                    position: 'top',
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            let label = context.label || '';
                            if (context.parsed) {
                                label += ': ' + context.parsed + '%';
                            }
                            return label;
                        }
                    }
                }
            }
        }
    });
});



// Get the modal
const modal = document.getElementById("modal");

// Get the <span> element that closes the modal
const closeBtn = document.querySelector(".close");

// Check if the user has already closed the modal
if (!localStorage.getItem("modalClosed")) {
    // When the user scrolls down 400px from the top of the document, open the modal
    window.onscroll = function () {
        if (document.documentElement.scrollTop > 400) {
            modal.style.display = "block";
        }
    };
}

// When the user clicks on <span> (x), close the modal and remember the action
closeBtn.onclick = function () {
    modal.style.display = "none";
    localStorage.setItem("modalClosed", "true");
};

// When the user clicks anywhere outside of the modal, close it and remember the action
window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
        localStorage.setItem("modalClosed", "true");
    }
};


</script>

    <?= $this->endSection() ?>
