import './bootstrap';
import Swiper from 'swiper';
import { Autoplay, EffectFade } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/effect-fade';
import anime from 'animejs/lib/anime.es.js';

const swiper = new Swiper('.swiper', {
    effect: 'fade',
    fadeEffect: {
        crossFade: true
    },
    modules: [EffectFade,Autoplay],
    speed: 400,
    loop: true,
    autoplay: true,
});

let observerOptions = {
    rootMargin: '0px',
    threshold: 0.5
}

var observer = new IntersectionObserver(observerCallback, observerOptions);

function observerCallback(entries, observer) {
    entries.forEach(entry => {
        if(entry.isIntersecting) {
            anime({
                targets: `div[data-block="${entry.target.dataset.block}"]`,
            })
            anime({
                targets: `div[data-block="${entry.target.dataset.block}"]`,
                translateY: 0,
                opacity: 100,
                delay: 200
            });
        }
    });
};

let target = 'div[data-block]';
document.querySelectorAll(target).forEach((i) => {
    if (i) {
        observer.observe(i);
    }
});
