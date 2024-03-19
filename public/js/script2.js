function totalClick(index, click, maxStock) {
    var totalClicks = document.getElementById(`totalClicks${index}`);
    var currentClicks = parseInt(totalClicks.innerText);
    console.log(maxStock);
    var sumValue = currentClicks + click;
    if (sumValue >= 0 && sumValue <= maxStock) {
        totalClicks.innerText = Math.max(0, sumValue); // Set totalClicks to 0 if sumValue is negative
        // totalClicks.innerText = sumValue;
    }

    console.log(totalClicks.innerText); // Logging the updated totalClicks value
    console.log(currentClicks.innerText); // Logging the updated totalClicks value
}

function removeCart(cartId) {
    $.ajax({
        url: "{{ route('cart.remove') }}",
        method: "POST",
        data: {
              cartId: cartId,
              _token: "{{ csrf_token() }}"
        },
        success: function(response) {
            //remove table row cart
            $('#removeCart-' + cartId).remove();
            
            updateCartCount();
            updateCartTotal();
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}