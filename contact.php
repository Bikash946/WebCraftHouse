
<?php
$success = isset($_GET['success']);
$error = isset($_GET['error']);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>Contact Us | WebCraft</title>

    <meta name="description"
        content="Contact WebCraft for professional website development services and custom website projects.">

    <!-- Bootstrap -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">

</head>


<body>


<!-- ================= NAVBAR ================= -->

<?php include 'navbar.php'; ?>



<!-- ================= HERO ================= -->

<section class="contact-page-hero">

    <div class="container">

        <div class="text-center">

            <span class="section-tag text-white">
                GET IN TOUCH
            </span>

            <h1>
                Let's Build Your Website
            </h1>

            <p>
                Have a project in mind? Tell us about it and
                we'll get back to you with the next steps.
            </p>

        </div>

    </div>

</section>



<!-- ================= CONTACT ================= -->

<section id="contact-form"
    class="section-padding contact-page-section">

    <div class="container">

        <div class="row g-5">


            <!-- LEFT -->

            <div class="col-lg-5">

                <span class="section-tag">
                    CONTACT US
                </span>

                <h2>
                    Let's Discuss Your Project
                </h2>

                <p class="contact-intro">
                    Whether you need a business website,
                    portfolio, e-commerce website or a custom
                    web solution, send us your requirements.
                </p>


                <!-- EMAIL -->

                <div class="contact-detail">

                    <div class="contact-detail-icon">

                        <i class="bi bi-envelope"></i>

                    </div>

                    <div>

                        <span>
                            Email
                        </span>

                        <a href="mailto:panigrahi.bikash01@gmail.com">
                            panigrahi.bikash01@gmail.com
                        </a>

                    </div>

                </div>


                <!-- RESPONSE -->

                <div class="contact-detail">

                    <div class="contact-detail-icon">

                        <i class="bi bi-clock"></i>

                    </div>

                    <div>

                        <span>
                            Response Time
                        </span>

                        <p>
                            Usually within 24 hours
                        </p>

                    </div>

                </div>


                <!-- SUPPORT -->

                <div class="contact-detail">

                    <div class="contact-detail-icon">

                        <i class="bi bi-headset"></i>

                    </div>

                    <div>

                        <span>
                            Support
                        </span>

                        <p>
                            Website development & maintenance
                        </p>

                    </div>

                </div>


                <!-- SOCIAL -->

                <div class="contact-social">

                    <p>
                        Follow / Connect
                    </p>

                    <a href="#" aria-label="Facebook">
                        <i class="bi bi-facebook"></i>
                    </a>

                    <a href="#" aria-label="Instagram">
                        <i class="bi bi-instagram"></i>
                    </a>

                    <a href="#" aria-label="LinkedIn">
                        <i class="bi bi-linkedin"></i>
                    </a>

                    <a href="#" aria-label="GitHub">
                        <i class="bi bi-github"></i>
                    </a>

                </div>

            </div>



            <!-- RIGHT FORM -->

            <div class="col-lg-7">

                <div class="contact-page-form">


                    <?php if ($success): ?>

                        <div class="alert alert-success">

                            <i class="bi bi-check-circle-fill me-2"></i>

                            Thank you! Your project enquiry has
                            been submitted successfully.

                        </div>

                    <?php endif; ?>


                    <?php if ($error): ?>

                        <div class="alert alert-danger">

                            <i class="bi bi-exclamation-circle-fill me-2"></i>

                            Something went wrong. Please check
                            your details and try again.

                        </div>

                    <?php endif; ?>


                    <div class="form-heading">

                        <h3>
                            Tell Us About Your Project
                        </h3>

                        <p>
                            Fill out the form below and we'll
                            contact you.
                        </p>

                    </div>


                    <form
                        action="submit_contact.php"
                        method="POST"
                        id="contactForm">


                        <!-- NAME + EMAIL -->

                        <div class="row">

                            <div class="col-md-6 mb-3">

                                <label>
                                    Full Name
                                    <span>*</span>
                                </label>

                                <input
                                    type="text"
                                    name="name"
                                    class="form-control"
                                    placeholder="Your full name"
                                    required>

                            </div>


                            <div class="col-md-6 mb-3">

                                <label>
                                    Email Address
                                    <span>*</span>
                                </label>

                                <input
                                    type="email"
                                    name="email"
                                    class="form-control"
                                    placeholder="you@example.com"
                                    required>

                            </div>

                        </div>


                        <!-- PHONE + SERVICE -->

                        <div class="row">

                            <div class="col-md-6 mb-3">

                                <label>
                                    Phone Number
                                </label>

                                <input
                                    type="tel"
                                    name="phone"
                                    class="form-control"
                                    placeholder="Your phone number">

                            </div>


                            <div class="col-md-6 mb-3">

                                <label>
                                    Service
                                </label>

                                <select
                                    name="service"
                                    class="form-select"
                                    id="contactService">

                                    <option value="">
                                        Select a service
                                    </option>

                                    <option value="Business Website">
                                        Business Website
                                    </option>

                                    <option value="E-Commerce Website">
                                        E-Commerce Website
                                    </option>

                                    <option value="Portfolio Website">
                                        Portfolio Website
                                    </option>

                                    <option value="Landing Page">
                                        Landing Page
                                    </option>

                                    <option value="Website Maintenance">
                                        Website Maintenance
                                    </option>

                                    <option value="Custom Web Development">
                                        Custom Web Development
                                    </option>

                                </select>

                            </div>

                        </div>


                        <!-- BUDGET -->

                        <div class="mb-3">

                            <label>
                                Budget
                            </label>

                            <select
                                name="budget"
                                class="form-select"
                                id="contactBudget">

                                <option value="">
                                    Select your budget
                                </option>

                                <option value="Basic - ₹4,999">
                                    Basic - ₹4,999
                                </option>

                                <option value="Standard - ₹9,999">
                                    Standard - ₹9,999
                                </option>

                                <option value="Premium - ₹14,999+">
                                    Premium - ₹14,999+
                                </option>

                                <option value="Custom Budget">
                                    Custom Budget
                                </option>

                            </select>

                        </div>


                        <!-- MESSAGE -->

                        <div class="mb-4">

                            <label>
                                Project Requirements
                                <span>*</span>
                            </label>

                            <textarea
                                name="message"
                                class="form-control"
                                rows="6"
                                placeholder="Tell us about your website, required pages, features and any other requirements..."
                                required></textarea>

                        </div>


                        <!-- SUBMIT -->

                        <button
                            type="submit"
                            class="btn btn-primary btn-lg w-100">

                            Send Project Enquiry

                            <i class="bi bi-send ms-2"></i>

                        </button>


                        <p class="form-note">

                            <i class="bi bi-shield-check"></i>

                            Your information will only be used
                            to respond to your enquiry.

                        </p>


                    </form>

                </div>

            </div>

        </div>

    </div>

