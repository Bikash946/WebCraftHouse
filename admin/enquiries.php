<?php

session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

include '../config.php';

$sql = "SELECT * FROM enquiries ORDER BY id DESC";
$result = mysqli_query($conn, $sql);

$total_enquiries = mysqli_num_rows($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Customer Enquiries | WebCraftHouse</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #f4f7fb;
            font-family: Arial, sans-serif;
        }

        /* Sidebar */

        .sidebar {
            width: 260px;
            min-height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            padding: 30px 20px;
            background: linear-gradient(180deg, #111827, #1e293b);
            color: white;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 50px;
        }

        .logo span {
            color: #38bdf8;
        }

        .sidebar a {
            display: block;
            text-decoration: none;
            color: #cbd5e1;
            padding: 14px 15px;
            border-radius: 10px;
            margin-bottom: 10px;
            transition: 0.3s;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: #334155;
            color: white;
        }

        .sidebar i {
            margin-right: 10px;
        }

        .logout {
            position: absolute;
            bottom: 30px;
            left: 20px;
            right: 20px;
        }

        /* Main Content */

        .main-content {
            margin-left: 260px;
            padding: 35px;
        }

        /* Header */

        .page-header {
            margin-bottom: 30px;
        }

        .page-header h1 {
            font-weight: 700;
            color: #1e293b;
        }

        .page-header p {
            color: #64748b;
        }

        /* Stats Card */

        .stats-card {
            background: linear-gradient(135deg, #2563eb, #38bdf8);
            color: white;
            border-radius: 18px;
            padding: 25px;
            margin-bottom: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        }

        .stats-number {
            font-size: 32px;
            font-weight: bold;
        }

        .stats-icon {
            font-size: 45px;
            opacity: 0.8;
        }

        /* Table Card */

        .table-card {
            background: white;
            border-radius: 18px;
            padding: 25px;
            box-shadow: 0 5px 25px rgba(0,0,0,0.06);
        }

        .table {
            margin-bottom: 0;
        }

        .table thead {
            background: #f1f5f9;
        }

        .table th {
            color: #475569;
            font-size: 14px;
            padding: 18px 15px;
            border: none;
        }

        .table td {
            padding: 18px 15px;
            vertical-align: middle;
            color: #475569;
        }

        .table tbody tr {
            transition: 0.3s;
        }

        .table tbody tr:hover {
            background: #f8fafc;
        }

        .user-avatar {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: #e0f2fe;
            color: #0284c7;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 17px;
        }

        .name-text {
            font-weight: 600;
            color: #1e293b;
        }

        .email-text {
            font-size: 13px;
            color: #64748b;
        }

        .message-box {
            max-width: 250px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .date-badge {
            background: #f1f5f9;
            padding: 7px 10px;
            border-radius: 8px;
            font-size: 12px;
        }

        /* Search */

        .search-box {
            max-width: 300px;
        }

        .search-box input {
            border-radius: 10px;
            padding: 10px 15px;
        }

        /* Empty State */

        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #64748b;
        }

        .empty-state i {
            font-size: 60px;
            margin-bottom: 15px;
            display: block;
        }

        /* Mobile */

        @media(max-width: 768px) {

            .sidebar {
                width: 70px;
                padding: 20px 10px;
            }

            .sidebar .logo,
            .sidebar a span {
                display: none;
            }

            .sidebar a {
                text-align: center;
                padding: 15px 5px;
            }

            .sidebar i {
                margin: 0;
                font-size: 20px;
            }

            .main-content {
                margin-left: 70px;
                padding: 20px;
            }

            .logout {
                left: 10px;
                right: 10px;
            }
        }

    </style>

</head>

<body>


<!-- Sidebar -->

<div class="sidebar">

    <div class="logo">
        Web<span>CraftHouse</span>
    </div>

    <a href="dashboard.php">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
    </a>

    <a href="enquiries.php" class="active">
        <i class="bi bi-envelope"></i>
        <span>Enquiries</span>
    </a>

    <div class="logout">

        <a href="logout.php">
            <i class="bi bi-box-arrow-right"></i>
            <span>Logout</span>
        </a>

    </div>

</div>


<!-- Main Content -->

<div class="main-content">

    <!-- Header -->

    <div class="page-header">

        <h1>Customer Enquiries</h1>

        <p>
            View and manage messages received from your website visitors.
        </p>

    </div>


    <!-- Statistics -->

    <div class="stats-card d-flex justify-content-between align-items-center">

        <div>

            <p class="mb-2">Total Enquiries</p>

            <div class="stats-number">
                <?php echo $total_enquiries; ?>
            </div>

        </div>

        <div class="stats-icon">

            <i class="bi bi-people-fill"></i>

        </div>

    </div>


    <!-- Table -->

    <div class="table-card">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <h4 class="mb-0">
                <i class="bi bi-envelope-paper me-2"></i>
                All Messages
            </h4>

            <!-- Search -->

            <div class="search-box">

                <input
                    type="text"
                    id="searchInput"
                    class="form-control"
                    placeholder="Search enquiries...">

            </div>

        </div>


        <div class="table-responsive">

            <?php if ($total_enquiries > 0) { ?>

            <table class="table align-middle" id="enquiryTable">

                <thead>

                    <tr>

                        <th>Customer</th>
                        <th>Phone</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Date</th>

                    </tr>

                </thead>


                <tbody>

                <?php while ($row = mysqli_fetch_assoc($result)) { ?>

                    <tr>

                        <!-- Customer -->

                        <td>

                            <div class="d-flex align-items-center">

                                <div class="user-avatar me-3">

                                    <?php
                                    echo strtoupper(
                                        substr($row['name'], 0, 1)
                                    );
                                    ?>

                                </div>

                                <div>

                                    <div class="name-text">

                                        <?php
                                        echo htmlspecialchars($row['name']);
                                        ?>

                                    </div>

                                    <div class="email-text">

                                        <?php
                                        echo htmlspecialchars($row['email']);
                                        ?>

                                    </div>

                                </div>

                            </div>

                        </td>


                        <!-- Phone -->

                        <td>

                            <i class="bi bi-telephone me-1"></i>

                            <?php
                            echo htmlspecialchars($row['phone']);
                            ?>

                        </td>


                        <!-- Subject -->

                        <td>

                            <strong>

                                <?php
                                echo htmlspecialchars($row['subject']);
                                ?>

                            </strong>

                        </td>


                        <!-- Message -->

                        <td>

                            <div class="message-box"
                                title="<?php echo htmlspecialchars($row['message']); ?>">

                                <?php
                                echo htmlspecialchars($row['message']);
                                ?>

                            </div>

                        </td>


                        <!-- Date -->

                        <td>

                            <span class="date-badge">

                                <i class="bi bi-calendar me-1"></i>

                                <?php
                                echo date(
                                    "d M Y",
                                    strtotime($row['created_at'])
                                );
                                ?>

                            </span>

                        </td>

                    </tr>

                <?php } ?>

                </tbody>

            </table>

            <?php } else { ?>

                <div class="empty-state">

                    <i class="bi bi-inbox"></i>

                    <h4>No Enquiries Yet</h4>

                    <p>
                        When visitors contact you through your website,
                        their messages will appear here.
                    </p>

                </div>

            <?php } ?>

        </div>

    </div>

</div>


<!-- Search Script -->

<script>

document.getElementById("searchInput").addEventListener("keyup", function() {

    let input = this.value.toLowerCase();

    let rows = document.querySelectorAll("#enquiryTable tbody tr");

    rows.forEach(function(row) {

        let text = row.innerText.toLowerCase();

        if (text.includes(input)) {

            row.style.display = "";

        } else {

            row.style.display = "none";

        }

    });

});

</script>


<!-- Bootstrap JS -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>