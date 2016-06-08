 
$(document).ready(function(){
    $('#userForm').submit(function(){
     
        // show that something is loading
        $('#response').html("<br><b>Loading grafica...</b>");
        
        $.ajax({
            type: 'POST',
            url: '../Template/Control/Control.php', 
            data: $(this).serialize()
        })
        .done(function(data){
        	alert(data);
        		        
        })

            .fail(function() {
         
            // just in case posting your form failed
            alert( "FALLOOO" );
             
        });
 
        // to prevent refreshing the whole page page
        return false;
 
    });
});