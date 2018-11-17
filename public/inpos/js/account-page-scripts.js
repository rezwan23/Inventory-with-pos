

$(document).ready(function(){


    // Updating Bank info while selecting account type as 'Cash'

    $('select#type').on('change', function(){
        var type = $(this).val();
        if (type == 'cash'){
            $('#acc_no').val('NA').change();
            $('#bank_name').val('NA').change();
            $('#bank_address').val('NA').change();
        }
    });

    // Updating modal DOM whiile clicking the 'Add New Account' Button

    $(document).on('click', '#addNewBtn', function(){
        $('.acc_name_err_message').text('');
        $('.acc_no_err_message').text('');
        $('.bank_name_err_message').text('');
        $('.type_err_message').text('');
        $('.address_err_message').text('');
        $('.opening_balance_err_message').text('');
        $('#addAccount').css('display', 'block');
        $('#editBtn').css('display', 'none');
        $('#largeModalLabel').text("Add Account");
        $('#name').val('').change();
        $("#type").prop("selectedIndex", 0).change();
        $('#acc_no').val('').change();
        $('#bank_name').val('').change();
        $('#opening_balance').val('').change();
        $('#bank_address').val('').change();
        $('#opening_balance').prop('disabled', false).change();
    });




// Validating and insert request send when creating new account and showing response

    $(document).on('click', '#addAccount', function(){
        $('.acc_name_err_message').text('');
        $('.acc_no_err_message').text('');
        $('.bank_name_err_message').text('');
        $('.type_err_message').text('');
        $('.address_err_message').text('');
        $('.opening_balance_err_message').text('');
        var name = $('#name').val();
        var type = $('#type').val();
        var acc_no = $('#acc_no').val();
        var bank_name = $('#bank_name').val();
        var opening_balance = $('#opening_balance').val();
        var bank_address = $('#bank_address').val();
        var verify = true;
        if(name==''){
            $('.acc_name_err_message').text('Account Name Required!');
            verify = false;
        }
        if(opening_balance == ''){
            $('.opening_balance_err_message').text('Opening Balance Required!');
            verify = false;
        }
        if(type == '0'){
            $('.type_err_message').text('Please Select Account type!');
            verify = false;
        }
        if (!$.isNumeric(opening_balance)) {
            $('.opening_balance_err_message').text('Opening Balance Must be Numeric!');
            verify = false;
        }
        if(type!='cash'){
            if(acc_no == ''){
                $('.acc_no_err_message').text('Account Number Required!');
                verify = false;
            }
            if(bank_name == ''){
                $('.bank_name_err_message').text('Bank Name Required!');
                verify = false;
            }
            if(bank_address == ''){
                $('.address_err_message').text('Address Required!');
                verify = false;
            }
        }
        if(verify == true){
            $.post('/account',
                {
                    'name': name,
                    'type' : type,
                    'opening_balance':opening_balance,
                    'acc_no' : acc_no,
                    'bank_name' : bank_name,
                    'bank_address': bank_address,
                    '_token': $('input[name=_token]').val()
                }, function(data){
                    setTimeout(function(){
                        $('#largeModal').modal('hide');
                        $('.messageDiv').css('display', 'block');
                        $('#message').text('Account Added!');
                    }, 700);
                });
        }
    });


//updating modal DOM when clicking edit field of a row in the account table

    $(document).on('click', '#editAccountBtn', function(){
        $('.acc_name_err_message').text('');
        $('.acc_no_err_message').text('');
        $('.bank_name_err_message').text('');
        $('.type_err_message').text('');
        $('.address_err_message').text('');
        $('.opening_balance_err_message').text('');
        var id = $(this).find('#editId').val();
        $('#modalId').val(id).change();
        $('.bank_info').css('display', 'block');
        $('#addAccount').css('display', 'none');
        $('#editBtn').css('display', 'block');
        $('#opening_balance').attr('disabled', 'disabled').change();
        $('#largeModalLabel').text("Edit Account");
        $.post('/account/edit', {'id' : id, '_token': $('input[name=_token]').val()}, function(data){
            $('#name').val(data['name']);
            switch (data['type']){
                case 'cash':
                    $('#type').val('cash').change();
                    break;
                case 'saving':
                    $('#type').val('saving').change();
                    break;
                case 'chequing':
                    $('#type').val('chequing').change();
                    break;
                case 'credit':
                    $('#type').val('credit').change();
                    break;
            }
            $('#acc_no').val(data['acc_no']);
            $('#bank_name').val(data['bank_name']);
            $('#bank_address').val(data['bank_address']);
            $('#opening_balance').val(data['opening_balance']);
            $('#largeModal').modal('show');
        });
    });



//validating and sending request for updating account and showing response

    $(document).on('click', '#editBtn', function(){
        $('.acc_name_err_message').text('');
        $('.acc_no_err_message').text('');
        $('.bank_name_err_message').text('');
        $('.type_err_message').text('');
        $('.address_err_message').text('');
        $('.opening_balance_err_message').text('');
        var name = $('#name').val();
        var type = $('#type').val();
        var acc_no = $('#acc_no').val();
        var bank_name = $('#bank_name').val();
        var opening_balance = $('#opening_balance').val();
        var bank_address = $('#bank_address').val();
        var id = $('#modalId').val();
        var verify = true;
        if(name==''){
            $('.acc_name_err_message').text('Account Name Required!');
            verify = false;
        }
        if(opening_balance == ''){
            $('.opening_balance_err_message').text('Opening Balance Required!');
            verify = false;
        }
        if(type == '0'){
            $('.type_err_message').text('Please Select Account type!');
            verify = false;
        }
        if (!$.isNumeric(opening_balance)) {
            $('.opening_balance_err_message').text('Opening Balance Must be Numeric!');
            verify = false;
        }
        if(type!='cash'){
            if(acc_no == ''){
                $('.acc_no_err_message').text('Account Number Required!');
                verify = false;
            }
            if(bank_name == ''){
                $('.bank_name_err_message').text('Bank Name Required!');
                verify = false;
            }
            if(bank_address == ''){
                $('.address_err_message').text('Address Required!');
                verify = false;
            }
        }
        if(verify == true){
            $.post('/account/update',
                {
                    'name': name,
                    'id'    : id,
                    'type' : type,
                    'opening_balance':opening_balance,
                    'acc_no' : acc_no,
                    'bank_name' : bank_name,
                    'bank_address': bank_address,
                    '_token': $('input[name=_token]').val()
                }, function(data){
                    setTimeout(function(){
                        $('#largeModal').modal('hide');
                        $('.messageDiv').css('display', 'block');
                        $('#message').text('Account updated!').change();
                    }, 700);
                });
        }
    });
});

// trigger function when to click 'messageDiv' close button

function closeMessage(){
    console.log('Close');
    $('.messageDiv').css('display', 'none');
    location.reload();
}

