

@include('user.layouts.header')

<body id="page-top">

@include('user.layouts.nav')



<div id="wrapper">
    @include('user.layouts.sidebar')

    <div id="content-wrapper">

        <div class="container-fluid">

            <!-- Breadcrumbs-->


            <!-- Icon Cards-->
            <div class="row">

            </div>

        <!-- main content-->
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 mb-5">
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
                    <span>Create By © Md. Saem Abdullah</span>
                </div>
            </div>
        </footer>
    </div>
    <!-- /.content-wrapper -->
</div>
<!-- /#wrapper -->

    @include('user.layouts.footer')

</body>
</html>
