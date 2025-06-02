// paquetes-eliminar.js
document.addEventListener('DOMContentLoaded', () => {
    const modalEliminar = new bootstrap.Modal(document.getElementById('modalEliminarPaquete'));
    const btnConfirmarEliminar = document.getElementById('btnConfirmarEliminar');

    let paqueteIdEliminar = null;

    document.body.addEventListener('click', (e) => {
        if (e.target.closest('.btnEliminar')) {
            const btn = e.target.closest('.btnEliminar');
            paqueteIdEliminar = btn.getAttribute('data-id');
            modalEliminar.show();
        }
    });

    btnConfirmarEliminar.addEventListener('click', async () => {
        if (!paqueteIdEliminar) return;

        try {
            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            const res = await fetch(`/paquetes/${paqueteIdEliminar}`, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': token
                }
            });

            if (!res.ok) throw new Error('Error al eliminar paquete');

            modalEliminar.hide();
            await cargarPaquetes(); // Esta función ahora es global

            Swal.fire({
                icon: 'success',
                title: 'Paquete eliminado',
                timer: 1000,
                showConfirmButton: false
            });

            paqueteIdEliminar = null;
        } catch (error) {
            alert(error.message);
        }
    });
});