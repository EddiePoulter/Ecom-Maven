<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('/images/Icon.png') }}">
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
    @if($errors->any())
        <script>
            let error_msg = "";
            @foreach($errors->all() as $error)
                error_msg += "{{$error}}\n";
            @endforeach
            alert(error_msg);
        </script>
    @endif
    @if(\Session::has('success'))
        @if(\Session::get('success') === 't')
            <script>alert("Account update successful")</script>
        @endif
    @endif
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-3">
                <!-- Greeting -->
                <div class="greeting">
                    <p class="display-6">Hello {{$first_name}},</p>
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
                                <a class="nav-link scroll" href="#account">Account Management</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link scroll" href="#improve">Help us Improve</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link scroll" href="logout">Sign Out</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <!-- Sections on the right side -->
            <div class="col-md-9">

                <div id="account" class="section-content settings-section">

                    <div class="container mt-4">
                        <h2>Account Management</h2>
                        <hr>
                        <form id="userInfoForm" action="{{ url('account') }}" method="post">
                            @csrf
                            <!-- Edit button -->
                            <button type="button" class="btn btn-primary" id="editBtn">Edit</button>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="firstName">First Name:</label>
                                    <input type="text" class="form-control" id="firstName" name="firstName" value="{{$first_name}}" disabled>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="lastName">Last Name:</label>
                                    <input type="text" class="form-control" id="lastName" name="lastName" value="{{$last_name}}" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address1">Address Line 1:</label>
                                <input type="text" class="form-control" id="address1" name="address1" value="{{$address_1}}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="address2">Address Line 2:</label>
                                <input type="text" class="form-control" id="address2" name="address2" value="{{$address_2}}" disabled>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="city">City:</label>
                                    <input type="text" class="form-control" id="city" name="city" value="{{$city}}" disabled>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="county">County:</label>
                                    <input type="text" class="form-control" id="county" name="county" value="{{$county}}" disabled>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="postcode">Postcode:</label>
                                    <input type="text" class="form-control" id="postcode" name="postcode" value="{{$postcode}}" disabled>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{$email}}" disabled>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="confirmEmail">Confirm email:</label>
                                    <input type="email" class="form-control" id="email_confirmation" name="email_confirmation" value="{{$email}}" disabled>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="password">Password:</label>
                                    <input type="password" class="form-control" id="password" name="password" disabled>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="confirmPassword">Confirm password:</label>
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" disabled>
                                </div>

                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="phone">Phone Number:</label>
                                    <input type="tel" class="form-control" id="phone" name="phone" value="{{$phone_num}}" disabled>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="birthday">Birthday:</label>
                                    <input type="date" class="form-control" id="birthday" name="birthday" value="{{$birthday}}" disabled>
                                </div>
                                <button type="submit" class="btn btn-success d-none" id="saveBtn">Save</button>
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
    @include('footer')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
       function scrollToSection(sectionId) {
           var section = document.getElementById(sectionId);
           if (section) {
               section.scrollIntoView({ behavior: 'smooth', block: 'start' });
           }
       }

        // Event listeners for navbar links to scroll to the respective sections
       document.querySelectorAll('.scroll').forEach(link => {
           link.addEventListener('click', function (e) {
               e.preventDefault();
               var targetSectionId = this.getAttribute('href').substring(1); // Get the section id without the '#'
               scrollToSection(targetSectionId); // Corrected function name
           });
       });
    </script>

    <script>
   $(document).ready(function () {
            // Edit button click event
            $('#editBtn').on('click', function () {
                $('#userInfoForm input').prop('disabled', false); // Enable all input fields
                $('#editBtn').addClass('d-none'); // Hide Edit button
                $('#saveBtn').removeClass('d-none'); // Show Save button
            });

            // Save button click event (you can handle form submission here)
            $('#saveBtn').on('click', function () {
                // $('#userInfoForm input').prop('disabled', true); // Disable all input fields
                // $('#editBtn').removeClass('d-none'); // Show Edit button
                // $('#saveBtn').addClass('d-none'); // Hide Save button

                // P        ission using AJAX or other method if required
                // E                // $        ).submit(); // Submit the form
            });
        });
    </script>

</body>

</html>
