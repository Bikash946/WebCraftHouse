<?php

session_start();
include '../config.php';

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admins 
            WHERE username='$username' 
            AND password='$password'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {

        $_SESSION['admin'] = $username;

        header("Location: dashboard.php");
        exit();

    } else {
        $error = "Invalid Username or Password";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Admin Login | WebCraftHouse</title>

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

            font-family: Arial, sans-serif;

            min-height: 100vh;

            background:
                linear-gradient(
                    135deg,
                    #0f172a,
                    #1e293b,
                    #2563eb
                );

            display: flex;

            align-items: center;

            justify-content: center;

            padding: 20px;

        }


        /* Background Shapes */

        .shape {

            position: absolute;

            border-radius: 50%;

            filter: blur(5px);

            opacity: 0.25;

        }


        .shape-1 {

            width: 250px;
            height: 250px;

            background: #38bdf8;

            top: 5%;
            left: 5%;

        }


        .shape-2 {

            width: 350px;
            height: 350px;

            background: #6366f1;

            bottom: 5%;
            right: 5%;

        }


        /* Login Container */

        .login-wrapper {

            width: 100%;

            max-width: 1000px;

            min-height: 550px;

            display: flex;

            position: relative;

            border-radius: 25px;

            overflow: hidden;

            background: white;

            box-shadow:
                0 25px 70px rgba(0,0,0,0.35);

        }


        /* Left Section */

        .login-left {

            width: 50%;

            padding: 60px;

            background:
                linear-gradient(
                    135deg,
                    #111827,
                    #1e293b
                );

            color: white;

            display: flex;

            flex-direction: column;

            justify-content: center;

        }


        .brand {

            font-size: 32px;

            font-weight: 700;

            margin-bottom: 25px;

        }


        .brand span {

            color: #38bdf8;

        }


        .login-left h1 {

            font-size: 40px;

            font-weight: 700;

            margin-bottom: 15px;

        }


        .login-left p {

            color: #94a3b8;

            line-height: 1.7;

            font-size: 16px;

        }


        .feature-list {

            margin-top: 30px;

        }


        .feature-item {

            display: flex;

            align-items: center;

            margin-bottom: 15px;

            color: #cbd5e1;

        }


        .feature-icon {

            width: 38px;

            height: 38px;

            min-width: 38px;

            border-radius: 10px;

            background: #334155;

            display: flex;

            align-items: center;

            justify-content: center;

            margin-right: 12px;

            color: #38bdf8;

        }


        /* Right Section */

        .login-right {

            width: 50%;

            padding: 60px;

            display: flex;

            align-items: center;

            justify-content: center;

        }


        .login-form {

            width: 100%;

            max-width: 360px;

        }


        .login-icon {

            width: 70px;

            height: 70px;

            border-radius: 20px;

            background: #e0f2fe;

            color: #0284c7;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 32px;

            margin-bottom: 25px;

        }


        .login-form h2 {

            font-weight: 700;

            color: #1e293b;

            margin-bottom: 8px;

        }


        .subtitle {

            color: #64748b;

            margin-bottom: 30px;

        }


        /* Input */

        .input-group-custom {

            position: relative;

            margin-bottom: 20px;

        }


        .input-group-custom i {

            position: absolute;

            left: 16px;

            top: 50%;

            transform: translateY(-50%);

            color: #64748b;

            z-index: 5;

        }


        .form-control {

            height: 55px;

            padding-left: 48px;

            border-radius: 12px;

            border: 1px solid #e2e8f0;

            box-shadow: none;

        }


        .form-control:focus {

            border-color: #2563eb;

            box-shadow:
                0 0 0 3px rgba(37,99,235,0.1);

        }


        /* Password Eye */

        .password-toggle {

            position: absolute !important;

            right: 16px;

            left: auto !important;

            cursor: pointer;

            z-index: 10;

        }


        /* Button */

        .login-btn {

            width: 100%;

            height: 55px;

            border: none;

            border-radius: 12px;

            background:
                linear-gradient(
                    135deg,
                    #2563eb,
                    #38bdf8
                );

            color: white;

            font-size: 16px;

            font-weight: 600;

            transition: 0.3s;

        }


        .login-btn:hover {

            transform: translateY(-2px);

            box-shadow:
                0 10px 25px rgba(37,99,235,0.3);

        }


        /* Error */

        .error-message {

            background: #fee2e2;

            color: #dc2626;

            padding: 12px 15px;

            border-radius: 10px;

            font-size: 14px;

            margin-bottom: 20px;

            display: flex;

            align-items: center;

            gap: 8px;

        }


        /* Footer */

        .login-footer {

            text-align: center;

            margin-top: 25px;

            font-size: 13px;

            color: #94a3b8;

        }


        /* Responsive */

        @media(max-width: 768px) {

            .login-wrapper {

                max-width: 450px;

            }


            .login-left {

                display: none;

            }


            .login-right {

                width: 100%;

                padding: 45px 30px;

            }

        }


        @media(max-width: 400px) {

            .login-right {

                padding: 35px 20px;

            }

        }

    </style>

