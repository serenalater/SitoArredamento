const navbar = document.getElementById('navbar');
const logobianco = document.getElementById('logobianco');
const logonero = document.getElementById('logonero');

window.addEventListener('scroll', () => {
        

    if (window.scrollY > 50) {
        navbar.classList.add('sticky-navbar');
        logobianco.classList.add('d-none');
        logonero.classList.remove('d-none');
    } else {
        navbar.classList.remove('sticky-navbar');
        logobianco.classList.remove('d-none');
        logonero.classList.add('d-none');
    }
});