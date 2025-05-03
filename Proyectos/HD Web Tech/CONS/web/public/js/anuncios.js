document.addEventListener("DOMContentLoaded", () => {
    const inner = document.getElementById('carousel-inner');
    const indicators = document.getElementById('carousel-indicators');
    const carousel = document.getElementById('carouselAnunciosContainer');

    if (!inner || !indicators || !carousel) return;

    fetch('/anuncios')
        .then(res => res.json())
        .then(anuncios => {
            inner.innerHTML = '';
            indicators.innerHTML = '';

            anuncios.forEach((anuncio, index) => {
                const paquete = anuncio.paquete;
                if (!paquete) return;

                // Slide
                const item = document.createElement('div');
                item.className = 'carousel-item' + (index === 0 ? ' active' : '');

                const content = document.createElement('div');
                content.className = 'carousel-content text-center p-4';
                content.innerHTML = `
                    <h3>${paquete.titulo}</h3>
                    <p>${paquete.descripcion}</p>
                    <ul style="text-align: left; max-width: 600px; margin: 0 auto;">
                        ${(paquete.detalles || []).map(d => `<li>${d.texto}</li>`).join('')}
                    </ul>
                    <p class="precio mt-3"><strong>Precio:</strong> ${parseFloat(paquete.precio).toFixed(2)} €</p>
                `;

                item.appendChild(content);
                inner.appendChild(item);

                // Indicador
                const dot = document.createElement('button');
                dot.type = 'button';
                dot.setAttribute('data-bs-target', '#carouselAnunciosContainer');
                dot.setAttribute('data-bs-slide-to', index);
                if (index === 0) dot.classList.add('active');
                indicators.appendChild(dot);
            });

            // Inicializar carrusel (por si no se activa solo)
            new bootstrap.Carousel(carousel, {
                interval: 5000,
                wrap: true,
                pause: 'hover'
            });
        })
        .catch(err => {
            console.error("Error cargando anuncios:", err);
            inner.innerHTML = '<div class="text-danger p-5 text-center">Error al cargar los anuncios.</div>';
        });
});