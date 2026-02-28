<!-- FOOTER -->
<footer class="footer mt-auto">
    <div class="container">
        <div class="row gy-4">

            <div class="col-md-3">
                <h4 class="footer-logo">Nexvorta</h4>
                <p class="footer-text">
                    Modern marketplace platform with secure and fast transactions.
                </p>
            </div>

            <div class="col-md-3">
                <h6>Quick Links</h6>
                <ul class="footer-links">
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Help Center</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul>
            </div>

            <div class="col-md-3">
                <h6>Categories</h6>
                <ul class="footer-links">
                    <li><a href="#">Electronics</a></li>
                    <li><a href="#">Fashion</a></li>
                    <li><a href="#">Accessories</a></li>
                </ul>
            </div>

            <div class="col-md-3">
                <h6>Contact</h6>
                <p class="footer-text">Email: support@nexvorta.com</p>

                <div class="social-icons">
                    <i class="bi bi-facebook"></i>
                    <i class="bi bi-instagram"></i>
                    <i class="bi bi-telegram telegram-btn"></i>
                </div>
            </div>

        </div>

        <div class="footer-bottom">
            © 2026 <strong>Nexvorta</strong>. All rights reserved.
        </div>
    </div>
</footer>

<script>
    document.querySelector(".telegram-btn")?.addEventListener("click", function() {
        Swal.fire({
            title: "Send Report to Nexvorta Team by Telegram📢",
            html: `
      <input id="reportName" class="swal2-input" placeholder="Your Name">
      <textarea id="reportMessage" class="swal2-textarea" placeholder="Write your report..."></textarea>
    `,
            confirmButtonText: "Send Report",
            confirmButtonColor: "#023e8a",
            showCancelButton: true,
            preConfirm: () => {
                const name = document.getElementById("reportName").value;
                const message = document.getElementById("reportMessage").value;

                if (!name || !message) {
                    Swal.showValidationMessage("Please fill all fields");
                }

                return {
                    name,
                    message
                };
            },
        }).then((result) => {
            if (result.isConfirmed) {
                fetch("dashboard/customer/send_telegram.php", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                        },
                        body: JSON.stringify(result.value),
                    })
                    .then((res) => res.json())
                    .then((data) => {
                        Swal.fire({
                            icon: "success",
                            title: "Report Sent!",
                            text: "Your message has been sent to Nexvorta Admin 🚀",
                            confirmButtonColor: "#023e8a",
                        });
                    })
                    .catch(() => {
                        Swal.fire("Error", "Failed to send message", "error");
                    });
            }
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/dashboard/customer.js"></script>
<script src="assets/js/dashboard/darkmode.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>