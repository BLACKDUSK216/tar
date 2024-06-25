window.addEventListener('scroll', function() {
    var scrollPosition = window.scrollY;
    var video = document.getElementById('hero-video');
    video.style.transform = 'translate3d(-50%, calc(-50% + ' + (scrollPosition * 0.3) + 'px), 0)';
});

document.addEventListener('DOMContentLoaded', function() {
    const airplane = document.getElementById('airplane');
    airplane.style.display = 'block';
    const newWidth = 75;
    const newHeight = 50;
    airplane.style.width = newWidth + 'px';
    airplane.style.height = newHeight + 'px';

    document.addEventListener('mousemove', function(event) {
        const x = event.pageX - newWidth / 2;
        const y = event.pageY - newHeight / 2;
        airplane.style.left = x + 'px';
        airplane.style.top = y + 'px';
    });


});

function toggleVideo() {
    var video = document.getElementById("hero-video");
    var videoIcon = document.getElementById("toggle-video").querySelector("i");
    if (video.paused) {
        video.play();
        videoIcon.classList.remove("fa-play");
        videoIcon.classList.add("fa-pause");
    } else {
        video.pause();
        videoIcon.classList.remove("fa-pause");
        videoIcon.classList.add("fa-play");
    }
}

function toggleMusic() {
    var audio = document.getElementById("background-music");
    var musicIcon = document.getElementById("toggle-music").querySelector("i");
    if (audio.paused) {
        audio.play();
        musicIcon.classList.remove("fa-volume-xmark");
        musicIcon.classList.add("fa-volume-high");
    } else {
        audio.pause();
        musicIcon.classList.remove("fa-volume-high");
        musicIcon.classList.add("fa-volume-xmark");
    }
}
window.addEventListener('scroll', function() {
    var navbar = document.querySelector('.navbar');
    var navLinks = document.querySelectorAll('.navbar-nav .nav-link');
    if(window.scrollY > 10) { 
        navbar.classList.add('navbar-white');
        navLinks.forEach(function(link) {
            link.style.color = 'black';
        });
    } else {
        navbar.classList.remove('navbar-white');
        navLinks.forEach(function(link) {
            link.style.color = '';
        });
    }
});
document.addEventListener('DOMContentLoaded', function() {
    const currentPath = window.location.pathname;
    const navLinks = document.querySelectorAll('.navbar-nav .nav-link');

    navLinks.forEach(link => {
        if (link.getAttribute('href') === currentPath) {
            link.classList.add('active-nav-link');
        }
    });
});
