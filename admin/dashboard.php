<?php

session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

include '../config.php';

/* Total Enquiries */
$result = mysqli_query(
    $conn,
    "SELECT COUNT(*) AS total FROM enquiries"
);

$row = mysqli_fetch_assoc($result);

$total_enquiries = $row['total'];

/* Today's Enquiries */
$today_result = mysqli_query(
    $conn,
    "SELECT COUNT(*) AS today_total 
     FROM enquiries 
     WHERE DATE(created_at) = CURDATE()"
);

$today_row = mysqli_fetch_assoc($today_result);

$today_enquiries = $today_row['today_total'];

/* Latest Enquiries */
$latest_result = mysqli_query(
    $conn,
    "SELECT * FROM enquiries 
     ORDER BY id DESC 
     LIMIT 5"
);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Admin Dashboard | WebCraftHouse</title>


    <!-- Bootstrap CSS -->

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">


    <!-- Bootstrap Icons -->

    <link
        rel="stylesheet"
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


        /* ================= Sidebar ================= */

        .sidebar {

            width: 260px;
            min-height: 100vh;

            position: fixed;

            top: 0;
            left: 0;

            padding: 30px 20px;

            background: linear-gradient(
                180deg,
                #111827,
                #1e293b
            );

            color: white;

        }


        .logo {

            font-size: 24px;
            font-weight: 700;

            margin-bottom: 50px;

        }


        .logo span {
            color: #38bdf8;
        }


        .sidebar a {

            display: block;

            color: #cbd5e1;

            text-decoration: none;

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


        /* ================= Main Content ================= */

        .main-content {

            margin-left: 260px;

            padding: 35px;

        }


        /* ================= Header ================= */

        .welcome-box {

            display: flex;

            justify-content: space-between;

            align-items: center;

            margin-bottom: 35px;

        }


        .welcome-box h1 {

            font-size: 30px;

            font-weight: 700;

            color: #1e293b;

        }


        .welcome-box p {

            color: #64748b;

            margin-top: 5px;

        }


        .admin-profile {

            display: flex;

            align-items: center;

            background: white;

            padding: 10px 18px;

            border-radius: 12px;

            box-shadow: 0 5px 20px rgba(0,0,0,0.05);

        }


        .admin-avatar {

            width: 42px;

            height: 42px;

            border-radius: 50%;

            background: #e0f2fe;

            color: #0284c7;

            display: flex;

            align-items: center;

            justify-content: center;

            font-weight: bold;

            margin-right: 10px;

        }


        /* ================= Stats Cards ================= */

        .stat-card {

            background: white;

            border-radius: 18px;

            padding: 25px;

            box-shadow:
                0 5px 25px rgba(0,0,0,0.06);

            height: 100%;

            transition: 0.3s;

        }


        .stat-card:hover {

            transform: translateY(-5px);

        }


        .stat-title {

            color: #64748b;

            font-size: 14px;

            margin-bottom: 10px;

        }


        .stat-number {

            font-size: 32px;

            font-weight: 700;

            color: #1e293b;

        }


        .stat-icon {

            width: 55px;

            height: 55px;

            border-radius: 15px;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 25px;

        }


        .blue-icon {

            background: #e0f2fe;

            color: #0284c7;

        }


        .green-icon {

            background: #dcfce7;

            color: #16a34a;

        }


        .purple-icon {

            background: #f3e8ff;

            color: #9333ea;

        }


        /* ================= Quick Action ================= */

        .quick-action {

            background:
                linear-gradient(
                    135deg,
                    #2563eb,
                    #38bdf8
                );

            color: white;

            border-radius: 18px;

            padding: 25px;

            height: 100%;

        }


        .quick-action h4 {

            font-weight: 700;

        }


        .quick-action a {

            background: white;

            color: #2563eb;

            text-decoration: none;

            padding: 10px 18px;

            border-radius: 10px;

            display: inline-block;

            margin-top: 10px;

            font-weight: 600;

        }


        /* ================= Latest Enquiries ================= */

        .recent-card {

            background: white;

            border-radius: 18px;

            padding: 25px;

            margin-top: 30px;

            box-shadow:
                0 5px 25px rgba(0,0,0,0.06);

        }


        .recent-header {

            display: flex;

            justify-content: space-between;

            align-items: center;

            margin-bottom: 20px;

        }


        .recent-header h4 {

            font-weight: 700;

            color: #1e293b;

        }


        .view-all {

            text-decoration: none;

            color: #2563eb;

            font-weight: 600;

        }


        .enquiry-item {

            display: flex;

            align-items: center;

            padding: 15px 0;

            border-bottom: 1px solid #e2e8f0;

        }


        .enquiry-item:last-child {

            border-bottom: none;

        }


        .user-avatar {

            width: 45px;

            height: 45px;

            min-width: 45px;

            border-radius: 50%;

            background: #e0f2fe;

            color: #0284c7;

            display: flex;

            align-items: center;

            justify-content: center;

            font-weight: bold;

            margin-right: 15px;

        }


        .user-info {

            flex: 1;

        }


        .user-name {

            font-weight: 600;

            color: #1e293b;

        }


        .user-email {

            font-size: 13px;

            color: #64748b;

        }


        .date {

            font-size: 13px;

            color: #64748b;

        }


        /* ================= Empty State ================= */

        .empty-state {

            text-align: center;

            padding: 40px;

            color: #64748b;

        }


        .empty-state i {

            font-size: 55px;

            display: block;

            margin-bottom: 10px;

        }


        /* ================= Mobile ================= */

        @media(max-width: 768px) {

            .sidebar {

                width: 70px;

                padding: 20px 10px;

            }


            .sidebar .logo,
            .sidebar span {

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


            .welcome-box {

                flex-direction: column;

                align-items: flex-start;

                gap: 20px;

            }


            .admin-profile {

                width: 100%;

            }


            .logout {

                left: 10px;

                right: 10px;

            }

        }

    </style>

</head>


<body>


<!-- ================= Sidebar ================= -->

<div class="sidebar">

    <div class="logo">

        Web<span>CraftHouse</span>

    </div>


    <a href="dashboard.php"
       class="active">

        <i class="bi bi-grid"></i>

        <span>Dashboard</span>

    </a>


    <a href="enquiries.php">

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


<!-- ================= Main Content ================= -->

<div class="main-content">


    <!-- Welcome Header -->

    <div class="welcome-box">

        <div>

            <h1>
                Welcome back,
                <?php echo htmlspecialchars($_SESSION['admin']); ?> 👋
            </h1>

            <p>
                Here's what's happening with your website today.
            </p>

        </div>


        <div class="admin-profile">

            <div class="admin-avatar">

                <?php
                echo strtoupper(
                    substr($_SESSION['admin'], 0, 1)
                );
                ?>

            </div>

            <div>

                <strong>
                    <?php
                    echo htmlspecialchars($_SESSION['admin']);
                    ?>
                </strong>

                <br>

                <small class="text-muted">
                    Administrator
                </small>

            </div>

        </div>

    </div>



    <!-- ================= Statistics ================= -->

    <div class="row g-4">


        <!-- Total Enquiries -->

        <div class="col-lg-4 col-md-6">

            <div class="stat-card">

                <div class="d-flex
                            justify-content-between
                            align-items-center">

                    <div>

                        <div class="stat-title">

                            Total Enquiries

                        </div>

                        <div class="stat-number">

                            <?php
                            echo $total_enquiries;
                            ?>

                        </div>

                    </div>


                    <div class="stat-icon blue-icon">

                        <i class="bi bi-envelope-fill"></i>

                    </div>

                </div>

            </div>

        </div>



        <!-- Today's Enquiries -->

        <div class="col-lg-4 col-md-6">

            <div class="stat-card">

                <div class="d-flex
                            justify-content-between
                            align-items-center">

                    <div>

                        <div class="stat-title">

                            Today's Enquiries

                        </div>

                        <div class="stat-number">

                            <?php
                            echo $today_enquiries;
                            ?>

                        </div>

                    </div>


                    <div class="stat-icon green-icon">

                        <i class="bi bi-calendar-check-fill"></i>

                    </div>

                </div>

            </div>

        </div>



        <!-- Quick Action -->

        <div class="col-lg-4">

            <div class="quick-action">

                <h4>

                    <i class="bi bi-lightning-charge-fill"></i>

                    Quick Action

                </h4>

                <p class="mb-1">

                    Check messages from people who want to connect with you.

                </p>


                <a href="enquiries.php">

                    View Enquiries

                    <i class="bi bi-arrow-right"></i>

                </a>

            </div>

        </div>


    </div>



    <!-- ================= Latest Enquiries ================= -->

    <div class="recent-card">


        <div class="recent-header">

            <h4>

                <i class="bi bi-clock-history me-2"></i>

                Recent Enquiries

            </h4>


            <a href="enquiries.php"
               class="view-all">

                View All

                <i class="bi bi-arrow-right"></i>

            </a>

        </div>


        <?php

        if (mysqli_num_rows($latest_result) > 0) {

            while (
                $enquiry =
                mysqli_fetch_assoc($latest_result)
            ) {

        ?>

            <div class="enquiry-item">


                <div class="user-avatar">

                    <?php

                    echo strtoupper(
                        substr(
                            $enquiry['name'],
                            0,
                            1
                        )
                    );

                    ?>

                </div>


                <div class="user-info">

                    <div class="user-name">

                        <?php
                        echo htmlspecialchars(
                            $enquiry['name']
                        );
                        ?>

                    </div>


                    <div class="user-email">

                        <?php
                        echo htmlspecialchars(
                            $enquiry['email']
                        );
                        ?>

                    </div>

                </div>


                <div class="date">

                    <?php

                    echo date(
                        "d M Y",
                        strtotime(
                            $enquiry['created_at']
                        )
                    );

                    ?>

                </div>


            </div>


        <?php

            }

        } else {

        ?>

            <div class="empty-state">

                <i class="bi bi-inbox"></i>

                <h5>No Enquiries Yet</h5>

                <p>
                    Customer messages will appear here.
                </p>

            </div>

        <?php

        }

        ?>


    </div>


</div>


<!-- Bootstrap JS -->

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>


</body>

</html>