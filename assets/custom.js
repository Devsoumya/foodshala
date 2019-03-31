function changeItemQuantity(itemId, operationType,cost) {
    currentQuantity = document.getElementById("item"+itemId).innerHTML;
    cartTotal = parseInt(document.getElementById("cartTotal").innerHTML);

    if(operationType == 2) {
        currentQuantity++;
        cartTotal = cartTotal+parseInt(cost);
    } else if(operationType == 1) {
        if(currentQuantity>0) {
            currentQuantity--;
            cartTotal = cartTotal-parseInt(cost);
        }
    }
    document.getElementById("item"+itemId).innerHTML= currentQuantity;
    var  cartItem = document.getElementById("cart").value;
    if(cartItem=="") {
        cartItem = {};
    } else {
        cartItem = JSON.parse(cartItem);
    }
    if(currentQuantity==0) {
        delete cartItem[itemId];
    } else {
        cartItem[itemId] = currentQuantity;
    }
    cartItem = JSON.stringify(cartItem);
    if(cartItem=="{}") {
        cartItem='';
        document.getElementById("placeOrderBtn").disabled = true;
    } else {
        document.getElementById("placeOrderBtn").disabled = false;
    }
    document.getElementById("cart").value= cartItem;
    document.getElementById("cartTotal").innerHTML= '';
    document.getElementById("cartTotal").innerHTML= cartTotal;
}