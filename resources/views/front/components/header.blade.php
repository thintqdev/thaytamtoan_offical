<div class="overlay"></div>

<div class="utility-nav d-none d-md-block">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <p class="small"><i class="bx bx-envelope"></i> Trương Văn Tâm | <i class="bx bx-phone"></i>
                    (+84) 395822059</p>
                </p>
            </div>

            <div class="col-12 col-md-6 text-right">
                <p class="small">Tiên học lễ, hậu học văn</p>
            </div>
        </div>
    </div>
</div>


<nav class="navbar navbar-expand-md navbar-light bg-light main-menu" style="box-shadow:none">
    <div class="container">

        <button type="button" id="sidebarCollapse" class="btn btn-link d-block d-md-none">
            <i class="fa fa-bars" aria-hidden="true"></i>
        </button>

        <a class="navbar-brand" href="{{ route('front.home') }}">
            <h4 class="font-weight-bold">Thầy Tâm Toán</h4>
        </a>


        <div class="collapse navbar-collapse">
            <form class="form-inline my-2 my-lg-0 mx-auto">
                <input class="form-control" type="search" placeholder="Tìm đề thi, tài liệu,..." aria-label="Search">
                <button class="btn btn-success my-2 my-sm-0" type="submit"><i class="fa fa-search"
                        aria-hidden="true"></i></button>
            </form>

            @guest
                <ul class="navbar-nav">
                    <li class="nav-item ml-md-3">
                        <a class="btn btn-primary" href="{{ route('front.register') }}">Đăng ký</a>
                    </li>
                </ul>
            @endguest
            @auth
                <div class="dropdown">
                    <div class="avatar-container" id="dropdownNotificationList" type="button">
                        <img src="{{ !is_null($user) && $user->avatar_path ?  $user->avatar_path : 'https://static.vecteezy.com/system/resources/previews/026/434/409/non_2x/default-avatar-profile-icon-social-media-user-photo-vector.jpg' }}" alt="Avatar" class="avatar">
                        <div class="notification-badge">
                            <span class="badge badge-danger">3</span>
                        </div>
                    </div>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="notificationDropdownMenu">
                        <div class="notification-item">
                            <div class="notification-item-content">
                                <div class="notification-item-content-left">
                                    <img src="/assets/img/img-01.jpg" alt="Avatar" class="avatar">
                                </div>
                                <div class="notification-item-content-right">
                                    <p class="notification-item-content-right-title">Trần Quang Thìn</p>
                                    <p class="notification-item-content-right-description">Đã đăng ký thi môn Toán vào ngày
                                        20/10/2021
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="notification-item">
                            <div class="notification-item-content">
                                <div class="notification-item-content-left">
                                    <img src="/assets/img/img-01.jpg" alt="Avatar" class="avatar">
                                </div>
                                <div class="notification-item-content-right">
                                    <p class="notification-item-content-right-title">Trần Quang Thìn</p>
                                    <p class="notification-item-content-right-description">Đã đăng ký thi môn Toán vào ngày
                                        20/10/2021
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="notification-item yet-read">
                            <div class="notification-item-content">
                                <div class="notification-item-content-left">
                                    <img src="/assets/img/img-01.jpg" alt="Avatar" class="avatar">
                                </div>
                                <div class="notification-item-content-right">
                                    <p class="notification-item-content-right-title">Trần Quang Thìn</p>
                                    <p class="notification-item-content-right-description">Đã đăng ký thi môn Toán vào ngày
                                        20/10/2021
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="view-all-notification text-center">
                            <a href="#" class="">Xem tất cả thông báo</a>
                        </div>
                    </div>

                    <div class="dropdown">
                        <span class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            {{ $user->full_name }}
                        </span>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="userDropdownMenu">
                            <!-- Nội dung dropdown menu cho dropdownMenuButton -->
                            <a class="dropdown-item" href="/profile.html"><i class="fa fa-user mr-2"></i>Trang cá nhân</a>
                            <a class="dropdown-item" href="/result_exams.html"><i class="fa fa-graduation-cap mr-2"></i>Kết
                                quả
                                thi</a>
                            <a class="dropdown-item" href="/change_password.html"><i class="fa fa-key mr-2"></i>Đổi mật
                                khẩu</a>
                            <a class="dropdown-item" href="{{ route('front.logout') }}"><i class="fa fa-door-open mr-2"></i>Đăng xuất</a>
                        </div>
                    </div>

                </div>
            @endauth

        </div>
</nav>

<nav class="navbar navbar-expand-md navbar-light bg-light sub-menu">
    <div class="container">
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item {{ active_menu(['front.home']) }}">
                    <a class="nav-link" href="/index.html">Trang chủ <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item {{ active_menu(['front.documents.list']) }}">
                    <a class="nav-link" href="/document_list.html">Tài liệu</a>
                </li>
                <li class="nav-item {{ active_menu(['front.exams.list']) }}">
                    <a class="nav-link" href="/exams.html">Đề thi</a>
                </li>
                <li class="nav-item {{ active_menu(['front.community']) }}">
                    <a class="nav-link" href="/community.html">Thảo luận</a>
                </li>
                <li class="nav-item dropdown {{ active_menu(['front.videos.list']) }}">
                    <a class="nav-link" href="/video_lecture.html">
                        Video bài giảng
                    </a>
                </li>
                <li class="nav-item {{ active_menu(['front.about_us']) }}">
                    <a class="nav-link" href="/about_us.html">Về chúng tôi</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="search-bar d-block d-md-none">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form class="form-inline mb-3 mx-auto">
                    <input class="form-control" type="search" placeholder="Search for products..."
                        aria-label="Search">
                    <button class="btn btn-success" type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>
