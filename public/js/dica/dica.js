$('#excluir-dica').click(async function(e) {
    e.preventDefault();
    let result = await Swal.fire({
        title: 'Tem certeza que deseja excluir?',
        showCancelButton: true,
        confirmButtonText: 'Sim',
    });

    if (result.isConfirmed) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'DELETE',
            url: $(this).attr('href'),
            success: () => {
                window.location.href = "";
            },

            error: (error) => {
                console.log(error);
            }
        })
    }
})