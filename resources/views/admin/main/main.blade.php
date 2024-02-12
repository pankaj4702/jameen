<!DOCTYPE html>
<html lang="en">

    @include('admin.layouts.head')

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">


    @include('admin.layouts.navbar')

    @include('admin.layouts.sidebar')

        <div class="content-wrapper">
            <!-- main content -->
            @yield('content-admin')
            <!-- end main content -->
        </div>

    <aside class="control-sidebar control-sidebar-dark">
    </aside>

    @include('admin.layouts.footer')

</div>
    @include('admin.layouts.scripts')

</body>
</html>
