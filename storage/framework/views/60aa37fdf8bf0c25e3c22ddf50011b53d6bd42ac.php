<?php $__env->startSection('title', 'Employees'); ?>
<?php $__env->startSection('block-header', 'Edit Employee'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="body">
                    <?php echo $__env->make('layouts.messages', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <form action="<?php echo e(route('employee.update', $employee->id)); ?>" method="post">
                        <?php echo e(method_field('PUT')); ?>

                        <div class="row clearfix">
                            <?php echo csrf_field(); ?>
                            <div class="col-sm-6">
                                <label for="name">Name</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input class="form-control" placeholder="Enter Employee Name" type="text" name="name" value="<?php echo e($employee->name); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="email">Email</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input class="form-control" placeholder="Enter Employee Email" type="text" name="email" value="<?php echo e($employee->email); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="phone">Phone (Required)***</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input class="form-control" placeholder="Enter Employee Phone No." type="text" name="phone" value="<?php echo e($employee->phone); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="designation">Designation</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input class="form-control" placeholder="Enter Employee Designation" type="text" name="designation" value="<?php echo e($employee->designation); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <label for="nid">NID (Required)***</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input class="form-control" placeholder="Enter Employee NID No." type="text" name="nid" value="<?php echo e($employee->nid); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <label for="present_address">Present Address</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input class="form-control" placeholder="Enter Employee present Address" type="text" name="present_address" value="<?php echo e($employee->present_address); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <label for="present_address">Permanent Address</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input class="form-control" placeholder="Enter Employee permanent Address" type="text" name="permanent_address" value="<?php echo e($employee->permanent_address); ?>">
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