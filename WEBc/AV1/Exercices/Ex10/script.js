// Selección de elementos
const video = document.getElementById('video');
const playBtn = document.getElementById('play');
const pauseBtn = document.getElementById('pause');
const muteBtn = document.getElementById('mute');
const volumeSlider = document.getElementById('volume');
const envButtons = document.querySelectorAll('.env-button');

// Eventos para los botones de reproducción
playBtn.addEventListener('click', () => video.play());
pauseBtn.addEventListener('click', () => video.pause());
muteBtn.addEventListener('click', () => {
  video.muted = !video.muted;
});

// Control de volumen
volumeSlider.addEventListener('input', (e) => {
  video.volume = e.target.value;
});

// Cambiar video y audio
envButtons.forEach(button => {
  button.addEventListener('click', () => {
    const videoSrc = button.getAttribute('data-video');
    const audioSrc = button.getAttribute('data-audio');

    video.src = `assets/videos/${videoSrc}`;
    const audio = new Audio(`assets/audios/${audioSrc}`);
    audio.play();
  });
});


