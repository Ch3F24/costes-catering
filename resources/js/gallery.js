import { createApp } from 'vue';
import Gallery from "./Components/Gallery.vue";
import Modal from "./Components/Modal.vue";
const app = createApp({});

app
    .component('Gallery',Gallery)
    .component('Modal',Modal);

app.mount('#app');
