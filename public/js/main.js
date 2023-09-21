const hamburger = document.getElementById('hamburger');
const navMenu = document.getElementById('nav-menu');
const closeIcon = document.getElementById('nav-close');

let isMenuOpen = false;

const toggleMenu = () => {
    if (isMenuOpen) {
        navMenu.classList.add('hidden');
        closeIcon.classList.add('sm:hidden');
        hamburger.style.display = 'block';
    } else {
        navMenu.classList.remove('hidden');
        closeIcon.classList.remove('sm:hidden');
        hamburger.style.display = 'none';
    }
    isMenuOpen = !isMenuOpen;
};

closeIcon.addEventListener('click', toggleMenu);

hamburger.addEventListener('click', toggleMenu);
