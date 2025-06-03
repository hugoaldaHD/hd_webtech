document.addEventListener('DOMContentLoaded', () => {
    const container = document.getElementById('paquetes-container');

    window.cargarPaquetes = async function () {
        container.innerHTML = '';
        try {
            const response = await fetch('/paquetes');
            const paquetes = await response.json();
            paquetes.forEach(paquete => appendPaqueteRow(paquete));
        } catch (error) {
            console.error('Error cargando paquetes:', error);
        }
    };

    cargarPaquetes();

    function appendPaqueteRow(paquete) {
        const detalles = paquete.detalles?.map(detalle => `<li>${detalle.texto}</li>`).join('') || '';
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${paquete.titulo}</td>
            <td>${paquete.descripcion}</td>
            <td><ul class="mb-0">${detalles}</ul></td>
            <td>${parseFloat(paquete.precio).toFixed(2)} €</td>
            <td>
                <button class="btn btn-sm btn-outline-primary me-2 btnEditar" data-id="${paquete.id_paquete}">
                    <i class="bi bi-pencil-square"></i>
                </button>
                <button class="btn btn-sm btn-outline-danger btnEliminar" data-id="${paquete.id_paquete}">
                    <i class="bi bi-trash"></i>
                </button>
            </td>
        `;
        container.appendChild(row);
    }
});