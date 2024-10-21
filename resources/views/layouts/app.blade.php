<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet" />
    <title>@yield('title', 'Project')</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary py-4">
        <div class="container">
            <a class="navbar-brand" href="/home"><img src="/img/logo.png" alt="logo" class="img-fluid" style="height: 50px"></a>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a href="/home" class="nav-link active">Trang Chủ</a>
                    <a href="/introduce" class="nav-link active">Giới Thiệu</a>
                    <a href="/kind" class="nav-link active">Sản Phẩm</a>
                    <a href="" class="nav-link active">Tin Tức</a>
                    <a href="" class="nav-link active">Liên Hệ</a>
                    @if (auth()->check())
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="nav-link active btn btn-link text-uppercase" style="text-decoration: none;">Đăng xuất</button>
                        </form>
                    @else
                    <a href="/login" class="nav-link active">Đăng nhập</a>
                    @endif
                    <a href="" class="nav-link active"><i class="fa-solid fa-magnifying-glass"></i></a>
                    <a href="/cart" class="nav-link active"><i class="fa-solid fa-cart-shopping"></i></a>
                </div>
            </div>
        </div>
    </nav>
    <div class="card text-bg-dark">
        @yield('backgroup')
      </div>
    <!-- header -->
    <div class="container my-4">
        @yield('content')
    </div>
    <!-- footer -->
    <div class="copyright py-4 text-dark">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h3 class="text-center text-uppercase">TDK</h3>
                    <h4>Các thành viên bao gồm:</h4>
                    <p>Phan Quốc Thuận(23-0-00050)</p>
                    <p>Huỳnh Tiến Đạt(23-0-00049)</p>
                    <p>Phạm Đức Anh Khoa(23-0-00019)</p>
                </div>
                <div class="col">
                    <h3 class="text-center text-uppercase">Chính sách bảo mật</h3>
                    <p>Chính sách thành viên</p>
                    <p>Chính sách thanh toán</p>
                    <p>Hướng dẫn mua hàng</p>
                    <p>Quà tặng tri ân</p>
                    <p>Bảo mật thông tin cá nhân</p>
                </div>
                <div class="col">
                    <h3 class="text-center text-uppercase">Thông tin chung</h3>
                    <p class="text">Địa Chỉ: <a href="" class="text-decoration-none text-black">Công viên Phần Mềm Quang Trung, Lô 14 Đường Số 5, Tân Hưng Thuận, Quận 12, Hồ Chí Minh 70000, Việt Nam</a></p>
                    <p class="text">Điện thoại: <a href="" class="text-decoration-none text-black">0909090909</a></p>
                    <p class="text">Email: <a href="" class="text-decoration-none text-black">TDX@gmail.com</a></p>
                </div>
                <div class="col">
                    <h3 class="text-center text-uppercase">Hỗ trợ</h3>
                    <p>Mua Online hỗ trợ 24/7</p>
                    <h5>0909090909</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- footer -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
</body>
</html>
