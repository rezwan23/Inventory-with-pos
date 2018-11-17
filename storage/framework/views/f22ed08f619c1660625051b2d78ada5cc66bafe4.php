<?php $__env->startSection('title', 'Accounts'); ?>
<?php $__env->startSection('head'); ?>
    <link href="<?php echo e(asset('/inpos/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('/inpos/plugins/bootstrap-select/css/bootstrap-select.css')); ?>" rel="stylesheet" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
    <script src="<?php echo e(asset('inpos/plugins/jquery-datatable/jquery.dataTables.js')); ?>"></script>
    <script src="<?php echo e(asset('inpos/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')); ?>"></script>
    <script src="<?php echo e(asset('inpos/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js')); ?>"></script>
    <script src="<?php echo e(asset('inpos/js/pages/tables/jquery-datatable.js')); ?>"></script>
    <script src="<?php echo e(asset('inpos/plugins/bootstrap-select/js/bootstrap-select.js')); ?>"></script>
    <script src="<?php echo e(asset('inpos/js/account-page-scripts.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="rifat">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <button type="button" class="btn btn-success waves-effect m-r-20" id="addNewBtn" data-toggle="modal" data-target="#largeModal">Add Account</button>
                </div>

                <div class="body">
                    <?php echo $__env->make('layouts.messages', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <div class="messageDiv" style="display: none;transition: all .5s">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="alert alert-success">
                                    <a class="close" href="javascript:void(0);" onclick="closeMessage();"><i class="material-icons">refresh</i></a>
                                    <strong>Success! </strong><span id="message"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable js-exportable">
                                <thead>
                                <tr>
                                    <th>Sl. No</th>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Acc No.</th>
                                    <th>Bank Name</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Sl. No</th>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Acc No.</th>
                                    <th>Bank Name</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($loop->index+1); ?></td>
                                        <td><?php echo e($account->name); ?></td>
                                        <td><?php echo e($account->type); ?></td>
                                        <td><?php echo e($account->acc_no); ?></td>
                                        <td><?php echo e($account->bank_name); ?></td>
                                        <td><?php echo e($account->bank_address); ?></td>
                                        <td>
                                            <a class="btn btn-primary waves-effect" href="javascript:void(0)" id="editAccountBtn">
                                                <i class="material-icons">mode_edit</i>
                                                <input type="hidden" id="editId" value="<?php echo e($account->id); ?>">
                                            </a>
                                            <form style="display: inline;" action="<?php echo e(route('account.destroy', $account->id)); ?>" method="post" id="delcustomer" onsubmit="return confirm('Are you sure you want to delete <?php echo e($account->name); ?>');">
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
    </div>
    <div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="largeModalLabel">Add Account</h4>
                </div>
                <div class="modal-body">
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Account Name <span class="acc_name_err_message label label-warning"></span></label>
                                <div class="form-line">
                                    <input type="text" class="form-control" placeholder="Account Name" name="name" id="name">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="type">Type <span class="type_err_message label label-warning"></span></label>
                                <div class="form-line">
                                    <select class="form-control show-tick" name="type" id="type">
                                        <option value="0">Select Account Type</option>
                                        <option value="cash">Cash Account</option>
                                        <option value="saving">Saving Account</option>
                                        <option value="chequing">Chequing Account</option>
                                        <option value="credit">Credit Account</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 bank_info">
                            <div class="form-group">
                                <label for="acc_no">Account Number <span class="acc_no_err_message label label-warning"></span></label>
                                <div class="form-line">
                                    <input type="text" class="form-control" placeholder="Account Number" name="acc_no" id="acc_no">
                                    <input type="hidden" id="modalId">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 bank_info">
                            <div class="form-group">
                                <label for="bank_name">Bank Name <span class="bank_name_err_message label label-warning"></span></label>
                                <div class="form-line">
                                    <input type="text" class="form-control" placeholder="Bank Name" name="bank_name" id="bank_name">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 bank_info">
                            <div class="form-group">
                                <label for="bank_address">Bank Address <span class="address_err_message label label-warning"></span></label>
                                <div class="form-line">
                                    <input type="text" class="form-control" placeholder="Bank Address" name="bank_address" id="bank_address">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="opening_balance">Opening Balance <span class="opening_balance_err_message label label-warning"></span></label>
                                <div class="form-line">
                                    <input type="text" value="0" class="form-control" placeholder="Opening Balance" name="opening_balance" id="opening_balance">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php echo csrf_field(); ?>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning waves-effect" id="editBtn" style="display: none;">Update Account</button>
                    <button type="button" class="btn btn-primary waves-effect" id="addAccount">Add Account</button>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.pos', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>