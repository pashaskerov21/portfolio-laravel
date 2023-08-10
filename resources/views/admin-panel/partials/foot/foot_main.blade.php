        
        
        <!-- Vendor js -->
        <script src="{{asset('admin-assets/js/vendor.min.js')}}"></script>
        <!-- Daterangepicker js -->
        <script src="{{asset('admin-assets/vendor/daterangepicker/moment.min.js')}}"></script>
        <script src="{{asset('admin-assets/vendor/daterangepicker/daterangepicker.js')}}"></script>
        <!-- Apex Charts js -->
        {{-- <script src="{{asset('admin-assets/vendor/apexcharts/apexcharts.min.js')}}"></script> --}}
        <!-- Vector Map js -->
        <script src="{{asset('admin-assets/vendor/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
        <script src="{{asset('admin-assets/vendor/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js')}}"></script>
        <!-- Dashboard App js -->
        <script src="{{asset('admin-assets/js/pages/demo.dashboard.js')}}"></script>
        <!-- App js -->
        <script src="{{asset('admin-assets/js/app.min.js')}}"></script>
        
        @stack('js')
       

    </body>

</html>
