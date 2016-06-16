$(document).ready(function(){
   
     
        // show that something is loading
        $('#response').html("<br><b>Loading grafica...</b>");
        
        $.ajax({
            type: 'POST',
            url: './ConexionBD/Conexion.php', 
            data: $(this).serialize()
        })
        .done(function(data){
        	alert(data);
        	

            
        })

      .fail(function() {
         
            // just in case posting your form failed
            alert( "Posting failed." );
             
        });
 
});