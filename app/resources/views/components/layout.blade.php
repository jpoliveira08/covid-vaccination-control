<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>Home</title>
</head>
<body>
<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-5 d-none d-sm-inline">Menu</span>
                </a>
                <ul class="nav nav-pills flex-column mb-auto" id="menu">
                    <li class="nav-item">
                        <a href="#" class="nav-link px-0 align-middle">
                            <i class="fa-solid fa-users"></i>
                            <span>Employees</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('vaccine.index') }}" class="nav-link px-0 align-middle">
                            <i class="fa-solid fa-syringe"></i>
                            <span>Vaccines</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col py-3">
            <h1>{{ $heading }}</h1>
            {{ $slot }}
        </div>
    </div>
</div>
</body>
</html>
