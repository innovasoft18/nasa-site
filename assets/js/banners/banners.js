
$("#buscar").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#tabla tr").filter(function() {
    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
});   


// $("#tabla").pageMe({
//     pagerSelector: '#banners_page',
//     showPrevNext: true,
//     hidePageNumbers: false,
//     perPage: 3
// });

$("#buscarfecha").click(function(){
    var fechaini = new Date(($("input[name='fechaini']").val()));
    var fechafin = new Date(($("input[name='fechafin']").val()));
    if(fechaini.getTime() > fechafin.getTime()){        
        Swal.fire( {
            icon: 'error',
            text: 'la fecha fin es inferior a la fecha de inicio !!',
            position: 'top',
            showConfirmButton: false,
            timer: 2000                     
        });
        return false;
    }else if (!($("input[name='fechafin']").val()) && ($("input[name='fechaini']").val())){
        Swal.fire( {
            icon: 'error',
            text: 'Validar fecha fin!!',
            position: 'top',
            showConfirmButton: false,
            timer: 2000                     
        });
        return false;
    }else if (($("input[name='fechafin']").val()) && !($("input[name='fechaini']").val())){
        Swal.fire( {
            icon: 'error',
            text: 'Validar fecha inicio!!',
            position: 'top',
            showConfirmButton: false,
            timer: 2000                     
        });
        return false;
    }else if (!($("input[name='fechafin']").val()) && !($("input[name='fechaini']").val())){
        Swal.fire( {
            icon: 'error',
            text: 'Validar fechas!!',
            position: 'top',
            showConfirmButton: false,
            timer: 2000                     
        });
        return false;
    }
});


$("#bannerc").click(function(){
    $("#banner_crear").validate();
    var banner_nombre =$("input[name='banner_nombre']").val();
    var banner_ipublicacion =$("input[name='banner_ipublicacion']").val();
    var banner_fpublicacion =$("input[name='banner_fpublicacion']").val();
    var banner_descripcion =$("textarea[name='banner_descripcion']").val();
    // var banner_file =$("input[name='banner_path']").val();
    
    if(!banner_nombre){
        Swal.fire( {
            icon: 'error',
            text: 'Diligenciar el nombre por favor !!!',
            position: 'top',
            showConfirmButton: false,
            timer: 2000                     
            });
            return false;
    }else if(!banner_ipublicacion){
        Swal.fire( {
            icon: 'error',
            text: 'Diligenciar la fecha de inicio publicación por favor !!!',
            position: 'top',
            showConfirmButton: false,
            timer: 2000                     
            });
            return false;
    }else if(!banner_fpublicacion){
        Swal.fire( {
            icon: 'error',
            text: 'Diligenciar la fecha de finalización de publicación por favor !!!',
            position: 'top',
            showConfirmButton: false,
            timer: 2000                     
            });
            return false;
    }else if(!banner_descripcion){
        Swal.fire( {
            icon: 'error',
            text: 'Diligenciar la descripción por favor !!!',
            position: 'top',
            showConfirmButton: false,
            timer: 2000                     
            });
            return false;
    }else if(!banner_descripcion){
        Swal.fire( {
            icon: 'error',
            text: 'Diligenciar la descripción por favor !!!',
            position: 'top',
            showConfirmButton: false,
            timer: 2000                     
            });
            return false;
    }
    // else if(!banner_path){
    //     Swal.fire( {
    //         icon: 'error',
    //         text: 'Adjuntar la imagen del banner por favor !!!',
    //         position: 'top',
    //         showConfirmButton: false,
    //         timer: 2000                     
    //         });
    //         return false;
    // }
   
    // var dataString = "banner_nombre="+banner_nombre+"&banner_ipublicacion="+banner_ipublicacion+"&banner_fpublicacion="+banner_fpublicacion+"&banner_descripcion="+banner_descripcion;
    var forData = new FormData(document.getElementById("banner_crear"));
    var url = "Banners/bannerscrear";
    // console.log (forData);
    // console.log (url);
    // return false;
    
    $.ajax({
        type: "POST",
        url: url,
        data: forData,
        // dataType: "html",
        contentType: false,
        processData: false,
        success: function(data){  
        //   const Toast = Swal.mixin({
        //     toast: true,
        //     position: 'top-end',
        //     showConfirmButton: false,
        //     timer: 3000,
        //     timerProgressBar: true,
        //     didOpen: (toast) => {
        //       toast.addEventListener('mouseenter', Swal.stopTimer)
        //       toast.addEventListener('mouseleave', Swal.resumeTimer)
        //     }
        //   },1500)
          
        //   Toast.fire({
        //     icon: 'success',
        //     title: 'Creado'
        //   },1500)
          // alert(url); return false;
              
        //   $(location).attr('href','bactivos');         
        }
      });

    return false;
})

$("#limpiarfecha").click(function(){
    document.getElementById('banner_fechas').reset();    
    $(location).attr('href','bannersactivos'); 
})