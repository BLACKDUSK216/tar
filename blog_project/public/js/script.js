function toggleVideo() {
    var video = document.getElementById("hero-video");
    var button = document.getElementById("toggle-video");
  
    if (video.paused) {
      video.play();
      button.innerHTML = '<span><i class="fa-solid fa-pause"></i></span>';
    } else {
      video.pause();
      button.innerHTML = '<span><i class="fa-solid fa-play"></i></span>';
    }
  }
  
  function toggleMusic() {
    var music = document.getElementById("background-music");
    var button = document.getElementById("toggle-music");
  
    if (music.paused) {
      music.play();
      button.innerHTML = '<span><i class="fa-solid fa-volume-high"></i></span>';
    } else {
      music.pause();
      button.innerHTML = '<span><i class="fa-solid fa-volume-xmark"></i></span>';
    }
  }
  
  window.addEventListener('scroll', function () {
    var header = document.querySelector('header');
    if (window.scrollY > 50) {
      header.classList.add('header-scrolled');
    } else {
      header.classList.remove('header-scrolled');
    }
  });
  