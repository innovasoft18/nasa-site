
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
    alert("ok");
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
    }else{
        
    }
    return false;
});
