<?php
/**
 * @var $this \yii\web\View
 * @var $videoId string
 */

?>
<style>
    .video {
        position: relative;
        width: 100%;
        height: 0;
        padding-bottom: 56.25%;
        background-color: #000000;
    }

    .video__link {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }

    .video__media {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border: none;
    }

    .video__button {
        position: absolute;
        top: 50%;
        left: 50%;
        z-index: 1;
        display: none;
        padding: 0;
        width: 13%;
        height: 20%;
        border: none;
        background-color: transparent;
        transform: translate(-50%, -50%);
        cursor: pointer;
    }

    .video__button-shape {
        fill: #212121;
        fill-opacity: 0.8;
    }

    .video__button-icon {
        fill: #ffffff;
    }

    .video__button:focus {
        outline: none;
    }

    .video:hover .video__button-shape,
    .video__button:focus .video__button-shape {
        fill: #ff0000;
        fill-opacity: 1;
    }

    /* Enabled */

    .video--enabled {
        cursor: pointer;
    }

    .video--enabled .video__button {
        display: block;
    }
</style>


<div class="video">
    <a class="video__link" href="https://youtu.be/<?= $videoId ?>">
        <picture>
            <source srcset="https://i.ytimg.com/vi_webp/<?= $videoId ?>/maxresdefault.webp" type="image/webp">
            <img class="video__media" src="https://i.ytimg.com/vi/<?= $videoId ?>/maxresdefault.jpg"
                 alt="1. Пилот, разборы, ответы и лайвы">
        </picture>
    </a>
    <button class="video__button" type="button" aria-label="Запустить видео">
        <svg width="100%" height="100%" viewBox="0 0 68 48">
            <path class="video__button-shape"
                  d="M66.52,7.74c-0.78-2.93-2.49-5.41-5.42-6.19C55.79,.13,34,0,34,0S12.21,.13,6.9,1.55 C3.97,2.33,2.27,4.81,1.48,7.74C0.06,13.05,0,24,0,24s0.06,10.95,1.48,16.26c0.78,2.93,2.49,5.41,5.42,6.19 C12.21,47.87,34,48,34,48s21.79-0.13,27.1-1.55c2.93-0.78,4.64-3.26,5.42-6.19C67.94,34.95,68,24,68,24S67.94,13.05,66.52,7.74z"></path>
            <path class="video__button-icon" d="M 45,24 27,14 27,34"></path>
        </svg>
    </button>
</div>


<script>
    function findVideos() {
        let videos = document.querySelectorAll('.video');

        for (let i = 0; i < videos.length; i++) {
            setupVideo(videos[i]);
        }
    }

    function setupVideo(video) {
        let link = video.querySelector('.video__link');
        let media = video.querySelector('.video__media');
        let button = video.querySelector('.video__button');
        let id = parseMediaURL(media);

        video.addEventListener('click', () => {
            let iframe = createIframe(id);

            link.remove();
            button.remove();
            video.appendChild(iframe);
        });

        link.removeAttribute('href');
        video.classList.add('video--enabled');
    }

    function parseMediaURL(media) {
        let regexp = /https:\/\/i\.ytimg\.com\/vi\/([a-zA-Z0-9_-]+)\/maxresdefault\.jpg/i;
        let url = media.src;
        let match = url.match(regexp);

        return match[1];
    }

    function createIframe(id) {
        let iframe = document.createElement('iframe');

        iframe.setAttribute('allowfullscreen', '');
        iframe.setAttribute('allow', 'autoplay');
        iframe.setAttribute('src', generateURL(id));
        iframe.classList.add('video__media');

        return iframe;
    }

    function generateURL(id) {
        let query = '?rel=0&showinfo=0&autoplay=1';

        return 'https://www.youtube.com/embed/' + id + query;
    }

    findVideos();
</script>