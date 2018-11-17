<?php $__env->startSection('title', 'Item Categories'); ?>
<?php $__env->startSection('block-header', 'Item Categories'); ?>
<?php $__env->startSection('head'); ?>
    <link href="<?php echo e(asset('/inpos/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
    <script src="<?php echo e(asset('inpos/plugins/jquery-datatable/jquery.dataTables.js')); ?>"></script>
    <script src="<?php echo e(asset('inpos/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')); ?>"></script>
    <script src="<?php echo e(asset('inpos/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js')); ?>"></script>
    <script src="<?php echo e(asset('inpos/js/pages/tables/jquery-datatable.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <a href="<?php echo e(route('category.create')); ?>" class="btn btn-success">Add New Item Category</a>
                </div>

                <div class="body">
                    <?php echo $__env->make('layouts.messages', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable js-exportable">
                            <thead>
                            <tr>
                                <th>Sl. No.</th>
                                <th>Category Name</th>
                                <th>Category Slug</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Sl. No.</th>
                                <th>Category Name</th>
                                <th>Category Slug</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->index+1); ?></td>
                                    <td><?php echo e($category->name); ?></td>
                                    <td><?php echo e($category->slug); ?></td>
                                    <td>
                                        <a class="btn btn-primary waves-effect" href="<?php echo e(route('category.edit', $category->id)); ?>">
                                            <i class="material-icons">mode_edit</i>
                                        </a>
                                        <form style="display: inline;" action="<?php echo e(route('category.destroy', $category->id)); ?>" method="post" onsubmit="return confirm('Are you sure you want to delete <?php echo e($category->name); ?>');">
                                            <?php echo e(method_field('DELETE')); ?>

                                            <?php echo csrf_field(); ?>
                                            <button class="btn btn-danger waves-effect" type="submit">
                                                <i class="material-icons">delete</i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.pos', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>