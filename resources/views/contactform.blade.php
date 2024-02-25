<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maven - Contact Form</title>
    @include('css')
    <link rel="icon" href="/resources/images/public/Icon.png">

    <style>
body {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
    background-image: url('{{ asset("images/mountainbackground.jpg") }}');
    background-size: cover;
    background-position: center;
    color: #333;
    margin: 0;
    padding: 0;
}

form {
    width: 90%;
    margin: 0 auto;
}

input, textarea {
    width: 100%;
    box-sizing: border-box;
}

header, footer {
    flex-shrink: 0;
}

main {
    flex: 1 0 auto;
    padding: 20px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.container-1 {
    border: 1px solid #ccc;
    padding: 20px;
    width: 100%;
    max-width: 600px;
    text-align: center;
    box-shadow: 0 0 15px rgba(0,0,0,0.2);
    border-radius: 15px;
    background-color: rgba(255, 255, 255, 0.9);
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    transition: all 0.3s ease;
}

h1 {
    text-align: center;
    margin-bottom: 20px;
    color: #007BFF;
}

.form-group {
    margin-bottom: 15px;
}

label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

button1 {
    display: block;
    width: 100%;
    padding: 10px;
    background-color: #007BFF;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 18px;
    transition: background-color 0.3s ease;
}

.confirmation {
    font-style: bold;
    color: #000000;
}

input::placeholder, textarea::placeholder {
    font-weight: bold;
}


    </style>
</head>

<body>
    @include('nav')
    <main>
        <div class="content-wrapper">
            <h2 class="pb-2 border-bottom">Maven - Contact Us Form</h2><br>
            <div class="container-1">
                <h1>Contact Us</h1>
                <form action="/contact" method="post">
                    <p class="confirmation"><b>Do you have questions about our products? Please share your contact details and we'll respond as quickly as we can.</b></p>
                    @csrf
                    <div class="form-group">
                        <input type="text" id="name" name="name" required placeholder= "Your Name">
                    </div>
                    <div class="form-group">
                        <input type="email" id="email" name="email" required placeholder="Your Email">
                    </div>
                    <div class="form-group">
                        <textarea id="message" name="message" rows="5" required placeholder="Your Message"></textarea>
                    </div>
                    <div class="form-group">
                        <button1 type="submit">Submit</button1>
                    </div>
                </form>
            </div>
        </div>
    </main>
    @include('footer')
</body>

</html>
