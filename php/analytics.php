<?php
$dsn = 'mysql:host=localhost;dbname=AVideo;charset=utf8mb4';
$username = 'root';
$password = 'Philco01';


try {
    $pdo = new PDO($dsn, $username, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

    // Get visit counts per hour (for time-series chart)
    $visitsByTime = $pdo->query("
        SELECT DATE_FORMAT(visit_time, '%Y-%m-%d %H:00:00') as visit_hour, COUNT(*) as visit_count
        FROM visitors 
        GROUP BY visit_hour 
        ORDER BY visit_hour
    ")->fetchAll(PDO::FETCH_ASSOC);

    // Get top 10 visiting IPs (for bar chart)
    $topIps = $pdo->query("
        SELECT ip_address, COUNT(*) as visit_count
        FROM visitors 
        GROUP BY ip_address 
        ORDER BY visit_count DESC 
        LIMIT 10
    ")->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("DB Error: " . $e->getMessage());
}

// Convert data to JSON for Chart.js
$visitsByTimeJson = json_encode($visitsByTime);
$topIpsJson = json_encode($topIps);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Analytics Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h1>Website Analytics</h1>

    <h2>Visits Over Time</h2>
    <canvas id="visitsChart"></canvas>

    <h2>Top 10 Visiting IPs</h2>
    <canvas id="ipChart"></canvas>

    <script>
        const visitsByTime = <?php echo $visitsByTimeJson; ?>;
        const visitLabels = visitsByTime.map(item => item.visit_hour);
        const visitData = visitsByTime.map(item => item.visit_count);

        new Chart(document.getElementById("visitsChart"), {
            type: 'line',
            data: {
                labels: visitLabels,
                datasets: [{
                    label: "Visits per Hour",
                    data: visitData,
                    borderColor: "blue",
                    fill: false
                }]
            }
        });

        const topIps = <?php echo $topIpsJson; ?>;
        const ipLabels = topIps.map(item => item.ip_address);
        const ipData = topIps.map(item => item.visit_count);

        new Chart(document.getElementById("ipChart"), {
            type: 'bar',
            data: {
                labels: ipLabels,
                datasets: [{
                    label: "Visits per IP",
                    data: ipData,
                    backgroundColor: "green"
                }]
            }
        });
    </script>
</body>
</html>

