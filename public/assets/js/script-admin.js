document.querySelectorAll('.table .link-excluir').forEach(link=>{
    link.addEventListener('click', e=>{
        e.preventDefault();
        Swal.fire({
            title: 'CUIDADO!',
            text: "Você tem certeza que quer excluir isso?<br> É irreversível!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Remover',
            cancelButtonText: 'Cancelar'
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.href = link.href
            }
          })
    })
})