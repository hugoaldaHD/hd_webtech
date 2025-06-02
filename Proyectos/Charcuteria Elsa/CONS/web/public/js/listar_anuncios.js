document.addEventListener('DOMContentLoaded', () => {
    fetch('/anuncios')
        .then(response => response.json())
        .then(anuncios => {
            const indicators = document.getElementById('carousel-indicators');
            const inner = document.getElementById('carousel-inner');

            anuncios.forEach((anuncio, index) => {
                if (!anuncio.paquete) return;

                // Indicador
                const indicator = document.createElement('button');
                indicator.type = 'button';
                indicator.setAttribute('data-bs-target', '#carouselAnuncios');
                indicator.setAttribute('data-bs-slide-to', index);
                indicator.setAttribute('aria-label', `Slide ${index + 1}`);
                if (index === 0) {
                    indicator.classList.add('active');
                    indicator.setAttribute('aria-current', 'true');
                }
                indicators.appendChild(indicator);

                // Item del carrusel
                const item = document.createElement('div');
                item.className = 'carousel-item' + (index === 0 ? ' active' : '');

                const detalles = anuncio.paquete.detalles.map(detalle => `<li>${detalle.texto}</li>`).join('');
                item.innerHTML = `
                    <div class="d-flex justify-content-center">
                        <div class="col-md-6">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h5 class="card-title"><i class="bi bi-box-seam"></i> ${anuncio.paquete.titulo}</h5>
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