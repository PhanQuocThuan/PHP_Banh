<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"
         rel="stylesheet" crossorigin="anonymous" />
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="{{ asset('/css/admin.css') }}" rel="stylesheet" />
    <title>@yield('title', 'Admin - Project')</title>
</head>

<body>
    <div class="row g-0">
<div class="p-3 col-2 text-white bg-dark ">
    <a href="/admin" class="text-white text-decoration-none ">
        <span class="fs-4">Admin Panel</span>
    </a>
    <hr />
    <ul class="nav flex-column">
        <li><a href="{{ route('admin.home.index') }}" 
            class="nav-link text-white">Admin - Dashboard</a></li>
        <li><a href="{{ route('admin.user.index') }}" 
            class="nav-link text-white">Admin - User</a></li>
        <li><a href="{{ route('admin.product.index') }}" 
            class="nav-link text-white">Admin - Product</a></li>       
        <li><a href="{{ route('admin.type.index') }}" 
            class="nav-link text-white">Admin - Type</a></li>
        {{--<li><a href="{{ route('admin.shifts.index') }}" 
            class="nav-link text-white">- Admin - Shift</a></li>
        <li><a href="{{ route('admin.reports.index') }}" 
            class="nav-link text-white">- Admin - Report</a></li> --}}
    </ul>
    @if (auth()->check())
        <form action="{{ route('logout') }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="nav-link text-warning active btn btn-link text-uppercase" style="text-decoration: none;">Đăng xuất</button>
        </form>
    @endif
</div>
<!-- sidebar -->
        <div class="col content-grey">
            <nav class="p-3 shadow text-end">
                <span class="profile-font">Admin</span>
                <img class="img-profile rounded-circle" src="{{ asset('/img/undraw_profile.svg') }}">
            </nav>
            <div class="g-0 m-5">
                @yield('content')
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
</body>

</html>