</section>



<!-- ================= FAQ ================= -->

<section class="contact-faq section-padding">

    <div class="container">

        <div class="text-center mb-5">

            <span class="section-tag">
                QUICK ANSWERS
            </span>

            <h2>
                Before You Contact Us
            </h2>

        </div>


        <div class="row g-4">


            <div class="col-md-4">

                <div class="contact-faq-card">

                    <i class="bi bi-question-circle"></i>

                    <h5>
                        What information should I provide?
                    </h5>

                    <p>
                        Tell us what type of website you need,
                        the pages you want and any special
                        features you require.
                    </p>

                </div>

            </div>


            <div class="col-md-4">

                <div class="contact-faq-card">

                    <i class="bi bi-currency-rupee"></i>

                    <h5>
                        Can I request a custom quote?
                    </h5>

                    <p>
                        Yes. If your project doesn't fit one of
                        our plans, you can request a custom quote.
                    </p>

                </div>

            </div>


            <div class="col-md-4">

                <div class="contact-faq-card">

                    <i class="bi bi-chat-dots"></i>

                    <h5>
                        What happens after I submit?
                    </h5>

                    <p>
                        We'll review your requirements and contact
                        you to discuss the project and next steps.
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>



<!-- ================= CTA ================= -->

<section class="contact-cta">

    <div class="container">

        <div class="text-center">

            <h2>
                Have Questions?
            </h2>

            <p>
                Send us your requirements and let's start
                a conversation.
            </p>

            <a
                href="mailto:panigrahi.bikash01@gmail.com"
                class="btn btn-light btn-lg">

                Email Us

                <i class="bi bi-envelope ms-2"></i>

            </a>

        </div>

    </div>

</section>



<!-- ================= FOOTER ================= -->

<?php include'footer.php'; ?>



<!-- Bootstrap JS -->

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>


<script src="script.js"></script>


</body>

</html>

