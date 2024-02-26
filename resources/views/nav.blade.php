<style>
    .dropdown-menu.dropdown-slide {
        display: none;
        position: absolute;
        top: 100%;
        left: 0;
        z-index: 1000;
        float: left;
        min-width: 10rem;
        padding: 0.5rem 0;
        margin: 0.125rem 0 0;
        font-size: 1rem;
        color: #212529;
        text-align: left;
        list-style: none;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid rgba(0, 0, 0, .15);
        border-radius: .25rem;
        transition: opacity 0.15s;
    }

    .dropdown-menu.dropdown-slide.show {
        display: block;
        animation: slideDown 0.3s ease-in-out forwards;
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
<link rel="icon" href="{{ asset('/images/Icon.png') }}">

<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
    <div class="container">
        <a class="navbar-brand" href="{{ route('index') }}">Maven.</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
            <form class="d-flex">
                <input class="form-control me-2 searchNav" type="search" placeholder="Search a product, brand,..."
                    aria-label="Search" style="width: 300px;"> <!-- Adjust width here -->
                <button class="btn btn-outline-primary" type="submit">Search</button>
            </form>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('products') }}">Products</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Account
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @if (Auth::check())
                            <li><a href="{{ route('account') }}" class="dropdown-item">Manage Account</a></li>
                            <li><a href="{{ route('logout') }}" class="dropdown-item">Log Out</a></li>
                        @else
                            <li><a class="dropdown-item" href="{{ route('login') }}">Log In</a></li>
                            <li><a class="dropdown-item" href="{{ route('signup') }}">Sign Up</a> </li>
                        @endif
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cart') }}">Basket</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
