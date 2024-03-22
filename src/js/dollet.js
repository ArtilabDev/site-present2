document.addEventListener("DOMContentLoaded", () => {
  
  function dollet_PC() {
    if (document.getElementById('dollet-desk') !== null) {
      const player_path = document.getElementById('dollet-desk').dataset.path;
      document.getElementById('dollet-desk').style.opacity = '1';
      const dollet = lottie.loadAnimation({
        container: document.getElementById('dollet-desk'),
        renderer: 'svg',
        loop: false,
        autoplay: false,
        path: player_path,
        rendererSettings: {
          className: 'dollet-1', preserveAspectRatio: "xMidYMid slice",
        },
      });
      
      dollet.play();
      
      const player_path_second = document.getElementById('dollet-desk').dataset.pathSecond;
      const dollet_cycle = lottie.loadAnimation({
        container: document.getElementById('dollet-desk'),
        renderer: 'svg',
        loop: true,
        autoplay: false,
        rendererSettings: {
          className: 'dollet-2', preserveAspectRatio: "xMidYMid slice",
        },
        path: player_path_second,
      });
      
      let blockApex = document.querySelector('.apex');
      let header = document.querySelector('.header');
      
      dollet.addEventListener("enterFrame", function ( animation ) {
        if (document.querySelector('.loading-dollet') !== null) {
          document.querySelector('.loading-dollet').classList.add('loaded');
        }
        if (animation.currentTime >= (dollet.totalFrames - 80)) {
          blockApex.querySelector('.apex__wrap').style.opacity = '0';
        }
        if (animation.currentTime >= (dollet.totalFrames - 20)) {
          blockApex.classList.add('loaded');
          blockApex.querySelector('.apex__wrap').style.opacity = '1';
          blockApex.querySelector('.apex__wrap').style.zIndex = '2';
        }
        if (animation.currentTime >= (dollet.totalFrames - 1)) {
          header.style.top = '0';
          dollet.pause();
          dollet_cycle.play();
          dollet.renderer.svgElement.style.opacity = '0';
          dollet_cycle.renderer.svgElement.style.opacity = '1';
          document.body.style.overflow = 'auto';
        }
      });
    }
  }
  
  function dollet_MOB() {
    if (document.getElementById('dollet-mob') !== null) {
      const player_path = document.getElementById('dollet-mob').dataset.path;
      const dollet = lottie.loadAnimation({
        container: document.getElementById('dollet-mob'),
        renderer: 'svg',
        loop: false,
        autoplay: false,
        path: player_path,
        rendererSettings: {
          className: 'dollet-1-mob', preserveAspectRatio: "xMidYMid slice",
        },
      });
      
      dollet.play();
      
      let blockApex = document.querySelector('.apex');
      let header = document.querySelector('.header');
      header.style.top = '0';
      
      dollet.addEventListener("enterFrame", function ( animation ) {
        if (document.querySelector('.loading-dollet') !== null) {
          document.querySelector('.loading-dollet').classList.add('loaded');
        }
        if (animation.currentTime >= 3) {
          document.getElementById('dollet-mob').style.opacity = '1';
        }
        if (animation.currentTime >= (dollet.totalFrames - 80)) {
          blockApex.classList.add('loaded');
        }
        if (animation.currentTime >= (dollet.totalFrames - 1)) {
          dollet.pause();
          document.body.style.overflow = 'auto';
        }
      });
    }
  }
  
  function dollet_about() {
    const player_path = document.getElementById('about-dollet').dataset.path;
    const player = lottie.loadAnimation({
      container: document.getElementById('about-dollet'),
      renderer: 'svg',
      loop: true,
      autoplay: false,
      rendererSettings: {
        progressiveLoad: true, preserveAspectRatio: "xMidYMid slice",
      },
      path: player_path,
    });
    player.play();
  }
  
  let aboutBool = true;
  if (document.getElementById('about-dollet') !== null) {
    const checkAbout = () => {
      if (document.querySelector('.about').classList.contains('in-view') && aboutBool === true) {
        aboutBool = false;
        setTimeout(() => {
          dollet_about();
        }, 10);
      }
    }
    checkAbout();
    
    window.addEventListener("scroll", checkAbout);
  }
  
  function dollet_404() {
    if (document.getElementById('animated-404') !== null) {
      let player_1, player_2;
      const url_1 = document.getElementById('animated-404').dataset.path;
      player_1 = lottie.loadAnimation({
        container: document.getElementById('animated-404'),
        renderer: 'svg',
        loop: false,
        autoplay: false,
        rendererSettings: {
          className: 'lottie-1', progressiveLoad: true,
        },
        path: url_1,
      });
      
      const url_2 = document.getElementById('animated-404').dataset.pathSecond;
      player_2 = lottie.loadAnimation({
        container: document.getElementById('animated-404'),
        renderer: 'svg',
        loop: true,
        autoplay: false,
        rendererSettings: {
          className: 'lottie-2',
        },
        path: url_2,
      });
      
      setTimeout(() => {
        player_1.play();
      }, 700);
      
      player_1.addEventListener("enterFrame", function ( animation ) {
        if (animation.currentTime >= (player_1.totalFrames - 1)) {
          player_1.pause();
          player_1.renderer.svgElement.style.opacity = '0';
          player_2.play();
          player_2.renderer.svgElement.style.opacity = '1';
        }
      });
    }
  }
  
  if (document.querySelector('.loading-dollet') !== null) {
    document.querySelector('.loading-dollet').classList.add('play');
  }
  setTimeout(() => {
    if (window.innerWidth >= 1023) {
      dollet_PC();
    } else {
      dollet_MOB();
    }
  }, 3000);
  
  dollet_404();
});
