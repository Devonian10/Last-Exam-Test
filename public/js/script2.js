function totalClick(index, click, maxStock) {
    var totalClicks = document.getElementById(`totalClicks${index}`);
    var currentClicks = parseInt(totalClicks.innerText);
    var sumValue = currentClicks + click;
    if (sumValue >= 0 && sumValue <= maxStock) {
        totalClicks.innerText = Math.max(0, sumValue); // Set totalClicks to 0 if sumValue is negative

        getQuantity(index); // Call getQuantity function to update button status
    }
}

function getQuantity(index) {
    var quantity = parseInt(
        document.getElementById("totalClicks" + index).innerText
    ); // Get quantity from totalClicks element
    var addToCartBtn = document.getElementById("addToCartBtn" + index); // Get the add to cart button

    if (quantity > 0) {
        document.getElementById("quantity" + index).value = quantity; // Set quantity to hidden input
        addToCartBtn.disabled = false; // Enable the add to cart button
    } else {
        addToCartBtn.disabled = true; // Disable the add to cart button
    }
}

function removeCart(cartId) {
    $.ajax({
        url: "{{ route('cart.remove') }}",
        method: "POST",
        data: {
            cartId: cartId,
            _token: "{{ csrf_token() }}",
        },
        success: function (response) {
            //remove table row cart
            $("#removeCart-" + cartId).remove();

            updateCartCount();
            updateCartTotal();
        },
        error: function (xhr, status, error) {
            console.error(error);
        },
    });
}
