<!-- Jquery Core Js -->
<script src="<?php echo e(asset('inpos/plugins/jquery/jquery.min.js')); ?>"></script>

<!-- Bootstrap Core Js -->
<script src="<?php echo e(asset('inpos/plugins/bootstrap/js/bootstrap.js')); ?>"></script>

<!-- Select Plugin Js -->
<script src="<?php echo e(asset('inpos/plugins/bootstrap-select/js/bootstrap-select.js')); ?>"></script>

<!-- Slimscroll Plugin Js -->
<script src="<?php echo e(asset('inpos/plugins/jquery-slimscroll/jquery.slimscroll.js')); ?>"></script>

<!-- Waves Effect Plugin Js -->
<script src="<?php echo e(asset('inpos/plugins/node-waves/waves.js')); ?>"></script>

<!-- Jquery CountTo Plugin Js -->
<script src="<?php echo e(asset('inpos/plugins/jquery-countto/jquery.countTo.js')); ?>"></script>

<!-- Morris Plugin Js -->
<script src="<?php echo e(asset('inpos/plugins/raphael/raphael.min.js')); ?>"></script>
<script src="<?php echo e(asset('inpos/plugins/morrisjs/morris.js')); ?>"></script>

<!-- ChartJs -->
<script src="<?php echo e(asset('inpos/plugins/chartjs/Chart.bundle.js')); ?>"></script>

<!-- Flot Charts Plugin Js -->
<?php if(\Illuminate\Support\Facades\Route::currentRouteName()=='home'): ?>
<script src="<?php echo e(asset('inpos/plugins/flot-charts/jquery.flot.js')); ?>"></script>
<script src="<?php echo e(asset('inpos/plugins/flot-charts/jquery.flot.resize.js')); ?>"></script>
<script src="<?php echo e(asset('inpos/plugins/flot-charts/jquery.flot.pie.js')); ?>"></script>
<script src="<?php echo e(asset('inpos/plugins/flot-charts/jquery.flot.categories.js')); ?>"></script>
<script src="<?php echo e(asset('inpos/plugins/flot-charts/jquery.flot.time.js')); ?>"></script>
<script src="<?php echo e(asset('inpos/js/pages/index.js')); ?>"></script>
<?php endif; ?>
<!-- Sparkline Chart Plugin Js -->
<script src="<?php echo e(asset('inpos/plugins/jquery-sparkline/jquery.sparkline.js')); ?>"></script>

<!-- Custom Js -->
<script src="<?php echo e(asset('inpos/js/admin.js')); ?>"></script>


<!-- Demo Js -->
<script src="<?php echo e(asset('inpos/js/demo.js')); ?>"></script>
<script src="<?php echo e(asset('inpos/js/script.js')); ?>"></script>
<?php if(\Illuminate\Support\Facades\Route::currentRouteName()!='home'): ?>
    <script src="<?php echo e(asset('/inpos/js/inpos.js')); ?>"></script>
    <?php endif; ?>
<?php echo $__env->yieldContent('footer'); ?>
</body>

</html>
