document.addEventListener('DOMContentLoaded', () => {
    const modalEditar = new bootstrap.Modal(document.getElementById('modalEditarPaquete'));
    const formEditar = document.getElementById('formEditarPaquete');
    const editarNombre = document.getElementById('editarNombre');
    const editarPrecio = document.getElementById('editarPrecio');
    const editarDetallesContainer = document.getElementById('editarDetallesContainer');
    const btnAgregarDetalleEditar = document.getElementById('btnAgregarDetalleEditar');

    let paqueteIdEditar = null;

    // Delegación para manejar clicks en botones editar
    document.body.addEventListener('click', async (e) => {
        if (e.target.classList.contains('btnEditar')) {
            paqueteIdEditar = e.target.getAttribute('data-id');

            try {
                const res = await fetch(`/paquetes/${paqueteIdEditar}`);
                if (!res.ok) throw new Error('Error al cargar datos del paquete');
                const paquete = await res.json();

                editarNombre.value = paquete.nombre;
                editarPrecio.value = paquete.precio;

                editarDetallesContainer.innerHTML = '';
                paquete.detalles.forEach(detalle => {
                    const input = document.createElement('input');
                    input.type = 'text';
                    input.name = 'detalles[]';
                    input.className = 'form-control mb-2';
                    input.value = detalle;
                    editarDetallesContainer.appendChild(input);
                });

                modalEditar.show();
            } catch (error) {
                alert(error.message);
            }
        }
    });

    btnAgregarDetalleEditar.addEventListener('click', () => {
        const input = document.createElement('input');
        input.type = 'text';
        input.name = 'detalles[]';
        input.className = 'form-control mb-2';
        editarDetallesContainer.appendChild(input);
    });

    formEditar.addEventListener('submit', async (e) => {
        e.preventDefault();

        const detalles = [...editarDetallesContainer.querySelectorAll('input[name="detalles[]"]')]
            .map(input => input.value.trim())
            .filter(val => val.length > 0);

        const data = {
            nombre: editarNombre.value.trim(),
            precio: parseFloat(editarPrecio.value),
            detalles
        };

        try {
            const res = await fetch(`/paquetes/${paqueteIdEditar}`, {
                method: 'PUT',
                headers: {'Content-Type': 'application/json'},
                body: JSON.stringify(data)
            });
            if (!res.ok) throw new Error('Error al actualizar paquete');

            modalEditar.hide();
            await cargarPaquetes();

            Swal.fire({
                icon: 'success',
                title: 'Paquete actualizado',
                timer: 1000,
                showConfirmButton: false
            });

        } catch (error) {
            alert(error.message);
        }
    });
});