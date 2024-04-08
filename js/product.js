$(document).ready(function(){
//  Select radio size
    var productName = $('.prod-title').data('name');
    var sizeOption = $('input[name="size"]:checked').val();
    var colorOption = $('input[name="color"]:checked').val();
    var currentPrice = 50.00;
    var oldPrice = 70.00;
    var incrementPrice  = null;
    $('#selectedSize').text(sizeOption);
    $('#price').text(currentPrice);
    $('#oldPrice').text(oldPrice);
    $('.attributes-items input[type="radio"]').change(function() {
        var sizeOption = $('input[name="size"]:checked').val();
        $('#selectedSize').text(sizeOption);
        $('#errorSize').hide();
        $('.cart-list .list .size').text(sizeOption);
    });

//  Select radio color
// Show value of checked radio button when page loads
    
    $('#selectedColor').text(colorOption);
    $('.attributes-items input[type="radio"]').change(function() {
        var colorOption = $('input[name="color"]:checked').val();
        var imagePath = 'images/image-' + colorOption + '.png';
        $('#selectedColor').text(colorOption);
        $('.cart-list .list .color').text(colorOption);
        $('.productImage').attr('src', imagePath);
    });

// Add to cart Bitton
    $('#addtocart').on('click',function(){
        var button = $(this);
        var cart = $('#cart');
        var cartTotal = cart.attr('data-totalitems');
        var newCartTotal = parseInt(cartTotal) + 1;
        
        if (!$('input[name="size"]').is(':checked')) {
        $('#errorSize').show();
        }else{
        $('#errorSize').slideUp();
        button.addClass('sendtocart');
        setTimeout(function(){
            button.removeClass('sendtocart');
            cart.addClass('shake').attr('data-totalitems', newCartTotal).text(newCartTotal);
            setTimeout(function(){
                cart.removeClass('shake');
            },500)
        },0)
        incrementPrice += currentPrice; // Increment price by 1
        $('.cart-list .list .title').text(productName);
        $('.cart-list .list .qty').text(newCartTotal);
        $('.qtyPrice').text(incrementPrice); // Update the price display
        }
    })
});