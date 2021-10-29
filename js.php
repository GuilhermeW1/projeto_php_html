
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>



<script> 

    /*
function confirmar_logout(){
Swal.fire({
  title: 'Do you want to save the changes?',
  showDenyButton: true,
  showCancelButton: true,
  confirmButtonText: 'Save',
  denyButtonText: `Don't save`,
}).then((result) => {
  /* Read more about isConfirmed, isDenied below 
  if (result.isConfirmed) {
    Swal.fire('Saved!', '', 'success')
  } else if (result.isDenied) {
    Swal.fire('Changes are not saved', '', 'info')
  }
})
}
*/
    function confirmar_logout(){
        
        Swal.fire({
            title: 'Deseja sair?',
            
            showCancelButton: true,
            confirmButtonText: 'Sim',
            cancelButton: 'nao',
        }).then((result) => {
    
        if (result.isConfirmed) {
            document.location.replace('logout.php')
        } 
})
    }
    

    /*
    function confirmar_logout(){
        Swal.fire({
            title: 'Deseja mesmo sair?',
             showCancelButton: true,
             confirmButtonText: 'sim',
             cancelButton: 'nao',

        }).then((result) => {
            if(result.isConfirmed){
            document.location.replace('../logout.php')
            }
        })

    }*/

</script>