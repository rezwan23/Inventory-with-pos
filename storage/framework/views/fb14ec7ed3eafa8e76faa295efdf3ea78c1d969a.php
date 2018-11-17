<?php $__env->startSection('title', 'Item Categories'); ?>
<?php $__env->startSection('block-header', 'Add Category'); ?>
<?php $__env->startSection('head'); ?>
    <link href="<?php echo e(asset('inpos/plugins/bootstrap-select/css/bootstrap-select.css')); ?>" rel="stylesheet" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
    <script src="<?php echo e(asset('inpos/plugins/bootstrap-select/js/bootstrap-select.js')); ?>"></script>
    <script>
        var inputBox = document.getElementById('catName');

        inputBox.onkeyup = function(){
            document.getElementById('catSlug').value = inputBox.value.replace(/\s+/g, '-').toLowerCase();
        }
    </script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="body">
                    <?php echo $__env->make('layouts.messages', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <form action="<?php echo e(route('category.store')); ?>" method="post">
                        <div class="row clearfix">
                            <?php echo csrf_field(); ?>
                            <div class="col-sm-6">
                                <label for="name">Category Name (Required)***</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input class="form-control" id="catName" placeholder="Enter Item Category Name" type="text" name="name">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="name">Category Slug (Required)***</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input class="form-control" id="catSlug" placeholder="Enter Item Category Slug" type="text" name="slug">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.pos', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>