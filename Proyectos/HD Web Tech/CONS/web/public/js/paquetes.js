document.addEventListener('DOMContentLoaded', () => {
    const container = document.getElementById('paquetes-container');
    const form = document.getElementById('formPaquete');

    // Cargar paquetes existentes
    fetch('/paquetes')
        .then(response => response.json())
        .then(paquetes => {
            paquetes.forEach(paquete => appendPaqueteCard(paquete));
            appendAddCard(); // Añadir card con "+"
        })
        .catch(error => console.error('Error cargando paquetes:', error));

    // Función para añadir la card "+"
    function appendAddCard() {
        const addCard = document.createElement('div');
        addCard.className = 'col-md-4 mb-4';
        addCard.innerHTML = `
            <div 
                class="card h-100 d-flex justify-content-center align-items-center border border-dashed border-secondary"
                style="cursor:pointer; user-select:none; transition: background-color 0.3s, color 0.3s;"
                data-bs-toggle="modal" data-bs-target="#modalPaquete"
                onmouseover="this.style.backgroundColor='#f0f0f0'; this.style.color='#007bff';"
                onmouseout="this.style.backgroundColor=''; this.style.color='gray';"
            >
                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                    <p class="mb-0 fw-semibold text-secondary" style="font-size: 1.5rem">Añadir paquete</p>
                </div>
            </div>
        `;
        container.appendChild(addCard);
    }

    // Función para crear una card de paquete
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
                </div>
            </div>
        `;
        container.insertBefore(card, container.firstChild); // Inserta al inicio para orden descendente
    }

    // Añadir nuevo campo de detalle
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

    // Eliminar campo de detalle
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
            detalles: detalles
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
            if (!response.ok) {
                throw new Error(`HTTP ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            // Mostrar SweetAlert de éxito
            Swal.fire({
                icon: 'success',
                title: '¡Paquete creado correctamente!',
                showConfirmButton: false,
                timer: 1000,
            }).then(() => {
                // Redirigir a la lista de paquetes, por ejemplo:
                window.location.href = '/';
            });
        })
        .catch(error => {
            console.error('Error al guardar paquete:', error);
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'No se pudo guardar el paquete'
            });
        });
    });
});