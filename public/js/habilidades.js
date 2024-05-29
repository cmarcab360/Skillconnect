// Contenedor principal y el carrusel
const wrapper = document.querySelector(".wrapper");
const carousel = document.querySelector(".carousel");

//Ancho de la primera tarjeta
const firstCardWidth = carousel.querySelector(".card").offsetWidth;

//Botones
const arrowBtns = document.querySelectorAll(".wrapper .flecha");

//// Convierte los hijos del carrusel en un array
const carouselChildrens = [...carousel.children];

let isDragging = false,
    isAutoPlay = true,
    startX,
    startScrollLeft,
    timeoutId;

// Calcula el número de tarjetas que caben en el carrusel a la vez
let cardPerView = Math.round(carousel.offsetWidth / firstCardWidth);

// Inserta copias de las últimas tarjetas al principio y al final del carrusel para que sea infinito
carouselChildrens
    .slice(-cardPerView)
    .reverse()
    .forEach((card) => {
        carousel.insertAdjacentHTML("afterbegin", card.outerHTML);
    });

carouselChildrens.slice(0, cardPerView).forEach((card) => {
    carousel.insertAdjacentHTML("beforeend", card.outerHTML);
});

// Desplaza el carrusel a la posición adecuada para ocultar las primeras tarjetas duplicadas
carousel.classList.add("no-transition");
carousel.scrollLeft = carousel.offsetWidth;
carousel.classList.remove("no-transition");

// Añade event listeners a los botones de flecha para desplazar el carrusel a la izquierda y derecha
arrowBtns.forEach((btn) => {
    btn.addEventListener("click", () => {
        carousel.scrollLeft +=
            btn.id == "left" ? -firstCardWidth : firstCardWidth;
    });
});

const dragStart = (e) => {
    isDragging = true;
    carousel.classList.add("dragging");
    // Registra la posición inicial del cursor y la posición de desplazamiento del carrusel
    startX = e.pageX;
    startScrollLeft = carousel.scrollLeft;
};

const dragging = (e) => {
    if (!isDragging) return; // Si isDragging es falso, retorna aquí
    // Actualiza la posición de desplazamiento del carrusel basada en el movimiento del cursor
    carousel.scrollLeft = startScrollLeft - (e.pageX - startX);
};

const dragStop = () => {
    isDragging = false;
    carousel.classList.remove("dragging");
};

const infiniteScroll = () => {
    // Si el carrusel está al inicio se desplaza hasta al final
    if (carousel.scrollLeft === 0) {
        carousel.classList.add("no-transition");
        carousel.scrollLeft = carousel.scrollWidth - 2 * carousel.offsetWidth;
        carousel.classList.remove("no-transition");
    }
    // Si el carrusel esta al final se desplaza hasta al inicio
    else if (
        Math.ceil(carousel.scrollLeft) ===
        carousel.scrollWidth - carousel.offsetWidth
    ) {
        carousel.classList.add("no-transition");
        carousel.scrollLeft = carousel.offsetWidth;
        carousel.classList.remove("no-transition");
    }

    // Añade event listeners para manejar el arrastre del carrusel
    carousel.addEventListener("mousedown", dragStart);
    carousel.addEventListener("mousemove", dragging);
    document.addEventListener("mouseup", dragStop);
    carousel.addEventListener("scroll", infiniteScroll);
    wrapper.addEventListener("mouseenter", () => clearTimeout(timeoutId));
};
