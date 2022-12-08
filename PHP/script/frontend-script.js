$(document).ready(function(){
    
    $(document).on('keydown', '#itemName', function() {
     
     var id = this.id;
     var splitid = id.split('_');
   
     // Initialize jQuery UI autocomplete
     $( '#'+id ).autocomplete({
      source: function( request, response ) {
       $.ajax({
        url: "autofill.php",
        type: 'post',
        dataType: "json",
        data: {
         search: request.term,request:1
        },
        success: function( data ) {
         response( data );
        }
       });
      },
      select: function (event, ui) {
       $(this).val(ui.item.label); // display the selected text
       var userid = ui.item.value; // selected value
      
       // AJAX
       $.ajax({
        url: 'autofill.php',
        type: 'post',
        data: {userid:userid,request:2},
        dataType: 'json',
        success:function(response){
            
         var len = response.length;
   
         if(len > 0){
          var id = response[0]['product_id'];
          var name = response[0]['product_name'];
          var price = response[0]['product_price'];        
            console.log(response);
          // Set value to textboxes
          document.getElementById('itemName').value = name;
          document.getElementById('productID').value = id;
          document.getElementById('price').value = price;
    
         }
    
        }
       });
   
       return false;
      }
     });
    });

});
/*
$( function() {
    $( "#itemName" ).autocomplete({
        source: 'backend-script-itemname.php'  
        });

        
});

$( function() {
    $( "#productID" ).autocomplete({
        source: 'backend-script-productid.php'  
        });
});
*/
