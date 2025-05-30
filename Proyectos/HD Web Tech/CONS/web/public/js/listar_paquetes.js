document.addEventListener('DOMContentLoaded', () => {
    const container = document.getElementById('paquetes-container');

    // Hacerla global
    window.cargarPaquetes = async function () {
        container.innerHTML = '';
        try {
            const response = await fetch('/paquetes');
            const paquetes = await response.json();
            paquetes.forEach(paquete => appendPaqueteCard(paquete));
            appendAddCard();
        } catch (error) {
            console.error('Error cargando paquetes:', error);
        }
    };

    // Llamamos directamente a la función global
    cargarPaquetes();

    function appendAddCard() {
        const addCard = document.createElement('div');
        addCard.className = 'col-md-4 mb-4';
        addCard.innerHTML = `
            <div class="card h-100 d-flex justify-content-center align-items-center border border-dashed border-secondary"
                style="cursor:pointer; user-select:none;"
                data-bs-toggle="modal" data-bs-target="#modalPaquete"
                onmouseover="this.style.backgroundColor='#f0f0f0'; this.style.color='#007bff';"
                onmouseout="this.style.backgroundColor=''; this.style.color='gray';">
                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                    <p class="mb-0 fw-semibold text-secondary" style="font-size: 1.5rem">Añadir paquete</p>
                </div>
            </div>
        `;
        container.appendChild(addCard);
    }

    function appendPaqueteCard(paquete) {
        const detalles = paquete.detalles?.map(detalle => `<li>${detalle.texto}</li>`).join('') || '';
        const card = document.createElement('div');
        card.className = 'col-md-4 mb-4';
        card.innerHTML = `
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title"><i class="bi bi-box-seam"></i> ${paquete.titulo}</h5>
                    <p class="card-text">${paquete.descripcion}</p>
                    <ul>${detalles}</ul>
                    <p><strong>Precio:</strong> ${parseFloat(paquete.precio).toFixed(2)} €</p>
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-sm btn-outline-primary me-2 btnEditar" data-id="${paquete.id_paquete}"><i class="bi bi-pencil-square"></i></button>
                        <button class="btn btn-sm btn-outline-danger btnEliminar" data-id="${paquete.id_paquete}"><i class="bi bi-trash"></i></button>
                    </div>
                </div>
            </div>
        `;
        container.insertBefore(card, container.firstChild);
    }
});