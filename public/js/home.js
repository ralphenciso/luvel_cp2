let playlist = document.querySelectorAll('[data-url]');
let play = document.querySelector('#playing');


playlist.forEach(video => {
    video.addEventListener('click', () => {
        let src = video.dataset.url;
        play.src = `${src}?autoplay=1&modestbranding=1&autohide=1&showinfo=0`;
    })
})
