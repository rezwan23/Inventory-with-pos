$(document).ready(function(){

    // adding item to cart

    $(document).on('click', 'a#addToCartBtn', function(event){
        var id = $(this).parent().parent().parent().find('input#itemid').val();
        var qty = $(this).parent().parent().parent().find('input#itemquantity').val();
        var stock = $(this).parent().parent().parent().find('span#stock');
        var newStock = parseFloat(stock.text());
        if(qty>parseInt(stock.text())){
            alert('Not Enough in Stock');
        }else{
            $('.lds-ellipsis').css('display', 'inline-block');
            $.post('/pos', {'item_id' : id, 'quantity' : qty, '_token': $('input[name=_token]').val()}, function(data){
                $('#tblDiv').load(location.href + ' #tblDiv');
                $('.lds-ellipsis').css('display', 'none');
            });
            stock.text(newStock-qty).change();
        }

    });


    // delete single cart item

    $(document).on('click', '#deleteCartItem', function(event){
        $('.lds-ellipsis').css('display', 'inline-block');
        var id = $(this).find('#cartId').val();
        $.post('/deletecart', {'id':id, '_token': $('input[name=_token]').val()}, function(data){
            $('#tblDiv').load(location.href + ' #tblDiv');
            $('.lds-ellipsis').css('display', 'none');
            console.log(data);
        });
    });


    //deleting all cart item

    $(document).on('click', '#delallcart', function(){
        var dataId =[];
        var dataQty =[];
        $('tr#cartRow').children('td').each(function(){
            var item_id = $(this).find('input#itemId').val();
            var item_quantity = $(this).find('input#itemQuantity').val();
            if(item_id && item_quantity){
                dataId.push(item_id);
                dataQty.push(item_quantity);
            }
        });
        $('.lds-ellipsis').css('display', 'inline-block');
        $.post('/deleteallcart',{'_token': $('input[name=_token]').val(), 'dataId' : dataId, 'dataQty' : dataQty}, function(data){
            console.log(data);
            $('#message').text(data['success-message']);
            $('#messageDiv').css('display', 'block');
            $('#tblDiv').load(location.href + ' #tblDiv');
            $('.lds-ellipsis').css('display', 'none');
        });
    });

    $(document).on('click', '#paymentbtn', function(){
        var amountToBePaid = $('#amountToBePaid').text();
        $('#amount_payable').val(amountToBePaid);
        $('#total_payable').val(amountToBePaid);
        $('#smallModal').modal('show');
    });


});


// searching product by input


function myFunction() {
    var input, filter, allItems, singleItem, a, i;
    input = $('#myInput').val();
    filter = input.toUpperCase();
    singleItem = $('#singleItem');
    $('#allItems').children('#singleItem').each(function(){
        var name = $(this).find('#itemName').val();
        if(name.toUpperCase().indexOf(filter)>-1){
            $(this).css('display', '');
        }else{
            $(this).css('display', 'none');
        }
    });
};
function closeMessage(){
    $('#messageDiv').css('display', 'none');
    location.reload();
}
