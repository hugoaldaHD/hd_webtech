document.addEventListener('DOMContentLoaded', () => {
    const container = document.getElementById('paquetes-container');

    window.cargarPaquetes = async function () {
        container.innerHTML = '';
        try {
            const response = await fetch('/paquetes');
            const paquetes = await response.json();
            paquetes.forEach(paquete => appendPaqueteCard(paquete));
        } catch (error) {
            console.error('Error cargando paquetes:', error);
        }
    };

    cargarPaquetes();

    function appendPaqueteCard(paquete) {
        const detalles = paquete.detalles?.map(detalle => `<li>${detalle.texto}</li>`).join('') || '';
        const card = document.createElement('div');
        card.className = 'col-md-4 mb-4';
        card.innerHTML = `
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">${paquete.titulo}</h5>
                    <p class="card-text">${paquete.descripcion}</p>
                    <ul>${detalles}</ul>
                    <p><strong>Precio:</strong> ${parseFloat(paquete.precio).toFixed(2)} €</p>
                </div>
            </div>
        `;
        container.appendChild(card);
    }
});