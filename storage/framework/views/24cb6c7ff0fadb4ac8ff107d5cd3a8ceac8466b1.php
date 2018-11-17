<?php $__env->startSection('title', 'POS'); ?>
<?php $__env->startSection('head'); ?>
    <link href="<?php echo e(asset('/inpos/css/jquery-ui.minb.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('/inpos/plugins/jquery-spinner/css/bootstrap-spinner.css')); ?>" rel="stylesheet">
    <style>
        .lds-ellipsis {
            display: inline-block;
            position: relative;
            width: 64px;
            height: 11px;
        }
        .lds-ellipsis div {
            position: absolute;
            top: 0px;
            width: 11px;
            height: 11px;
            border-radius: 50%;
            background: #009688;
            animation-timing-function: cubic-bezier(0, 1, 1, 0);
        }
        .lds-ellipsis div:nth-child(1) {
            left: 6px;
            animation: lds-ellipsis1 0.6s infinite;
        }
        .lds-ellipsis div:nth-child(2) {
            left: 6px;
            animation: lds-ellipsis2 0.6s infinite;
        }
        .lds-ellipsis div:nth-child(3) {
            left: 26px;
            animation: lds-ellipsis2 0.6s infinite;
        }
        .lds-ellipsis div:nth-child(4) {
            left: 45px;
            animation: lds-ellipsis3 0.6s infinite;
        }
        @keyframes  lds-ellipsis1 {
            0% {
                transform: scale(0);
            }
            100% {
                transform: scale(1);
            }
        }
        @keyframes  lds-ellipsis3 {
            0% {
                transform: scale(1);
            }
            100% {
                transform: scale(0);
            }
        }
        @keyframes  lds-ellipsis2 {
            0% {
                transform: translate(0, 0);
            }
            100% {
                transform: translate(19px, 0);
            }
        }
    </style>
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
    <script src="<?php echo e(asset('inpos/js/jquery-ui.min.js')); ?>"></script>
    <script src="<?php echo e(asset('inpos/plugins/jquery-spinner/js/jquery.spinner.js')); ?>"></script>
    <script src="<?php echo e(asset('inpos/js/pos-scripts.js')); ?>"></script>
    <script>
        $('aside#leftsidebar').addClass('m-l--300');
        $('section.content').addClass('m-l-15');
        $('.left_text').addClass('m-l-55');
    </script>
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo e(csrf_field()); ?>

    <div class="row clearfix">
        <div class="col-md-4">
            <div class="row" id="messageDiv" style="display: none">
                <div class="col-md-12">
                    <div class="alert alert-success">
                        <a class="close" href="javascript:void(0);" onclick="closeMessage();">x</a>
                        <strong>Success! </strong><span id="message"></span>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="header loader-div">
                    <h2 style="display: inline-block;">
                        Cart 
                    </h2>
                    <div class="lds-ellipsis m-l-25" style="display: none"><div></div><div></div><div></div><div></div></div>
                </div>
                <div class="body">
                    <div class="carts">
                        <div id="tblDiv">
                            <?php if(count($carts)>0): ?>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Item</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>

                                    <?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <th scope="row"><?php echo e($cart->name); ?></th>
                                            <td><?php echo e($cart->cart_quantity); ?></td>
                                            <td><?php echo e($cart->retail_price*$cart->cart_quantity); ?></td>
                                            <td>
                                                <a href="javascript:void(0);" class="col-red" id="deleteCartItem">
                                                    <i class="material-icons">delete</i>
                                                    <input type="hidden" value="<?php echo e($cart->cart_id); ?>" id="cartId">
                                                </a>
                                            </td>
                                        </tr><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </tbody>
                            </table>
                            <div class="pull-right m-b-10 m-r-10">
                                <a href="javascript:void(0);" id="delallcart" class="btn btn-danger m-r-10">Suspend</a>
                                <a href="" class="btn btn-success">Payment</a>
                            </div>
                            <?php else: ?>
                                <p>Select Items</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="border-bottom" style="padding: 15px 15px 0px 15px;">
                    <div class="row clearfix">
                        <div class="col-sm-6">
                            <div class="form-group" style="margin-bottom: 0px;">
                                <div class="form-line">
                                    <input class="form-control" onkeyup="myFunction();" placeholder="Search Product Item Here" type="text" name="produceitem" id="myInput">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="body">
                    <div id="itemswrapper">
                        <div class="row" id="allItems">
                            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-4 col-sm-6" id="singleItem">
                                <div class="card clearfix">
                                    <div class="itemwrapper text-center">
                                        <div id="itemSingle">
                                            <input type="hidden" id="itemid" value="<?php echo e($item->id); ?>">
                                            <input type="hidden" id="itemName" value="<?php echo e($item->name); ?>">
                                            <h2><?php echo e($item->name); ?></h2>
                                            <img src="<?php echo e(asset('/images/items/'.$item->image)); ?>" alt="">
                                            <p class="price">Price: <?php echo e($item->retail_price); ?> BDT (<span id="stock" class="quantity"><?php echo e($item->quantity); ?></span>)</p>
                                            <div class="row">
                                                <div class="col-sm-12 margin-0" style="margin-bottom: 0px;">
                                                    <div class="left_text m-l-25">
                                                        <label for="quantity">Quantity</label>
                                                    </div>
                                                    <div class="right_text">
                                                        <div class="input-group spinner" data-trigger="spinner" style="margin-bottom: 5px;">
                                                            <div class="form-line">
                                                                <input class="form-control margin-0 text-center" id="itemquantity" type="text" name="item_quantity"  value="0" data-rule="quantity" style="font-weight: 700;margin-bottom:0px;width: 50px;">
                                                            </div>
                                                            <span class="input-group-addon">
                                                            <a href="javascript:;" class="spin-up" data-spin="up"><i class="glyphicon glyphicon-chevron-up"></i></a>
                                                            <a href="javascript:;" class="spin-down" data-spin="down"><i class="glyphicon glyphicon-chevron-down"></i></a>
                                                        </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 text-center" style="margin-bottom: 10px;">
                                                    <a class="btn bg-teal" id="addToCartBtn">Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.pos', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>