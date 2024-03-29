<!DOCTYPE html>
<html>
<head>
    <title>Maven Products</title>
    <link rel="icon" href="{{ asset('/images/Icon.png') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/71b7145720.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <style>
        .no-margin-padding {
    margin: 0;
    padding: 0;
}

    </style>
</head>
<body>

    <div class="no-margin-padding">

        @if(session('success'))
            <div class="alert alert-success">
              {{ session('success') }}
            </div> 
        @endif
        @yield('content')
    </div>
    
  
@yield('scripts')
</body>
</html>