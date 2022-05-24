var UsuarioAX = document.getElementById("Usuario");
var EmailAX = document.getElementById("email")
function validateUsername(){

    $.ajax({  
          type: 'GET',  
          url: '../index.php?accio=validarUsr', 
          data: { username: document.getElementById("Usuario").value },
          success: function(response) {
                //console.log(response);
               if(response==0){
                document.getElementById("Usuario").style = "color:red";
                document.getElementById("UsuarioErr").style = "display:block; color:red";
                UsuarioAX.setCustomValidity("El usuario ya existe");
                }
               else if(response==1){
                document.getElementById("Usuario").style = "color:green";
                document.getElementById("UsuarioErr").style = "display:none";
                UsuarioAX.setCustomValidity('');
               }
 
          }
    });

 
 }

 function validateEmail(){

      $.ajax({  
            type: 'GET',  
            url: '../index.php?accio=validaremail', 
            data: { email: document.getElementById("email").value },
            success: function(response) {
                  //console.log(response);
                 if(response==0){
                  document.getElementById("email").style = "color:red";
                  document.getElementById("EmailErr").style = "display:block; color:red";
                  EmailAX.setCustomValidity("El email ya existe");
                  }
                 else if(response==1){
                  document.getElementById("email").style = "color:green";
                  document.getElementById("EmailErr").style = "display:none";
                  EmailAX.setCustomValidity('');
                 }
   
            }
      });
  
   
   }