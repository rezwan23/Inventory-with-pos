<?php $__env->startSection('title', 'Customers'); ?>
<?php $__env->startSection('block-header', 'Customers'); ?>
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
                    <a href="<?php echo e(route('customer.create')); ?>" class="btn btn-success">Add New Customer</a>
                    <form action="<?php echo e(route('customer.import')); ?>" enctype="multipart/form-data" method="post">
                        <?php echo csrf_field(); ?>
                        <input type="file" name="file">
                        <button class="btn btn-primary" type="submit">Upload</button>
                    </form>
                </div>

                <div class="body">
                    <?php echo $__env->make('layouts.messages', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable js-exportable">
                            <thead>
                            <tr>
                                <th>Sl. No.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>TIN Number</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Sl. No.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>TIN Number</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($loop->index+1); ?></td>
                                <td><?php echo e($customer->name); ?></td>
                                <td><?php echo e($customer->email); ?></td>
                                <td><?php echo e($customer->phone); ?></td>
                                <td><?php echo e($customer->address); ?></td>
                                <td><?php echo e($customer->tin_number); ?></td>
                                <td>
                                    <a class="btn btn-primary waves-effect" href="<?php echo e(route('customer.edit', $customer->id)); ?>">
                                        <i class="material-icons">mode_edit</i>
                                    </a>
                                    <form style="display: inline;" action="<?php echo e(route('customer.destroy', $customer->id)); ?>" method="post" id="delcustomer" onsubmit="return confirm('Are you sure you want to delete <?php echo e($customer->name); ?>');">
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