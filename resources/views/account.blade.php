<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <?php include "css.blade.php"; ?>
    <style>
        /* Additional CSS styles */
        .greeting {
            margin-bottom: 20px;
        }

        .nav-link {
            color: #333;
        }

        .nav-link:hover {
            color: #555;
        }
    </style>
</head>
<body>
    <?php include "nav.blade.php"; ?>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-3">
                <!-- Greeting -->
                <div class="greeting">
                    <p>Hello John Doe,</p>
                </div>
                <!-- Vertical Navbar -->
                <nav class="navbar navbar-expand-md navbar-light bg-light">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="#orders">Order History</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#account">Account Management</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#support">Support</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#review">Rate and Review</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#improve">Help us Improve</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Sign Out</a>
                            </li>
                        </ul>
                    </div>
                    </nav>
        </div>
        <!-- Sections on the right side -->
        <div class="col-md-9">
            <div id="orders" class="section-content">
                <!-- Content for Order History section -->
                <h2>Order History</h2>
                <!-- Add content specific to Order History here -->
            </div>
            <div id="account" class="section-content">
                <!-- Content for Account Management section -->
                <h2>Account Management</h2>
                <!-- Add content specific to Account Management here -->
            </div>
            <!-- Add more divs for other sections -->
        </div>
    </div>
</div>
    <?php include "footer.blade.php"; ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Function to scroll to the target settings section
        function scrollToSection(sectionId) {
            var section = document.getElementById(sectionId);
            if (section) {
                section.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        }

        // Event listeners for navbar links to scroll to the respective sections
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', function (e) {
                e.preventDefault();
                var targetSectionId = this.getAttribute('href').substring(1); // Get the section id without the '#'
                scrollToSection(targetSectionId);
            });
        });
    </script>
</body>

</html>