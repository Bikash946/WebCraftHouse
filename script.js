
document.addEventListener("DOMContentLoaded", function () {

    // Current year
    document.getElementById("year").textContent =
        new Date().getFullYear();


    // Pricing plan selection
    const planButtons = document.querySelectorAll(".select-plan");
    const budgetSelect = document.getElementById("budget");

    planButtons.forEach(function (button) {

        button.addEventListener("click", function () {

            const selectedPlan = this.getAttribute("data-plan");

            if (selectedPlan === "Basic") {
                budgetSelect.value = "Basic - ₹4,999";
            }

            if (selectedPlan === "Standard") {
                budgetSelect.value = "Standard - ₹9,999";
            }

            if (selectedPlan === "Premium") {
                budgetSelect.value = "Premium - ₹14,999+";
            }

        });

    });


    // Navbar background on scroll
    window.addEventListener("scroll", function () {

        const navbar = document.querySelector(".navbar");

        if (window.scrollY > 50) {
            navbar.classList.add("shadow");
        } else {
            navbar.classList.remove("shadow");
        }

    });

});

