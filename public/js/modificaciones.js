$(".cerrar").on("submit", function(e){
    e.preventDefault();
    Swal.fire({
             title: '¿Estas seguro?',
             text: "¡Quieres cerrar la sesión!",
             icon: 'warning',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: '¡Si,  Cerrar!',
             cancelButtonText: 'Cancelar',
         }).then((result) => {
             if (result.isConfirmed) {
 
                 this.submit();
             }
         })
   });