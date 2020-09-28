$(document).on("click","#confirmacion", function(e){
    var r = confirm("Esta seguro de eliminar el registro? esta acción no se podra reversar!");
    if (r == true) {
     window.location.href=link;
    } else {
    return false;
     }
   
   });