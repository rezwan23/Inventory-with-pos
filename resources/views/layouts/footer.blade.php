<!-- Jquery Core Js -->
<script src="{{asset('inpos/plugins/jquery/jquery.min.js')}}"></script>

<!-- Bootstrap Core Js -->
<script src="{{asset('inpos/plugins/bootstrap/js/bootstrap.js')}}"></script>

<!-- Select Plugin Js -->
<script src="{{asset('inpos/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>

<!-- Slimscroll Plugin Js -->
<script src="{{asset('inpos/plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>

<!-- Waves Effect Plugin Js -->
<script src="{{asset('inpos/plugins/node-waves/waves.js')}}"></script>

<!-- Jquery CountTo Plugin Js -->
<script src="{{asset('inpos/plugins/jquery-countto/jquery.countTo.js')}}"></script>

<!-- Morris Plugin Js -->
<script src="{{asset('inpos/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{asset('inpos/plugins/morrisjs/morris.js')}}"></script>

<!-- ChartJs -->
<script src="{{asset('inpos/plugins/chartjs/Chart.bundle.js')}}"></script>

<!-- Flot Charts Plugin Js -->
@if(\Illuminate\Support\Facades\Route::currentRouteName()=='home')
<script src="{{asset('inpos/plugins/flot-charts/jquery.flot.js')}}"></script>
<script src="{{asset('inpos/plugins/flot-charts/jquery.flot.resize.js')}}"></script>
<script src="{{asset('inpos/plugins/flot-charts/jquery.flot.pie.js')}}"></script>
<script src="{{asset('inpos/plugins/flot-charts/jquery.flot.categories.js')}}"></script>
<script src="{{asset('inpos/plugins/flot-charts/jquery.flot.time.js')}}"></script>
<script src="{{asset('inpos/js/pages/index.js')}}"></script>
@endif
<!-- Sparkline Chart Plugin Js -->
<script src="{{asset('inpos/plugins/jquery-sparkline/jquery.sparkline.js')}}"></script>

<!-- Custom Js -->
<script src="{{asset('inpos/js/admin.js')}}"></script>


<!-- Demo Js -->
<script src="{{asset('inpos/js/demo.js')}}"></script>
<script src="{{asset('inpos/js/script.js')}}"></script>
@if(\Illuminate\Support\Facades\Route::currentRouteName()!='home')
    <script src="{{asset('/inpos/js/inpos.js')}}"></script>
    @endif
@yield('footer')
</body>

</html>
