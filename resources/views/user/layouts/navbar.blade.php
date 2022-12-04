<div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-lg-5">
        <a href="" class="navbar-brand d-block d-lg-none">
            <h1 class="m-0 display-5 text-capitalize font-italic text-white"><span class="text-primary">Safety</span>First</h1>
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
            <div class="navbar-nav mr-auto py-0">
                <a href="{{ route('user.home') }}" class="nav-item nav-link active">Trang Chủ</a>
                <a href="{{ route('user.about') }}" class="nav-item nav-link">Giới thiệu</a>
                <a href="{{ route('user.services') }}" class="nav-item nav-link">Dịch vụ</a>
                <a href="{{ route('user.price') }}" class="nav-item nav-link">Gói chăm sóc</a>
                <a href="{{ route('user.booking') }}" class="nav-item nav-link">Booking</a>
                <a href="{{ route('user.blog') }}" class="nav-item nav-link">Blog</a>
                <!-- <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Blog</a>
                    <div class="dropdown-menu rounded-0 m-0">
                        <a href="{{ route('user.blog') }}" class="dropdown-item">Blog Grid</a>
                        <a href="{{ route('user.single') }}" class="dropdown-item">Blog Detail</a>
                    </div>
                </div> -->
                <a href="{{ route('user.contact') }}" class="nav-item nav-link">Liên hệ</a>
            </div>
            <!-- <a href="" class="btn btn-lg btn-primary px-3 d-none d-lg-block">Get Quote</a> -->
        </div>
    </nav>
</div>