document.addEventListener('DOMContentLoaded', () => {
    fetch('/anuncios')
        .then(response => response.json())
        .then(anuncios => {
            console.log('Anuncios cargados:', anuncios); // 👈 Verifica la estructura

            const indicators = document.getElementById('carousel-indicators');
            const inner = document.getElementById('carousel-inner');

            indicators.innerHTML = '';
            inner.innerHTML = '';

            const anunciosConPaquete = anuncios.filter(a => a.paquete);

            if (anunciosConPaquete.length === 0) {
                console.warn('No hay anuncios con paquete.');
                return;
            }

            anunciosConPaquete.forEach((anuncio, index) => {
                const isActive = index === 0 ? 'active' : '';

                const indicator = document.createElement('button');
                indicator.type = 'button';
                indicator.setAttribute('data-bs-target', '#carouselAnuncios');
                indicator.setAttribute('data-bs-slide-to', index);
                indicator.setAttribute('aria-label', `Slide ${index + 1}`);
                if (isActive) {
                    indicator.classList.add('active');
                    indicator.setAttribute('aria-current', 'true');
                }
                indicators.appendChild(indicator);

                const item = document.createElement('div');
                item.className = `carousel-item ${isActive}`;

                const detalles = anuncio.paquete.detalles?.map(d => `<li>${d.texto}</li>`).join('') || '';

                item.innerHTML = `
                    <div class="d-flex justify-content-center">
                        <div class="col-md-6">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h5 class="card-title">${anuncio.paquete.titulo}</h5>
                                    <p class="card-text">${anuncio.paquete.descripcion}</p>
                                    <ul>${detalles}</ul>
                                    <p><strong>Precio:</strong> ${parseFloat(anuncio.paquete.precio).toFixed(2)} €</p>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                inner.appendChild(item);
            });
        })
        .catch(error => console.error('Error cargando anuncios:', error));
});