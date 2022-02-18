@include("admin/layouts/header")
<!-- navbar -->
@include("admin/layouts/topnav")
<div class="main-container ace-save-state" id="main-container">

<!-- SideBar Paste -->
@include("admin/layouts/sidebar")
    <div class="main-content">
        <div class="main-content-inner">
            <div class="page-content">
                @yield("content")
            </div>
        </div>
    </div>
    <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
        <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
    </a>
</div>


@include("admin/layouts/footer")