</head>


<body>


<!-- Background Shapes -->

<div class="shape shape-1"></div>

<div class="shape shape-2"></div>



<!-- Login Wrapper -->

<div class="login-wrapper">


    <!-- Left Section -->

    <div class="login-left">


        <div class="brand">

            Web<span>CraftHouse</span>

        </div>


        <h1>

            Welcome Back!

        </h1>


        <p>

            Manage your website enquiries and stay connected
            with people who want to work with you.

        </p>


        <div class="feature-list">


            <div class="feature-item">

                <div class="feature-icon">

                    <i class="bi bi-envelope"></i>

                </div>

                Manage customer enquiries

            </div>


            <div class="feature-item">

                <div class="feature-icon">

                    <i class="bi bi-people"></i>

                </div>

                Connect with potential clients

            </div>


            <div class="feature-item">

                <div class="feature-icon">

                    <i class="bi bi-bar-chart"></i>

                </div>

                Track your website activity

            </div>


        </div>


    </div>



    <!-- Right Section -->

    <div class="login-right">


        <div class="login-form">


            <div class="login-icon">

                <i class="bi bi-shield-lock-fill"></i>

            </div>


            <h2>

                Admin Login

            </h2>


            <p class="subtitle">

                Please enter your credentials to continue.

            </p>


            <!-- Error Message -->

            <?php if (isset($error)) { ?>

                <div class="error-message">

                    <i class="bi bi-exclamation-circle"></i>

                    <?php echo $error; ?>

                </div>

            <?php } ?>


            <!-- Login Form -->

            <form method="POST">


                <!-- Username -->

                <div class="input-group-custom">

                    <i class="bi bi-person"></i>

                    <input
                        type="text"
                        name="username"
                        class="form-control"
                        placeholder="Enter your username"
                        required>

                </div>


                <!-- Password -->

                <div class="input-group-custom">

                    <i class="bi bi-lock"></i>

                    <input
                        type="password"
                        name="password"
                        id="password"
                        class="form-control"
                        placeholder="Enter your password"
                        required>

                    <i
                        class="bi bi-eye password-toggle"
                        id="togglePassword">

                    </i>

                </div>


                <!-- Login Button -->

                <button
                    type="submit"
                    name="login"
                    class="login-btn">

                    Login to Dashboard

                    <i class="bi bi-arrow-right ms-2"></i>

                </button>


            </form>


            <div class="login-footer">

                © <?php echo date("Y"); ?>

                WebCraftHouse Admin Panel

            </div>


        </div>


    </div>


</div>


<!-- Password Show / Hide -->

<script>

const togglePassword =
    document.getElementById("togglePassword");

const password =
    document.getElementById("password");


togglePassword.addEventListener(
    "click",
    function () {

        if (password.type === "password") {

            password.type = "text";

            this.classList.remove("bi-eye");

            this.classList.add("bi-eye-slash");

        } else {

            password.type = "password";

            this.classList.remove("bi-eye-slash");

            this.classList.add("bi-eye");

        }

    }
);

</script>


<!-- Bootstrap JS -->

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>

</body>

</html>