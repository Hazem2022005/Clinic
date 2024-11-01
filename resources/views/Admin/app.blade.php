@include('admin.layout.head')

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        @include('admin.layout.nav')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @include('admin.layout.header')

            <!-- Main content -->
            @yield('content')
            <!-- /.content -->
        </div>
        @include('admin.layout.footer')
    </div>
    <!-- ./wrapper -->

    @include('admin.layout.scripts')
</body>

</html>