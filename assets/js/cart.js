function toastMessage(msg, check) {
  if (check){
      $(".-toast").removeClass("fail");
      $(".-toast").html(msg).addClass("success").fadeIn(500).fadeOut(1000);
  }
  else {
      $(".-toast").removeClass("success");
      $(".-toast").html(msg).addClass("fail").fadeIn(500).fadeOut(1000);
  }
}

function addToCart(id, quantity){
  if (quantity < 0)
    quantity = document.getElementsByClassName("organic-item-modal_qty")[-1 * quantity - 1].value;
  if (quantity <= 0)
    alert("Dont allow negative quantity or zero quantity!");
  else
  {
    $.ajax({
        type: "POST",
        url: "services/product-service.php",
        data: { 
          idAdd: id,
          quantity: quantity
        },
        success: function(data) {
            showCart();
            toastMessage("Added successfully!", true);
        }  
    });
  }
}

function showCart()
{
  $.ajax({
      url: "services/product-service.php",
      success: function(data) {
          var cartInfo = JSON.parse(data);
          var output = "";
          var numList = 0;
          var totalPrice = 0;
          for (var key in cartInfo) {
              output +=     '<li class="d-flex">' +
                              '<div class="organic-shopping-product_img">' +
                                '<img src="' + cartInfo[key].Image  + '" />' +
                              '</div>' + 
                              '<div class="organic-shopping-product_text">' +
                                '<h3>' + cartInfo[key].Name + '</h3>' +
                                '<span>' + cartInfo[key].quantity + ' &#215; $' + cartInfo[key].Price  + 'Kg</span>' +
                              '</div>' +
                              '<div class="organic-shopping-product_remove">' +
                                '<button type="button" onclick="removetoCart(' + cartInfo[key].ID + ');">' + 
                                    '<i class="material-icons">highlight_off</i>' +
                                '</button>' +
                              '</div>' +
                            '</li>';
              numList++;
              totalPrice += ((parseFloat(cartInfo[key].Price) * 100) * parseInt(cartInfo[key].quantity) / 100);
          }
          document.getElementsByClassName("organic-shopping-content_list")[0].innerHTML = output;
          document.getElementsByClassName("organic-shopping-title")[0].innerHTML = "Shopping Cart <span>(" + numList + " item)</span>";
          document.getElementsByClassName("rightnav-cart__counter")[0].innerHTML = numList;
          document.getElementsByClassName("organic-subtotal")[0].innerHTML = "<strong>Subtotal: $" + totalPrice.toFixed(2) + "</strong>";
      }  
  });
}

function removetoCart(id)
      {
        var tmp = confirm("Do you want to remove this item?");
        if (tmp){
          $.ajax({
              type: "POST",
              url: "services/product-service.php",
              data: { 
                idDel: id 
              },
              success: function(data) {
                  showCart();
              }  
          });
        }
      }

showCart();
