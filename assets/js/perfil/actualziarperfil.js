$(document).ready(function() {
    $("#usuario_actualizar").validate();
  });


$("#actualziar").click(function(){
    var dataString = "usuario_telefono=" + $("input[name='usuario_telefono']").val() + "&usuario_correo=" + $("input[name='usuario_correo']").val() + "&usuario_foto=" + $("input[name=usuario_foto");

    if (!$("input[name='usuario_correo']").val()){
        Swal.fire( {
            icon: 'error',
            text: 'Por favor ingrese un correo',
            position: 'top',
            showConfirmButton: false,
            timer: 2000                     
            });
            return false;
    }

    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
      },1500)
      
      Toast.fire({
        icon: 'success',
        title: 'Actualizado'
      },1500)

      
    $(location).attr('href','perfil');


});

$("#usuario_telefono").mouseenter(function(){
    if($("input[name=usuario_telefono")){
        var regex = /[^+\d]/g;
    
        $("#usuario_telefono").keyup(function(){
        if($("#usuario_telefono").val() == ""){
            $("#usuario_telefono").val("+")
        }
        $("#usuario_telefono").val($("#usuario_telefono").val().replace(regex, ""))
        });
    
    }
})

function mostrarPassword(){
  var cambio = document.getElementById("usuario_contrasena");
  if(cambio.type == "password"){
    cambio.type = "text";
    $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
  }else{
    cambio.type = "password";
    $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
  }
} 

function mostrarPasswordc(){
  var cambio2 = document.getElementById("usuario_contrasenac");
  if(cambio2.type == "password"){
    cambio2.type = "text";
    $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
  }else{
    cambio2.type = "password";
    $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
  }
} 

$("#actualziarc").click(function(){
  var dataString = "usuario_contrasena=" + $("input[name='usuario_contrasena']").val() + "&usuario_contrasenac=" + $("input[name='usuario_contrasenac']").val();

  if($("input[name='usuario_contrasena']").val() != $("input[name='usuario_contrasenac']").val()){
    Swal.fire( {
      icon: 'error',
      text: 'Las contraseñas no coinciden',
      position: 'top',
      showConfirmButton: false,
      timer: 2000                     
      });
      return false;
  }else{
      $.ajax({
        type: "POST",
        url: "Perfil/actualizarc",
        data: dataString,
        dataType: "html",
        success: function(data){  
          const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
              toast.addEventListener('mouseenter', Swal.stopTimer)
              toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
          },1500)
          
          Toast.fire({
            icon: 'success',
            title: 'Actualizado'
          },1500)
          // alert(url); return false;
              
          $(location).attr('href','perfil');         
        }
      });
    }
    
    // return false;

})