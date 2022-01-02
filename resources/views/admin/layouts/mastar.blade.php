

@include('admin.layouts.header')

<body id="page-top">

@include('admin.layouts.nav')



<div id="wrapper">
    @include('admin.layouts.sidebar')

    <div id="content-wrapper">

        <div class="container-fluid">

            <!-- Breadcrumbs-->

            <!-- Icon Cards-->
            <div class="row">

            </div>

        <!-- main content-->
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        @yield('content')
                    </div>
                </div>
            </div>
        <!-- end of main content-->
        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Create By © Abdullah Al Murshed</span>
                </div>
            </div>
        </footer>
    </div>
    <!-- /.content-wrapper -->
</div>
<!-- /#wrapper -->

    @include('admin.layouts.footer')

</body>
</html>
