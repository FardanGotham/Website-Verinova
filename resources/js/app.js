

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import Chart from 'chart.js/auto';

window.Chart = Chart;

import AOS from 'aos';
import 'aos/dist/aos.css';

AOS.init({
    duration: 1000,
    once: true,
});

document.addEventListener('DOMContentLoaded', () => {

    const links = document.querySelectorAll('nav a[href^="#"]');

    window.addEventListener('scroll', () => {

        let current = '';

        document.querySelectorAll('section').forEach(section => {

            const top = section.offsetTop - 120;

            if (scrollY >= top) {
                current = section.getAttribute('id');
            }

        });

        links.forEach(link => {

            link.classList.remove('text-blue-600');

            if (link.getAttribute('href') === '#' + current) {

                link.classList.add('text-blue-600');

            }

        });

    });

});