<!DOCTYPE html>
<html>

<head>
    <title>Custom Auth in Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg mb-5" style="background-color: #ffffff;">
        <div class="container">
            <a class="navbar-brand mr-auto" href="#">Laravel 9 - CRUD</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
    <div class="d-flex justify-content-center">
        <ul class="">
            <li>
                <a class="nav-link" href="{{ route('companies.index') }}">Company List</a>
            </li>
        </ul>
    </div>
    @yield('content')
</body>

</html>
