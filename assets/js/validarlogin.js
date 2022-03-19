$("#iniciar").click(function(){
    var dataString = "loginUsername=" + $("[type='text']").val() + "&loginPassword=" + $("[type='password']").val();

 //hace la búsqueda     
         $.ajax({
               type: "POST",
               url: "Login/iniciosesion",
               data: dataString,
               dataType: "html",
               success: function(data){  
                  console.log(data)               ;
                  if (data == 'false'){
                     Swal.fire( {
                        icon: 'error',
                        text: data,
                        position: 'top',
                        showConfirmButton: false,
                        timer: 1500                     
                      });
                  }else{
                      $(location).attr('href','adm');
                  }
               }
   });     
    return false;
});
 