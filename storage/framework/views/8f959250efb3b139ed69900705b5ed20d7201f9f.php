<div class="row clearfix">
    <div class="col-sm-6">
    <?php if($errors->has('email') || $errors->has('password')): ?>
        <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            Opps! Wrong Credentials..
        </div>
    <?php endif; ?>
    <?php if(\Illuminate\Support\Facades\Session::has('success-message')): ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <strong>Success! </strong><?php echo e(\Illuminate\Support\Facades\Session::get('success-message')); ?>

        </div>
    <?php endif; ?>
    <?php if($errors->any()): ?>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                <strong>Error! </strong><?php echo e($error); ?>

            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    <?php if(\Illuminate\Support\Facades\Session::has('error-message')): ?>
        <div class="alert bg-red alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <strong>Error! </strong><?php echo e(\Illuminate\Support\Facades\Session::get('error-message')); ?>

        </div>
    <?php endif; ?>
    </div>
</div>