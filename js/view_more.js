
//search ajax	
$(document).ready(function(e) {
 
   $("#search_inp").keyup(function() { 
       $("#results_div").show();
       var sr_rs = $(this).val();
       $.ajax({
         type: "GET", 
         url: 'search.php',
          data: 'q='+ sr_rs, 
          success: function(data){
            $("#results_div").html(data);
           }
           ,

        });
 
    });
 
});

