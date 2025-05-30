document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('formPaquete');

    // Añadir campo de detalle
    document.getElementById('btnAddDetalle').addEventListener('click', () => {
        const container = document.getElementById('detalles-container');
        const inputGroup = document.createElement('div');
        inputGroup.className = 'input-group mb-2';
        inputGroup.innerHTML = `
            <input type="text" class="form-control detalle-input" placeholder="Escribe un detalle">
            <button class="btn btn-outline-danger btn-remove-detalle" type="button">&times;</button>
        `;
        container.appendChild(inputGroup);
    });

    // Eliminar campo detalle
    document.getElementById('detalles-container').addEventListener('click', (e) => {
        if (e.target.classList.contains('btn-remove-detalle')) {
            e.target.closest('.input-group').remove();
        }
    });

    // Enviar nuevo paquete
    form.addEventListener('submit', (e) => {
        e.preventDefault();

        const detalles = Array.from(document.querySelectorAll('.detalle-input'))
            .map(input => input.value.trim())
            .filter(texto => texto !== '')
            .map(texto => ({ texto }));

        const nuevoPaquete = {
            titulo: document.getElementById('titulo').value,
            descripcion: document.getElementById('descripcion').value,
            precio: parseFloat(document.getElementById('precio').value),
            detalles
        };

        fetch('/paquetes/nuevo', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify(nuevoPaquete)
        })
        .then(response => {
            if (!response.ok) throw new Error(`HTTP ${response.status}`);
            return response.json();
        })
        .then(() => {
            Swal.fire({
                icon: 'success',
                title: '¡Paquete creado correctamente!',
                showConfirmButton: false,
                timer: 1000
            }).then(() => window.location.href = '/');
        })
        .catch(error => {
            console.error('Error al guardar paquete:', error);
            Swal.fire({ icon: 'error', title: 'Error', text: 'No se pudo guardar el paquete' });
        });
    });
});