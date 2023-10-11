import './bootstrap';
import Swiper from 'swiper';
import { Autoplay } from 'swiper/modules';
import 'swiper/css';
// import 'swiper/css/navigation';
// import 'swiper/css/pagination';

const swiper = new Swiper('.swiper', {
    modules: [Autoplay],
    speed: 400,
    loop: true,
    autoplay: true,
});

