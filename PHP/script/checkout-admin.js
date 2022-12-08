function updateForm(total_cost) {
    var product = document.getElementById("itemName").value;
  
    var qty = document.getElementById("quantity").value;
  
    var price = document.getElementById("price").value;
    priceTotal = (qty * parseFloat(price)).toFixed(2);
   
    total_cost = total_cost + parseFloat(priceTotal);
    document.getElementById("totalCost").value = total_cost;
  
    var productID = document.getElementById("productID").value;
  
    if((product=="")||(qty=="")||(price=="")||(productID==""))
    {
      alert("Please Enter Item Details");
        return false;
    }
  
    const http = new XMLHttpRequest();
  
    var params = 'itemName=' + product + '&productID=' + productID + '&quantity=' + qty;
    http.onload = function () {
      if($.trim(this.responseText) != '')
      {
        alert('Product ID Not Found, Last Item Will Not Be Recorded, Please Remove');
      }
      document.getElementById("itemName").value = "";
      document.getElementById("quantity").value = "";
      document.getElementById("price").value = "";
      document.getElementById("productID").value = "";
    }
    http.open("GET", "checkoutprocess-admin.php?" + params, true)
    http.send();
  
    var table = document.getElementById("results");
    var row = table.insertRow(-1);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
  
    cell1.innerHTML = product;
    cell2.innerHTML = qty;
    cell3.innerHTML = "$" + priceTotal;
  
  
    return total_cost;
  }
  
  function remove ()
  {
    var table = document.getElementById("results");
    table.deleteRow(-1);
  }
  
  function init() {
    let total_cost = 0;
    document.getElementById("addItem").onclick = function () { total_cost =  updateForm(total_cost); }
    document.getElementById("removeItem").onclick = remove;
  }
  
  window.onload = init;
  