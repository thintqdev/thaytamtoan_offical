<div class="sidebar-inner slimscroll">
    <div id="sidebar-menu" class="sidebar-menu">
        <div class="header-left">
            <a href="admin/dashboard" class="logo">
                <img src="/storage/logo/logo_admin.png" width="200px" height="40px" alt="logo">
            </a>
        </div>
        <ul class="sidebar-ul">
            <li class="menu-title">Menu</li>
            <li>
                <a href="admin/dashboard"><img src="{{asset("assets/img/sidebar/icon-1.png")}}" alt=" icon"><span>Dashboard</span></a>
            </li>
            <li class="submenu">
                <a href="#"><img src="{{asset("assets/img/sidebar/icon-2.png")}}" alt=" icon">
                    <span> Quản lý lớp học</span>
                    <span class="menu-arrow"></span></a>
                <ul class="list-unstyled" style="display: none;">
                    <li><a href="/groups"><span>Tất cả lớp học</span></a></li>
                    <li><a href="/groups/create"><span>Thêm lớp học</span></a></li>
                    <li><a href="/groups/1/edit"><span>Chỉnh sửa lớp học</span></a></li>
                    <li><a href="/groups/1"><span>Chi tiết lớp học</span></a></li>
                </ul>
            </li>
            <li class="submenu">
                <a href="#"><img src="{{asset("assets/img/sidebar/icon-3.png")}}" alt=" icon">
                    <span> Quản lý học sinh</span>
                    <span class="menu-arrow"></span></a>
                <ul class="list-unstyled" style="display: none;">
                    <li><a href="all-students.html"><span>Tất cả học sinh</span></a></li>
                    <li><a href="about-student.html"><span>Chi tiết học sinh</span></a></li>
                </ul>
            </li>
            <li class="submenu">
                <a href="#"><img src="{{asset("assets/img/sidebar/icon-4.png")}}" alt=" icon">
                    <span> Quản lý tài liệu</span>
                    <span class="menu-arrow"></span></a>
                <ul class="list-unstyled" style="display: none;">
                    <li class=" {{ active_menu(['admin.documents.index']) }}"><a href="{{ route('admin.documents.index')  }}"><span>Tất cả tài liệu</span></a></li>
                    <li class=" {{ active_menu(['admin.documents.create']) }}"><a href="{{ route('admin.documents.create')  }}"><span>Thêm tài liệu</span></a></li>
                </ul>
            </li>
            <li class="submenu">
                <a href="#"><img src="{{asset("assets/img/sidebar/icon-5.png")}}" alt=" icon">
                    <span> Quản lý đề thi</span>
                    <span class="menu-arrow"></span></a>
                <ul class="list-unstyled" style="display: none;">
                    <li><a href="{{ route('admin.exams.index') }}"><span>Tất cả đề thi</span></a></li>
                    <li><a href="add-parent.html"><span>Thêm đề thi</span></a></li>
                </ul>
            </li>
            <li class="submenu">
                <a href="#"><img src="{{asset("assets/img/sidebar/icon-9.png")}}" alt=" icon">
                    <span> Quản lý video</span>
                    <span class="menu-arrow"></span></a>
                <ul class="list-unstyled" style="display: none;">
                    <li><a href="{{ route('admin.videos.index') }}"><span>Tất cả video</span></a></li>
                    <li><a href="{{ route('admin.videos.create') }}"><span>Thêm video</span></a></li>
                </ul>
            </li>
            <li class="submenu">
                <a href="javascript:void(0);"><img src="{{asset("assets/img/sidebar/icon-20.png")}}" alt="icon">
                    <span>Quản lý hỏi đáp</span> <span class="menu-arrow"></span></a>
                <ul style="display: none;">
                    <li class="submenu">
                        <a href="javascript:void(0);"><span>Quản lý câu hỏi</span> <span
                                class="menu-arrow"></span></a>
                        <ul style="">
                            <li class="">
                                <a href="{{route('admin.videos.index')}}"> <span>Danh sách câu hỏi</span></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);"><span>Quản lý đáp</span><span
                                class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="javascript:void(0);"><span>Xem chi tiết</span></a></li>
                            <li class="submenu">
                                <a href="javascript:void(0);"> <span>Danh sách đáp</span></a>
                            </li>
                            <li><a href="javascript:void(0);"><span>Report đáp</span></a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="submenu">
                <a href="#"><img src="{{asset("assets/img/sidebar/icon-10.png")}}" alt=" icon">
                    <span> Quản lý danh mục</span>
                    <span class="menu-arrow"></span></a>
                <ul class="list-unstyled" style="display: none;">
                    <li><a href="{{ route('admin.categories.index') }}"><span>Tất cả danh mục</span></a></li>
                </ul>
            </li>
            <li class="submenu">
                <a href="#"><img src="{{asset("assets/img/sidebar/icon-8.png")}}" alt=" icon">
                    <span> Quản lý tin tức</span>
                    <span class="menu-arrow"></span></a>
                <ul class="list-unstyled" style="display: none;">
                    <li><a href="/groups"><span>Tất cả tin tức</span></a></li>
                    <li><a href="/groups/create"><span>Thêm tin tức</span></a></li>
                    <li><a href="/groups/1/edit"><span>Chỉnh sửa tin tức</span></a></li>
                    <li><a href="/groups/1"><span>Chi tiết tin tức</span></a></li>
                </ul>
            </li>
            <li class="submenu">
                <a href="#"><img src="{{asset("assets/img/sidebar/icon-6.png")}}" alt=" icon">
                    <span> Quản lý hình ảnh</span>
                    <span class="menu-arrow"></span></a>
                <ul class="list-unstyled" style="display: none;">
                    {{-- <li><a href="{{ route('logo.form') }}"><span>Logo</span></a></li> --}}
                    <li><a href="add-parent.html"><span>Banner</span></a></li>
                    <li><a href="edit-parent.html"><span>Vinh danh</span></a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
