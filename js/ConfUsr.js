function validateUsername(){
    if(true) {
    $.ajax({  
          type: 'GET',  
          url: '../index.php?accio=validarUsr', 
          data: { username: document.getElementById("Usuario").value },
          success: function(response) {
                //console.log(response);
               if(response==0){
                document.getElementById("Usuario").style = "color:red";
                document.getElementById("UsuarioErr").style = "display:block; color:red";
                }
               else if(response==1){
                document.getElementById("Usuario").style = "color:green";
                document.getElementById("UsuarioErr").style = "display:none";
               }
 
          }
    });
   }
   else{
      //display "username is too short" error
   }
 
 }