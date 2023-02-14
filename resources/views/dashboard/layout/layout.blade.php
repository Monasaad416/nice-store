<!DOCTYPE html>
<html lang="en">

@include('dashboard.layout.head')
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

    @include('dashboard.layout.sidebar')

        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                @include('dashboard.layout.navbar')

                @yield('content')

            </div>
            <!-- End of Main Content -->

         @include('dashboard.layout.footer')


        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                @auth('admin')
                    <form method="post" action="{{route('admin.dashboard.logout')}}">
                @endauth
                @auth('store')
                    <form method="post" action="{{route('store.dashboard.logout')}}">
                @endauth
                    @csrf

                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" >Logout</a>
                </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap core J'avaScript-->
    <script src="{{asset('admin/assets/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin Java'Script-->
    <script src="{{asset('admin/assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts f'or all pages-->
    <script src="{{asset('admin/assets/js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugi'ns -->
    <script src="{{asset('admin/assets/vendor/chart.js/Chart.min.js')}}"></script>

    <!-- Page level custo'm scripts -->
    <script src="{{asset('admin/assets/js/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset('admin/assets/js/demo/chart-pie-demo.js')}}"></script>

    @stack('scripts')



</body>

</html>
