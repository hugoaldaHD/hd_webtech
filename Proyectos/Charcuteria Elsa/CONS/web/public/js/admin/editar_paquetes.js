document.addEventListener('DOMContentLoaded', () => {
    const modalEditar = new bootstrap.Modal(document.getElementById('modalEditarPaquete'));
    const formEditar = document.getElementById('formEditarPaquete');
    const editarDescripcion = document.getElementById('editarDescripcion');
    const editarTitulo = document.getElementById('editarTitulo');  // Cambié el id para mayor claridad
    const editarPrecio = document.getElementById('editarPrecio');
    const editarDetallesContainer = document.getElementById('editarDetallesContainer');
    const btnAgregarDetalleEditar = document.getElementById('btnAgregarDetalleEditar');

    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    let paqueteIdEditar = null;

    document.body.addEventListener('click', async (e) => {
        if (e.target.classList.contains('btnEditar')) {
            paqueteIdEditar = e.target.getAttribute('data-id');

            try {
                const res = await fetch(`/paquetes/${paqueteIdEditar}`);
                if (!res.ok) throw new Error('Error al cargar datos del paquete');
                const paquete = await res.json();
                console.log('Paquete recibido:', paquete);

                editarTitulo.value = paquete.titulo || paquete.nombre || '';
                editarPrecio.value = paquete.precio ?? '';
                editarDescripcion.value = paquete.descripcion || '';

                editarDetallesContainer.innerHTML = '';

                if (Array.isArray(paquete.detalles)) {
                    // Detectar si detalles es array de strings o de objetos
                    if (paquete.detalles.length > 0) {
                        if (typeof paquete.detalles[0] === 'string') {
                            paquete.detalles.forEach(detalleTexto => {
                                const group = document.createElement('div');
                                group.className = 'input-group mb-2';
                                group.innerHTML = `
                                    <input type="text" class="form-control" name="detalles[]" value="${detalleTexto}">
                                    <button class="btn btn-outline-danger btn-remove-detalle" type="button"><i class="bi bi-trash"></i></button>
                                `;
                                editarDetallesContainer.appendChild(group);
                            });
                        } else if (typeof paquete.detalles[0] === 'object' && paquete.detalles[0] !== null) {
                            paquete.detalles.forEach(detalle => {
                                const textoDetalle = detalle.texto || '';
                                const group = document.createElement('div');
                                group.className = 'input-group mb-2';
                                group.innerHTML = `
                                    <input type="text" class="form-control" name="detalles[]" value="${textoDetalle}">
                                    <button class="btn btn-outline-danger btn-remove-detalle" type="button"><i class="bi bi-trash"></i></button>
                                `;
                                editarDetallesContainer.appendChild(group);
                            });
                        }
                    }
                }

                modalEditar.show();
            } catch (error) {
                alert(error.message);
            }
        }
    });

    btnAgregarDetalleEditar.addEventListener('click', () => {
        const group = document.createElement('div');
        group.className = 'input-group mb-2';
        group.innerHTML = `
            <input type="text" class="form-control" name="detalles[]" placeholder="Escribe un detalle">
            <button class="btn btn-outline-danger btn-remove-detalle" type="button"><i class="bi bi-trash"></i></button>
        `;
        editarDetallesContainer.appendChild(group);
    });

    editarDetallesContainer.addEventListener('click', (e) => {
        if (e.target.closest('.btn-remove-detalle')) {
            e.target.closest('.input-group').remove();
        }
    });

    formEditar.addEventListener('submit', async (e) => {
        e.preventDefault();
        
        const detalles = [...editarDetallesContainer.querySelectorAll('input[name="detalles[]"]')]
            .map(input => input.value.trim())
            .filter(val => val.length > 0)
            .map(texto => ({ texto }));
        
        const data = {
            titulo: editarTitulo.value.trim(),
            descripcion: editarDescripcion.value.trim(),
            precio: parseFloat(editarPrecio.value),
            detalles
        };
    
        try {
            const res = await fetch(`/paquetes/${paqueteIdEditar}`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify(data)
            });
        
            if (!res.ok) {
                const errorData = await res.json();
                throw new Error(errorData.error || 'Error al actualizar paquete');
            }
        
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