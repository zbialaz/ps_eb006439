document.querySelectorAll('.table .link-excluir').forEach(link=>{
    link.addEventListener('click', e=>{
        e.preventDefault();

        Swal.fire({
            title: 'ATENÇÃO',
            html: "Tem certeza que deseja remover este registro?<br><br>Você <b>NÃO</b> poderá reverter esta decisão",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim, remover',
            cancelButtonText: 'Cancelar',
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.href = link.href;
            }
          })
    })
})