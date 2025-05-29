document.addEventListener("DOMContentLoaded", () => {
    fetch('/paquetes')
        .then(res => res.json())
        .then(paquetes => {
            const container = document.getElementById('paquetes-container');

            if (!container) return;

            paquetes.forEach(paquete => {
                const col = document.createElement('div');
                col.className = 'col-md-4 mb-4';

                const card = document.createElement('div');
                card.className = 'card h-100 shadow';

                const body = document.createElement('div');
                body.className = 'card-body';

                const title = document.createElement('h5');
                title.className = 'card-title';
                title.textContent = paquete.titulo;

                const desc = document.createElement('p');
                desc.className = 'card-text';
                desc.textContent = paquete.descripcion;

                const ul = document.createElement('ul');
                paquete.detalles.forEach(detalle => {
                    const li = document.createElement('li');
                    li.textContent = detalle.texto;
                    ul.appendChild(li);
                });

                const precio = document.createElement('p');
                precio.innerHTML = `<strong>Precio:</strong> ${parseFloat(paquete.precio).toFixed(2)} €`;

                const btn = document.createElement('a');
                btn.className = 'btn btn-primary mt-2';
                btn.href = '#';
                btn.innerHTML = '<i class="bi bi-cart-plus"></i> Solicitar';

                body.append(title, desc, ul, precio, btn);
                card.appendChild(body);
                col.appendChild(card);
                container.appendChild(col);
            });
        })
        .catch(err => {
            console.error("Error cargando paquetes:", err);
        });
});