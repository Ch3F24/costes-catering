<template>
    <div class="text-white absolute w-full h-full top-0 right-0 bg-black/30 flex justify-end items-end hover:bg-black/50 transition-colors cursor-pointer" @click="openModal()">
        <span class="mx-4 my-2">
            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg" class="inline-block mr-1">
                <path d="M13.8405 13.0662L9.89067 9.11638C11.6903 6.92683 11.5678 3.67651 9.52287 1.63158C7.34743 -0.54386 3.80775 -0.54386 1.63231 1.63158C-0.543128 3.80702 -0.543128 7.3467 1.63231 9.52214C3.6767 11.5665 6.92661 11.6903 9.11712 9.88994L13.067 13.8398C13.2806 14.0534 13.6269 14.0534 13.8405 13.8398C14.0541 13.6262 14.0541 13.2799 13.8405 13.0662ZM8.74934 8.74858C7.00044 10.4975 4.15477 10.4975 2.40587 8.74858C0.656962 6.99968 0.656962 4.15401 2.40587 2.40511C4.15472 0.656284 7.00038 0.656147 8.74934 2.40511C10.4982 4.15401 10.4982 6.99968 8.74934 8.74858Z" fill="white"/>
                <path d="M8.25559 5.02972H6.12442V2.89855C6.12442 2.59645 5.87953 2.35156 5.57744 2.35156C5.27534 2.35156 5.03045 2.59645 5.03045 2.89855V5.02972H2.89928C2.59719 5.02972 2.35229 5.27461 2.35229 5.5767C2.35229 5.8788 2.59719 6.12369 2.89928 6.12369H5.03045V8.25486C5.03045 8.55695 5.27534 8.80184 5.57744 8.80184C5.87953 8.80184 6.12442 8.55695 6.12442 8.25486V6.12369H8.25559C8.55768 6.12369 8.80257 5.8788 8.80257 5.5767C8.80257 5.27461 8.55768 5.02972 8.25559 5.02972Z" fill="white"/>
            </svg>
            <span class="inline-block">{{ photoNumber }}</span>
        </span>
    </div>
    <Modal v-if="open" @close="closeModal()">
        <flickity ref="flickity" :options="options" class="w-full gallery-slider">
            <div class="carousel-cell" v-for="(photo,index) in photos">
                <div v-if="photo.youtube_url" class="relative h-0 overflow-hidden max-w-full w-full" style="padding-bottom: 56.25%;">
                    <iframe :src="getEmbedUrl(photo.youtube_url)" class="absolute top-0 left-0 w-full h-full"  title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
                <img :data-flickity-lazyload="photo.src" :alt="photo.alt" loading=lazy :key="index" v-else>
            </div>
        </flickity>
    </Modal>

</template>

<script>
import Flickity from './Flickity.vue';
import Modal from "./Modal.vue";
import { getIdFromURL } from 'vue-youtube-embed'

const body = document.body
export default {
    name: "Gallery",
    components: {
        Flickity,
        Modal
    },
    props: {
        photoNumber: {
            type: String,
            default: 0
        },
        photoProps: {
            required: true
        },
        photoObject: {
            required: false
        }
    },
    data() {
        return {
            options: {
                initialIndex: 0,
                prevNextButtons: false,
                pageDots: true,
                wrapAround: true,
                lazyLoad: true
            },
            open: false,
            photos: [],
            loading: 0
        }
    },
    mounted() {
        this.photos = JSON.parse(this.photoProps)
    },
    methods: {
        openModal() {
            this.open = true
            body.style.overflow = 'hidden'
        },
        closeModal() {
            this.open = false
            body.style.overflow = 'auto'
        },
        getEmbedUrl(url) {
            return "https://www.youtube.com/embed/" + getIdFromURL(url);
        }
    }
}
</script>

<style>
@import 'flickity/dist/flickity.min.css';

.gallery-slider .flickity-page-dots .dot {
    background: #ffffff;
}
.flickity-page-dots .dot.is-selected {
    background: white;
}
.flickity-page-dot.is-selected,
.flickity-page-dot {
    background: #ffffff;
}
.flickity-page-dot:not(.is-selected) {
    opacity: 25%;
}
.flickity-page-dot:focus {
    outline: none;
    box-shadow: none;
}

.carousel-cell {
    width: 100%;
    height: 80vh;
    padding: 0 16px;
    display: flex;
    justify-content: center;
    align-items: center;
}

</style>
