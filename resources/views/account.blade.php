<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    @include('css')
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

        .item-container {
            min-width: 150px;
            /* Adjust the minimum width as needed */
        }
    </style>
</head>

<body>
    @include('nav')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-3">
                <!-- Greeting -->
                <div class="greeting">
                    <p class="display-6">Hello John,</p>
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
                                <a class="nav-link" href="#review"><s>Rate and Review</s></a>
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
                <div class="container mt-4 settings-section" id="orders">
                    <h2>Order History</h2>
                    <hr>
                    <p><strong>Order number:</strong> 123456789</p>
                    <p><strong>Date ordered:</strong> November 25, 2023</p>
                    <p><strong>Total number of items:</strong> 5</p>

                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="overflow-auto">
                                <div class="d-flex flex-nowrap p-3">
                                    <div class="item-container text-center mx-2 bg-light p-3">
                                        <img src="item_image_url_1.jpg" alt="Item 1" class="img-fluid">
                                        <p><strong>Item 1 Name</strong></p>
                                        <p><strong>£10.10</strong></p>
                                    </div>
                                    <div class="item-container text-center mx-2 bg-light p-3">
                                        <img src="item_image_url_2.jpg" alt="Item 2" class="img-fluid">
                                        <p><strong>Item 2 Name</strong></p>
                                        <p><strong>£10.10</strong></p>
                                    </div>
                                    <!-- Repeat this structure for each item -->

                                    <div class="item-container text-center mx-2 bg-light p-3">
                                        <img src="item_image_url_2.jpg" alt="Item 2" class="img-fluid">
                                        <p><strong>Item 3 Name</strong></p>
                                        <p><strong>£10.10</strong></p>
                                    </div>

                                    <div class="item-container text-center mx-2 bg-light p-3">
                                        <img src="item_image_url_2.jpg" alt="Item 2" class="img-fluid">
                                        <p><strong>Item 4 Name</strong></p>
                                        <p><strong>£10.10</strong></p>
                                    </div>

                                    <div class="item-container text-center mx-2 bg-light p-3">
                                        <img src="item_image_url_2.jpg" alt="Item 2" class="img-fluid">
                                        <p><strong>Item 5 Name</strong></p>
                                        <p><strong>£10.10</strong></p>
                                    </div>
                                    <!-- Adjust image URLs, item names, and prices accordingly -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="text-right"><strong>Total cost of the order: £50.50</strong></p>
                </div>

                <div id="account" class="section-content settings-section">

                    <div class="container mt-4">
                        <h2>Account Management</h2>
                        <hr>
                        <form id="userInfoForm">
                            <!-- Edit button -->
                            <button type="button" class="btn btn-primary" id="editBtn">Edit</button>
                            <button type="submit" class="btn btn-success d-none" id="saveBtn">Save</button>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="firstName">First Name:</label>
                                    <input type="text" class="form-control" id="firstName" name="firstName" disabled>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="lastName">Last Name:</label>
                                    <input type="text" class="form-control" id="lastName" name="lastName" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address1">Address Line 1:</label>
                                <input type="text" class="form-control" id="address1" name="address1" disabled>
                            </div>
                            <div class="form-group">
                                <label for="address2">Address Line 2:</label>
                                <input type="text" class="form-control" id="address2" name="address2" disabled>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="city">City:</label>
                                    <input type="text" class="form-control" id="city" name="city" disabled>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="county">County:</label>
                                    <input type="text" class="form-control" id="county" name="county" disabled>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="postcode">Postcode:</label>
                                    <input type="text" class="form-control" id="postcode" name="postcode" disabled>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" id="email" name="email" disabled>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="phone">Phone Number:</label>
                                    <input type="tel" class="form-control" id="phone" name="phone" disabled>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="birthday">Birthday:</label>
                                    <input type="date" class="form-control" id="birthday" name="birthday" disabled>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div id="improve">
                    <div class="container">
                        <h2>Help us with feedback</h2>
                        <hr>
                        <p>Please send your feedback to:</p>
                        <p><a href="mailto:feedback@example.com">feedback@example.com</a></p>
                        <p>Feel free to reach out with your thoughts or suggestions!</p>
                    </div>
                </div>

                <a href="#orders" class="back-to-top btn btn-primary">
                <button class="btn btn-primary" onclick="backToTop()">Back to Top</button>
                </a>
            </div>
            <!-- Add more divs for other sections -->
        </div>


    </div>
    </div>
    </div>
    @include('footer')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
       rollToSection(sectionId) {
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
                scrollToSection(targetSectionId); // Corrected function name
            });
        });
    </script>

    <script>
   .ready(function () {
            // Edit button click event
            $('#editBtn').on('click', function () {
                $('#userInfoForm input').prop('disabled', false); // Enable all input fields
                $('#editBtn').addClass('d-none'); // Hide Edit button
                $('#saveBtn').removeClass('d-none'); // Show Save button
            });

            // Save button click event (you can handle form submission here)
            $('#saveBtn').on('click', function () {
                $('#userInfoForm input').prop('disabled', true); // Disable all input fields
                $('#editBtn').removeClass('d-none'); // Show Edit button
                $('#saveBtn').addClass('d-none'); // Hide Save button

                // P        ission using AJAX or other method if required
                // E                // $        ).submit(); // Submit the form
            });
        });
    </script>

</body>

</html>