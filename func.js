document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('modal');
    const modalImg = document.getElementById('modal-img');
    const galleryItems = document.querySelectorAll('.gallery__item');
    const modalPrev = document.querySelector('.modal-prev');
    const modalNext = document.querySelector('.modal-next');

    let currentIndex = 0;
    let touchstartX = 0;
    let touchendX = 0;

    // Função para exibir a imagem no modal
    function showModal(index) {
        const imgSrc = galleryItems[index].querySelector('.gallery__img').src;
        modalImg.src = imgSrc;
        modal.style.display = 'block';
        currentIndex = index;
    }

    // Evento de clique para abrir o modal com a imagem correspondente
    galleryItems.forEach((item, index) => {
        item.addEventListener('click', function(event) {
            event.preventDefault();
            showModal(index);
        });
    });

    // Evento de clique na seta anterior
    modalPrev.addEventListener('click', function(event) {
        event.preventDefault();
        currentIndex = (currentIndex - 1 + galleryItems.length) % galleryItems.length;
        showModal(currentIndex);
    });

    // Evento de clique na próxima seta
    modalNext.addEventListener('click', function(event) {
        event.preventDefault();
        currentIndex = (currentIndex + 1) % galleryItems.length;
        showModal(currentIndex);
    });

    // Evento de pressionar teclas do teclado
    document.addEventListener('keydown', function(e) {
        if (e.key === 'ArrowLeft' && modal.style.display === 'block') {
            currentIndex = (currentIndex - 1 + galleryItems.length) % galleryItems.length;
            showModal(currentIndex);
        } else if (e.key === 'ArrowRight' && modal.style.display === 'block') {
            currentIndex = (currentIndex + 1) % galleryItems.length;
            showModal(currentIndex);
        } else if (e.key === 'Escape' && modal.style.display === 'block') {
            modal.style.display = 'none';
        }
    });

    // Eventos de toque (touch) para dispositivos móveis
    modal.addEventListener('touchstart', function(event) {
        touchstartX = event.changedTouches[0].screenX;
    });

    modal.addEventListener('touchend', function(event) {
        touchendX = event.changedTouches[0].screenX;
        handleGesture();
    });

    function handleGesture() {
        if (touchendX < touchstartX) {
            // Swipe para a esquerda
            currentIndex = (currentIndex + 1) % galleryItems.length;
            showModal(currentIndex);
        }

        if (touchendX > touchstartX) {
            // Swipe para a direita
            currentIndex = (currentIndex - 1 + galleryItems.length) % galleryItems.length;
            showModal(currentIndex);
        }
    }

    // Fechar o modal ao clicar no botão de fechar
    const modalClose = document.querySelector('.modal-close');
    modalClose.addEventListener('click', function() {
        modal.style.display = 'none';
    });

    // Fechar o modal ao clicar fora da imagem
    modal.addEventListener('click', function(e) {
        if (e.target === modal) {
            modal.style.display = 'none';
        }
    });

    // Fechar o modal ao pressionar a tecla Esc
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && modal.style.display === 'block') {
            modal.style.display = 'none';
        }
    });

    const hamburger = document.querySelector(".hamburger");
    const nav = document.querySelector(".nav");
    const navLinks = document.querySelectorAll(".nav-list a");


    hamburger.addEventListener("click", () => nav.classList.toggle("active"));

    navLinks.forEach(link => {
        link.addEventListener("click", () => {
            nav.classList.remove("active");
        });
    });

});


