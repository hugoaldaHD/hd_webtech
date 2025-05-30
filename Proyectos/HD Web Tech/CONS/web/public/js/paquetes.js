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

    document.addEventListener('DOMContentLoaded', () => {
      const modalEditar = new bootstrap.Modal(document.getElementById('modalEditarPaquete'));
      const modalEliminar = new bootstrap.Modal(document.getElementById('modalEliminarPaquete'));

      // Referencias a elementos
      const formEditar = document.getElementById('formEditarPaquete');
      const editarNombre = document.getElementById('editarNombre');
      const editarPrecio = document.getElementById('editarPrecio');
      const editarDetallesContainer = document.getElementById('editarDetallesContainer');
      const btnAgregarDetalleEditar = document.getElementById('btnAgregarDetalleEditar');

      let paqueteIdEditar = null;
      let paqueteIdEliminar = null;

      // --- BOTONES EDITAR ---
      document.querySelectorAll('.btnEditar').forEach(btn => {
        btn.addEventListener('click', async () => {
          paqueteIdEditar = btn.getAttribute('data-id');

          // Aquí traemos datos del paquete (puedes cambiar la URL según tu backend)
          try {
            const res = await fetch(`/paquetes/${paqueteIdEditar}`);
            if (!res.ok) throw new Error('Error al cargar datos del paquete');
            const paquete = await res.json();

            // Rellenar inputs con datos
            editarNombre.value = paquete.nombre;
            editarPrecio.value = paquete.precio;

            // Limpiar detalles previos
            editarDetallesContainer.innerHTML = '';

            // Añadir detalles recibidos (asumo array de strings)
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
        });
      });

      // Botón para añadir detalle extra en edición
      btnAgregarDetalleEditar.addEventListener('click', () => {
        const input = document.createElement('input');
        input.type = 'text';
        input.name = 'detalles[]';
        input.className = 'form-control mb-2';
        editarDetallesContainer.appendChild(input);
      });

      // Enviar formulario editar
      formEditar.addEventListener('submit', async (e) => {
        e.preventDefault();

        const detalles = [...editarDetallesContainer.querySelectorAll('input[name="detalles[]"]')]
          .map(input => input.value.trim())
          .filter(val => val.length > 0);

        const data = {
          nombre: editarNombre.value.trim(),
          precio: parseFloat(editarPrecio.value),
          detalles: detalles
        };

        try {
          const res = await fetch(`/paquetes/${paqueteIdEditar}`, {
            method: 'PUT', // o PATCH según tu backend
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify(data)
          });
          if (!res.ok) throw new Error('Error al actualizar paquete');

          modalEditar.hide();
          // Actualizar la lista o recargar paquetes
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

      // --- BOTONES ELIMINAR ---
      document.querySelectorAll('.btnEliminar').forEach(btn => {
        btn.addEventListener('click', () => {
          paqueteIdEliminar = btn.getAttribute('data-id');
          modalEliminar.show();
        });
      });

      // Confirmar eliminar
      document.getElementById('btnConfirmarEliminar').addEventListener('click', async () => {
        if (!paqueteIdEliminar) return;

        try {
          const res = await fetch(`/paquetes/${paqueteIdEliminar}`, {
            method: 'DELETE',
            headers: {'Content-Type': 'application/json'}
          });
          if (!res.ok) throw new Error('Error al eliminar paquete');

          modalEliminar.hide();
          await cargarPaquetes();

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

      // Función para recargar la lista de paquetes (tú debes implementarla)
      async function cargarPaquetes() {
        // Aquí tu lógica para recargar paquetes y volver a poner eventListeners
        // Por ejemplo, hacer fetch, actualizar el DOM, y volver a enlazar botones editar y eliminar
      }
    });
});