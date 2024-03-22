document.addEventListener("DOMContentLoaded", () => {
  
  setTimeout(() => {
    document.querySelectorAll('.preload').forEach(( item ) => {
      item.classList.remove('preload');
    });
  }, 600);
  
  if (document.querySelectorAll('.networks-slider').length) {
    const networks = new Swiper('.networks-slider', {
      slidesPerView: "auto",
      loop: true,
      watchSlidesProgress: true,
      watchSlidesVisibility: true,
      allowTouchMove: false,
      speed: 5000,
      autoplay: {
        delay: 0, disableOnInteraction: false,
      },
    });
    networks.autoplay.stop();
    
    const regSlider = () => {
      const slider = document.querySelector('.networks-slider');
      const y = window.scrollY;
      
      if (y > slider.offsetTop - window.innerHeight) {
        networks.autoplay.start();
      }
      
    }
    regSlider();
    
    window.addEventListener('scroll', regSlider);
  }
  
  if (document.querySelectorAll('.partners-slider').length) {
    const partners = new Swiper('.partners-slider', {
      slidesPerView: "auto",
      spaceBetween: 24,
      loop: true,
      watchSlidesProgress: true,
      watchSlidesVisibility: true,
      allowTouchMove: false,
      speed: 7000,
      autoplay: {
        delay: 0,
        disableOnInteraction: false,
      },
    });
    partners.autoplay.stop();
    
    const regSlider = () => {
      const slider = document.querySelector('.networks-slider');
      const y = window.scrollY;
      
      if (y > slider.offsetTop - window.innerHeight) {
        partners.autoplay.start();
      }
      
    }
    regSlider();
    
    window.addEventListener('scroll', regSlider);
  }
  
  if (document.querySelectorAll('.trending-slider').length) {
    const trending = new Swiper('.trending-slider', {
      slidesPerView: "auto",
      loop: true,
      watchSlidesProgress: true,
      watchSlidesVisibility: true,
      updateOnWindowResize: true,
      centeredSlides: true,
      speed: 700,
      navigation: {
        nextEl: '.trending-next', prevEl: '.trending-prev',
      }, // autoplay: {
      //   delay: 4000,
      //   disableOnInteraction: false,
      //   pauseOnMouseEnter: true
      // },
      pagination: {
        el: ".swiper-pagination",
      },
    });
  }
  
  if (document.querySelectorAll('.quest-slider').length) {
    const quest = new Swiper('.quest-slider', {
      slidesPerView: "auto",
      spaceBetween: 24,
      loop: false,
      watchSlidesProgress: true,
      watchSlidesVisibility: true,
      updateOnWindowResize: true,
      speed: 700,
      navigation: {
        nextEl: '.trending-next', prevEl: '.trending-prev',
      },
      pagination: {
        el: ".swiper-pagination",
      },
    });
  }
  
  if (document.querySelectorAll('.participate-slider').length) {
    const participate = new Swiper('.participate-slider', {
      slidesPerView: "auto",
      loop: false,
      watchSlidesProgress: true,
      watchSlidesVisibility: true,
      updateOnWindowResize: true,
      speed: 700,
      on: {
        init: function ( swiper ) {
          sliderParticipate(swiper);
        }
      },
      navigation: {
        nextEl: '.trending-next', prevEl: '.trending-prev',
      },
      pagination: {
        el: ".swiper-pagination",
      },
    });
  }
  
  if (document.querySelectorAll('.benefit-slider').length) {
    // Function that actually builds the swiper
    const buildSwiperSlider = sliderElm => {
      const sliderIdentifier = sliderElm.dataset.id;
      return new Swiper(`#benefit-slider-${sliderIdentifier}`, {
        slidesPerView: "auto",
        spaceBetween: 44,
        loop: false,
        watchSlidesProgress: true,
        watchSlidesVisibility: true,
        updateOnWindowResize: true,
        speed: 700,
        navigation: {
          nextEl: `.benefit-next-${sliderIdentifier}`,
          prevEl: `.benefit-prev-${sliderIdentifier}`
        },
        pagination: {
          el: `.swiper-pagination-${sliderIdentifier}`,
          type: "fraction",
        },
      });
    }
    
    const allSliders = document.querySelectorAll('.benefit-slider');
    allSliders.forEach(slider => buildSwiperSlider(slider));
    
  }
  
  function sliderParticipate( swiper ) {
    let slideLength = swiper.wrapperEl.children.length;
    
    const getMaxHeightContent = () => {
      let contentHeight;
      let block_top = 0;
      let block_bot = 1;
      let content_top_height = [];
      let content_bot_height = [];
      
      for (let i = 0; i < slideLength; i++) {
        if (i === block_top) {
          contentHeight = swiper.wrapperEl.children[i].clientHeight;
          content_top_height.push(contentHeight);
          block_top += 2;
        }
        
        if (i === block_bot) {
          contentHeight = swiper.wrapperEl.children[i].clientHeight;
          content_bot_height.push(contentHeight);
          block_bot += 2;
        }
      }
      
      let maxTop = Math.max(...content_top_height);
      let maxBot = Math.max(...content_bot_height);
      
      return [maxTop, maxBot];
    }
    
    const setContentHeight = () => {
      let heightContentTop = getMaxHeightContent()[0] - 150;
      let heightContentBot = getMaxHeightContent()[1] - 174;
      let block_top = 0;
      let block_bot = 1;
      
      for (let i = 0; i < slideLength; i++) {
        if (i === block_top) {
          swiper.wrapperEl.children[i].querySelector('.participate-slide__content').style.height = heightContentTop + 'px';
          block_top += 2;
        }
        
        if (i === block_bot) {
          swiper.wrapperEl.children[i].querySelector('.participate-slide__content').style.height = heightContentBot + 'px';
          swiper.wrapperEl.children[i].querySelector('.participate-slide__icon').style.marginTop = (heightContentTop + 24) + 'px';
          block_bot += 2;
        }
        
      }
    }
    setContentHeight();
    
  }
  
  if (document.querySelectorAll('.article-swiper').length) {
    const article = new Swiper('.article-swiper', {
      slidesPerView: "auto",
      loop: false,
      spaceBetween: 24,
      watchSlidesProgress: true,
      watchSlidesVisibility: true,
      updateOnWindowResize: true,
      speed: 700, // autoplay: {
      //   delay: 4000,
      //   disableOnInteraction: false,
      //   pauseOnMouseEnter: true
      // },
    });
  }
  
  if (document.querySelectorAll('.team-slider').length) {
    const team = new Swiper('.team-slider', {
      slidesPerView: 'auto',
      spaceBetween: 44,
      loop: true,
      watchSlidesProgress: true,
      updateOnWindowResize: true,
      watchSlidesVisibility: true,
      keyboard: true,
      speed: 600,
      breakpoints: {
        320: {
          slidesPerView: "auto", spaceBetween: 24,
        }, 768: {
          slidesPerView: "auto", spaceBetween: 44,
        }
      },
      navigation: {
        nextEl: '.team-next', prevEl: '.team-prev',
      },
      pagination: {
        el: ".swiper-pagination", type: "fraction",
      },
    });
    
    const regSlider = () => {
      const slider = document.querySelector('.team-slider');
      const y = window.scrollY;
      
      if (slider.getBoundingClientRect().top - window.innerHeight < 0) {
        team.autoplay.start();
      }
      else {
        team.autoplay.stop();
      }
      
    }
    regSlider();
    
    window.addEventListener('scroll', regSlider);
  }
  
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function ( e ) {
      e.preventDefault();
      
      let hashVal = e.target.getAttribute('href');
      let currentSet = document.querySelector(hashVal).offsetTop - 120;
      window.scroll({
        top: currentSet, left: 0, behavior: 'smooth'
      });
    });
  });
  
  function checkCheckbox() {
    const checkbox = document.querySelectorAll('.d-checkbox');
    let status;
    checkbox.forEach(item => {
      item.addEventListener('click', e => {
        status = e.currentTarget.querySelector('input').checked;
        if (status) {
          e.currentTarget.querySelector('.d-checkbox_check').removeAttribute('style');
        }
      })
    })
  }
  checkCheckbox();
  
  class getVideoBgColor {
    constructor() {
      this.videoTag = document.getElementById('about-dollet');
      this.videoWrap = document.querySelector('.about__wrap');
      this.getColor(this.videoTag, this.videoWrap);
    }
    
    getColor( tag, wrap ) {
      const videoBgColor = ( vid, backgroundElement ) => {
        const ratio = window.devicePixelRatio || 1;
        const canvas = document.createElement("canvas");
        const videoWidth = 100;
        const videoHeight = 100;
        canvas.width = videoWidth*ratio;
        canvas.height = videoHeight*ratio;
        canvas.style.width = `${videoWidth}px`;
        canvas.style.height = `${videoHeight}px`;
        const ctx = canvas.getContext("2d");
        ctx.scale(ratio, ratio);
        ctx.drawImage(vid, 0, 0, canvas.width, canvas.height);
        const p = ctx.getImageData(0, 0, 100, 100).data;
        const colorBoost = 0;
        const colorR = p[0] + colorBoost;
        const colorG = p[1] + colorBoost;
        const colorB = p[2] + colorBoost;
        
        backgroundElement.style.backgroundColor = "rgb(" + colorR + "," + colorG + "," + colorB + ")";
      }
      
      if (tag !== null) {
        tag.addEventListener("play", function () {
          videoBgColor(tag, wrap);
        });
      }
    }
  }
  
  if (document.querySelectorAll('.feature-content-slider').length) {
    let sliderContent = new Swiper('.feature-content-slider', {
      slidesPerView: 1,
      loop: false,
      allowTouchMove: false,
      effect: 'fade',
      speed: 400,
      autoHeight: true
    });
    
    class tabsFeature {
      constructor() {
        this.tabMenu = document.querySelectorAll('.feature__tabs-menu_item');
        this.tabIcon = document.querySelectorAll('.feature-icon');
        this.intiWidth();
        this.changeTab();
        this.changeWidthOnResize();
      }
      
      intiWidth() {
        if (document.querySelectorAll('.feature__tabs-menu_item').length) {
          setTimeout(() => {
            let firstMenuItemWidth = document.querySelector('.feature__tabs-menu_item').offsetWidth;
            document.querySelector('.glider').style.width = firstMenuItemWidth + 'px';
          }, 100);
        }
      }
      
      changeTab() {
        this.tabMenu.forEach(( item ) => {
          item.addEventListener('click', ( e ) => {
            e.preventDefault();
            let width = e.target.offsetWidth;
            
            this.tabMenu.forEach(( allBTN ) => {
              allBTN.classList.remove('active');
            });
            this.tabIcon.forEach(( allIcons ) => {
              allIcons.classList.remove('active');
            });
            
            e.target.classList.add('active');
            document.querySelector('.glider').style.width = width + 'px';
            document.querySelector('.glider').style.left = e.target.offsetLeft + 'px';
            
            const index = item.dataset.index;
            document.querySelector(`.feature-icon[data-index="${index}"]`).classList.add('active');
            sliderContent.slideTo(index - 1);
          })
        })
      }
      
      changeWidthOnResize() {
        const resizeGlider = () => {
          let menuItemWidth = document.querySelector('.feature__tabs-menu_item.active');
          setTimeout(() => {
            document.querySelector('.glider').style.width = menuItemWidth.offsetWidth + 'px';
            document.querySelector('.glider').style.left = menuItemWidth.offsetLeft + 'px';
          }, 500);
        }
        
        if (this.tabMenu.length) {
          window.addEventListener('resize', resizeGlider);
        }
      }
    }
    
    new tabsFeature();
  }
  
  class burgerMenu {
    constructor() {
      this.burger = document.querySelector('.burger-menu');
      this.header = document.querySelector('.header');
      this.init();
    }
    
    init() {
      this.burger.addEventListener('click', ( e ) => {
        e.target.classList.toggle('active');
        this.header.classList.toggle('open');
        document.body.classList.toggle('hidden');
      })
    }
  }
  
  class animatedBlock {
    constructor() {
      this.trigger = document.querySelectorAll('.animated');
      this.init();
    }
    
    init() {
      const scrollWindow = ( e ) => {
        this.scroll = window.scrollY;
        
        let totalOffsetY = [];
        this.trigger.forEach(( block, i ) => {
          totalOffsetY.push(block.offsetTop - window.innerHeight);
          
          if (this.scroll > totalOffsetY[i]) {
            block.classList.add('in-view');
          }
          else {
            block.classList.remove('in-view');
          }
        })
      }
      scrollWindow();
      
      window.addEventListener("scroll", scrollWindow);
    }
    
    getAbsoluteHeight( el ) {
      el = (typeof el === 'string') ? document.querySelector(el) : el;
      
      const styles = window.getComputedStyle(el);
      const margin = parseFloat(styles['marginTop']) + parseFloat(styles['marginBottom']);
      
      return Math.ceil(el.offsetHeight + margin);
    }
    
  }
  
  class videoPlayer {
    constructor() {
      this.videoYoutube = document.querySelectorAll(".video-youtube");
      this.videoVimeo = document.querySelectorAll(".video-vimeo");
      this.youtube();
      this.vimeo();
    }
    
    youtube() {
      this.videoYoutube.forEach(( thumb ) => {
        thumb.addEventListener("click", function ( e ) {
          this.videoSrc = thumb.getAttribute("data-video-src");
          this.videoUrl = `https://www.youtube.com/embed/${this.videoSrc}?rel=0&amp;autoplay=1`;
          thumb.closest('.video-block').classList.add('load-iframe');
          
          thumb.closest('.video-block').innerHTML = `
               <iframe src="${this.videoUrl}"
               frameborder="0"
               class="video-iframe"
               allow="autoplay; accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
               allowfullscreen></iframe>
          `
          thumb.style.display = "none";
          
          e.preventDefault();
        });
      })
    }
    
    vimeo() {
      this.videoVimeo.forEach(( thumb ) => {
        thumb.addEventListener("click", function ( e ) {
          this.videoSrc = thumb.getAttribute("data-video-src");
          this.videoUrl = `https://player.vimeo.com/video/${this.videoSrc}?autoplay=1`;
          thumb.closest('.video-block').classList.add('load-iframe');
          thumb.closest('.video-block').innerHTML = `<iframe src="${this.videoUrl}" class="video-iframe" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>`
          thumb.style.display = "none";
          thumb.querySelector('.video-iframe').play();
          e.preventDefault();
        });
      })
    }
    
  }
  
  class spoiler {
    constructor() {
      this.spoilerHead = document.querySelectorAll('.spoiler__head');
      this.resize();
      this.heightSpoiler();
      this.init();
    }
    
    init() {
      this.spoilerHead.forEach(( item ) => {
        item.addEventListener('click', () => {
          item.parentElement.dataset.status = item.parentElement.dataset.status === 'open' ? 'closed' : 'open';
          this.heightSpoiler();
          
          setTimeout(() => {
            new scrollToBlock().initScrollBlock();
          }, 600);
        })
      })
    }
    
    heightSpoiler() {
      this.spoilerHead.forEach(( e ) => {
        const status = e.parentElement.dataset.status;
        const head = e.clientHeight;
        const content = e.nextElementSibling.clientHeight;
        
        if (status === 'open') {
          e.parentElement.style.height = (head + content) + 'px';
        }
        if (status === 'closed') {
          e.parentElement.style.height = head + 'px';
        }
      })
    }
    
    resize() {
      window.addEventListener('resize', () => {
        this.heightSpoiler();
      });
    }
  }
  
  class modal {
    constructor() {
      this.btnModal = document.querySelectorAll('.btn-modal');
      this.btnClose = document.querySelectorAll('.modal-close');
      this.terms = document.querySelector('.confirm-terms');
      this.openModal(this.btnModal);
      this.closeModal(this.btnClose);
      this.confirmTerms(this.terms);
    }
    
    openModal( item ) {
      item.forEach(( button ) => {
        button.addEventListener('click', ( e ) => {
          const target = e.target.dataset.target;
          document.querySelector('#' + target).classList.add('active');
          document.body.classList.add('open-modal');
        });
      });
    }
    
    closeModal( item ) {
      item.forEach(( button ) => {
        button.addEventListener('click', ( e ) => {
          e.target.closest('.modal, .feedback-panel_modal').classList.remove('active');
          document.body.classList.remove('open-modal');
        });
      });
    }
    
    confirmTerms( item ) {
      if (item !== null) {
        // item.closest('.modal__inner').querySelector('.modal-content').addEventListener('scroll', (e) => {
        //   if (e.target.scrollTop >= (e.target.scrollHeight - e.target.clientHeight - 20)) {
        //     e.target.closest('.modal__inner').querySelector('button').removeAttribute('disabled');
        //   } else {
        //     e.target.closest('.modal__inner').querySelector('button').setAttribute('disabled', 'disabled');
        //   }
        // })
        
        let status;
        item.addEventListener('click', ( e ) => {
          
          setTimeout(() => {
            status = e.target.closest('.modal-confirm').querySelector('input').checked;
            if (!status) {
              e.stopPropagation();
              e.target.closest('.modal-confirm').querySelector('.d-checkbox_check').style.borderColor = 'red';
            }
            else {
              e.target.closest('.modal').classList.remove('active');
              document.body.classList.remove('open-modal');
            }
          }, 100);
        });
        
      }
    }
  }
  
  class select {
    constructor() {
      this.select = document.querySelectorAll('.converted-select');
      this.init();
      this.toggleSelect();
      this.changeOption();
      this.closeSelectOutside();
    }
    
    init() {
      this.select.forEach(( item ) => {
        this.item = item;
        item.style.display = 'none';
        this.selectIndex = item.dataset.index;
        
        const wrapper = document.createElement("div");
        const selectName = document.createElement("div");
        let optionsWrap = document.createElement("div");
        const selectOptions = document.createElement("div");
        
        wrapper.setAttribute("class", "select " + this.selectIndex);
        
        selectName.setAttribute("class", "select-name sticky-cursor sticky-dot");
        selectName.setAttribute("id", this.selectIndex);
        selectName.append(item.options[item.selectedIndex].innerText);
        item.before(wrapper);
        
        const selectBlock = document.querySelector("." + this.selectIndex);
        optionsWrap.setAttribute('class', 'select-options-wrap ' + this.selectIndex + '-options');
        selectBlock.append(selectName);
        selectOptions.setAttribute('class', 'select-options');
        selectOptions.append(optionsWrap);
        selectBlock.append(selectOptions);
        
        const select_options = document.querySelector("." + this.selectIndex + "-options");
        const options = item.options;
        
        for (let i = 0; i < options.length; i++) {
          const option = document.createElement("div");
          const imgSRC = options[i].dataset.img;
          
          if (imgSRC !== undefined) {
            const img = document.createElement("img");
            img.setAttribute('src', imgSRC);
            option.append(img);
          }
          
          option.setAttribute('data-value', options[i].value);
          option.setAttribute('class', 'select-item sticky-cursor sticky-dot');
          option.append(options[i].innerText);
          select_options.append(option);
        }
        
        if (item.classList.contains('select-search')) {
          const selectSearch = document.createElement('div');
          const selectInput = document.createElement('input');
          
          selectSearch.setAttribute('class', 'select-search');
          selectInput.setAttribute('type', 'search');
          selectInput.setAttribute('placeholder', 'Find');
          selectInput.setAttribute('class', 'search-input');
          
          selectSearch.appendChild(selectInput);
          selectOptions.prepend(selectSearch);
          
          const searchInput = document.querySelectorAll('.search-input');
          searchInput.forEach(input => {
            this.search(input);
          })
        }
      });
    }
    
    search( input ) {
      input.addEventListener('input', e => {
        const currentValue = e.currentTarget.value;
        const items = e.currentTarget.closest('.select-options').querySelectorAll('.select-item');
        
        items.forEach(item => {
          const text = item.textContent;
          item.classList.add('hidden');
          
          if (text.toLowerCase().includes(currentValue.toLowerCase()) && currentValue.trim().length !== 0) {
            item.classList.add('found');
            item.classList.remove('hidden');
          }
          else {
            item.classList.remove('found');
          }
          
          if (currentValue.trim().length === 0) {
            item.classList.remove('found');
            item.classList.remove('hidden');
          }
        })
      })
    }
    
    toggleSelect() {
      const input = document.querySelectorAll('.select-name');
      input.forEach(( input ) => {
        input.addEventListener('click', () => {
          input.closest('.select').classList.toggle('open');
        });
      });
    }
    
    closeSelectOutside() {
      const select = document.querySelectorAll('.select');
      window.addEventListener('click', function ( e ) {
        select.forEach(( input ) => {
          if (!input.contains(e.target)) {
            input.classList.remove('open');
          }
        });
      });
    }
    
    changeOption() {
      const options = document.querySelectorAll('.select-options .select-item');
      
      options.forEach(( item ) => {
        let randomID = Math.floor(Math.random()*1000000);
        item.closest('.select-options').setAttribute('data-index', randomID.toString());
        
        item.addEventListener('click', ( e ) => {
          const target = e.currentTarget;
          const content = target.innerHTML;
          const text = target.textContent;
          item.closest('.select').classList.remove('open');
          
          const id = target.closest('.select-options').dataset.index;
          const currentBlock = document.querySelectorAll("[data-index='" + id + "'] div");
          removeActive(currentBlock);
          target.classList.add('active');
          
          target.closest('.select-options').previousElementSibling.innerHTML = '';
          target.closest('.select-options').previousElementSibling.innerHTML = content;
          target.closest('.select-options').previousElementSibling.classList.add('selected');
          
          if (item.closest('.select-options').querySelector('.select-search') !== null) {
            item.closest('.select-options').querySelector('.search-input').value = '';
          }
          
          item.closest('.select').nextElementSibling.querySelectorAll('option').forEach(option => {
            option.removeAttribute('selected');
            if (option.value === text) {
              option.setAttribute('selected', 'selected');
            }
          })
        });
      });
      
      const removeActive = ( option ) => {
        option.forEach(( item ) => {
          item.classList.remove('active');
          
          if (item.classList.contains('found')) {
            item.classList.remove('found')
          }
          
          if (item.classList.contains('hidden')) {
            item.classList.remove('hidden')
          }
        })
      }
    }
  }
  
  class scrollToBlock {
    constructor() {
      this.button = document.querySelectorAll('[data-scroll-item]');
      this.block = document.querySelector('[data-scroll-block]');
      this.content = document.querySelector('[data-scroll-content]');
      this.body = document.querySelector('[data-scroll-body]');
      this.anchor = document.querySelectorAll('[data-scroll-anchor]');
      this.initScrollBlock();
      this.onTimeOut();
      this.resize();
      this.clickToScroll();
      this.changeClass();
    }
    
    onTimeOut() {
      setTimeout(() => {
        this.initScrollBlock();
      }, 300);
    }
    
    initScrollBlock() {
      if (this.body !== null) {
        let sBodyTop = this.body.offsetTop;
        let sBodyPTop = parseFloat(window.getComputedStyle(this.body).paddingTop);
        let sBlockHeight = this.block.offsetHeight;
        let sContentHeight = this.content.offsetHeight;
        let contentMB = parseFloat(window.getComputedStyle(this.content).marginBottom);
        
        this.fixedBlock(sBodyTop, sBodyPTop, contentMB, sContentHeight, sBlockHeight);
      }
    }
    
    clickToScroll() {
      this.button.forEach(( item ) => {
        if (item.dataset.scrollItem === '1') {
          item.classList.add('touch');
        }
        
        item.addEventListener('click', ( e ) => {
          const indexButton = item.dataset.scrollItem;
          const content = document.querySelector('[data-scroll-anchor="' + indexButton + '"]');
          const positionY = content.getBoundingClientRect().top + window.scrollY - 120;
          const target = e.currentTarget;
          
          const scrollToSmoothly = ( pos, time ) => {
            let currentPos = window.scrollY;
            let start = null;
            if (time === null) time = 500;
            pos = +pos;
            time = +time;
            window.requestAnimationFrame(function step( currentTime ) {
              start = !start ? currentTime : start;
              let progress = currentTime - start;
              if (currentPos < pos) {
                window.scrollTo(0, ((pos - currentPos)*progress/time) + currentPos);
              }
              else {
                window.scrollTo(0, currentPos - ((currentPos - pos)*progress/time));
              }
              if (progress < time) {
                window.requestAnimationFrame(step);
              }
              else {
                window.scrollTo(0, pos);
              }
            });
          }
          
          scrollToSmoothly(positionY, 400);
          
          setTimeout(() => {
            this.button.forEach(( li ) => {
              li.classList.remove('active');
              li.classList.remove('touch');
            });
            target.classList.add('active');
            target.classList.add('touch');
          }, 500);
          
        });
      });
      
    }
    
    changeClass() {
      if (this.body !== null) {
        let bodyTop = this.body.offsetTop;
        let blockID;
        
        const removeClass = () => {
          this.button.forEach(( li ) => {
            li.classList.remove('active');
          })
        }
        
        const positionAnchor = () => {
          let scrollY = window.scrollY;
          this.anchor.forEach(( block ) => {
            let blockOffsetTop = block.offsetTop + bodyTop - 120;
            if (scrollY > blockOffsetTop) {
              blockID = block.dataset.scrollAnchor;
              removeClass();
              document.querySelector('[data-scroll-item="' + blockID + '"]').classList.add('active');
            }
          });
        }
        
        document.addEventListener('scroll', positionAnchor);
      }
    }
    
    fixedBlock( sBodyTop, sBodyPTop, contentMB, sContentHeight, sBlockHeight ) {
      const positionBlock = () => {
        let scrollY = window.scrollY;
        
        if (scrollY > sBodyTop + sBodyPTop - contentMB && scrollY < sBodyTop + sBodyPTop + sContentHeight - sBlockHeight - contentMB) {
          this.block.classList.add('fixed');
        }
        else {
          this.block.classList.remove('fixed');
        }
        
        if (scrollY > sBodyTop + sBodyPTop + sContentHeight - sBlockHeight - contentMB) {
          this.block.classList.add('fixed-bottom');
        }
        else {
          this.block.classList.remove('fixed-bottom');
        }
      }
      
      document.addEventListener('scroll', positionBlock)
    }
    
    resize() {
      window.addEventListener('resize', () => {
        this.initScrollBlock();
      });
    }
  }
  
  class hideIconsDefi {
    constructor() {
      this.logo = document.querySelectorAll('.block-name_logo');
      this.icons();
    }
    
    icons() {
      this.logo.forEach(( logo ) => {
        this.iconsLength(logo.children);
        const span = document.createElement('span');
        span.setAttribute('class', 'icon-plus');
        
        if (logo.children.length > 2) {
          logo.append(span);
        }
      });
    }
    
    iconsLength( items ) {
      for (let i = 0; i < items.length; i++) {
        if (i > 1) {
          items[i].style.display = 'none';
        }
      }
    }
    
    showIcons() {
    
    }
  }
  
  class hideInfoBlocks {
    constructor() {
      this.section = document.querySelectorAll('.info');
      this.hideBlock();
    }
    
    hideBlock() {
      this.section.forEach(( info ) => {
        let items = info.querySelectorAll('.info__block');
        const buttonMore = info.querySelector('.show-more-info');
        let text = buttonMore.dataset.text;
        
        for (let i = 0; i < items.length; i++) {
          if (i > 2) {
            items[i].classList.add('hidden');
          }
        }
        
        if (items.length > 3) {
          buttonMore.append(text);
        }
        
        // remove hidden class
        buttonMore.addEventListener('click', ( e ) => {
          info.querySelectorAll('.hidden').forEach(( item ) => {
            item.classList.remove('hidden');
            e.currentTarget.style.display = "none";
          })
        })
      });
    }
  }
  
  class search {
    constructor() {
      this.input = document.querySelector('.faq-search input');
      this.spoiler = document.querySelectorAll('.spoiler__head');
      this.result = document.querySelector('.faq-search_result-wrap');
      this.searchWord();
      this.closeSelectOutside();
    }
    
    searchWord() {
      if (this.input !== null) {
        this.input.addEventListener('input', ( e ) => {
          let type = e.target.value;
          let arr = [];
          
          let close = document.createElement('span');
          close.setAttribute('class', 'close-search');
          if (e.currentTarget.value.length !== 0) {
            if (document.querySelector('.close-search') !== null) {
              document.querySelector('.close-search').remove();
            }
            e.target.closest('.faq-search').append(close);
            e.target.closest('.faq-search').classList.add('active');
          }
          else {
            e.target.closest('.faq-search').classList.remove('active');
            document.querySelector('.close-search').remove();
          }
          
          if (document.querySelector('.close-search') !== null) {
            document.querySelector('.close-search').addEventListener('click', e => {
              e.target.closest('.faq-search').classList.remove('active');
              e.target.closest('.faq-search').querySelector('input').value = '';
              e.target.remove();
            });
          }
          
          this.spoiler.forEach(( item, i ) => {
            let text = item.innerText || '';
            
            if (text.toLowerCase().includes(type.toLowerCase()) && type.length !== 0) {
              let regex = new RegExp(type, "gi");
              item.innerHTML = text.replace(regex, `<span class="highlighted">$&</span>`);
              item.setAttribute('data-set', i);
              arr.push({
                text: text.replace(regex, `<span class="highlighted">$&</span>`), index: i
              });
            }
            else {
              item.innerHTML = text;
            }
          });
          
          this.result.innerHTML = '';
          arr.map(( item ) => {
            return this.result.innerHTML += "<div class='faq-item' data-set=" + item.index + ">" + item.text + "</div>";
          });
          
          if (document.querySelectorAll('.faq-item').length > 0) {
            document.querySelector('.no-result-faq') !== null ? document.querySelector('.no-result-faq').remove() : '';
          }
          else {
            this.result.innerHTML = "<div class='no-result-faq'> No results found! </div>";
          }
          
          document.querySelectorAll('.faq-item').forEach(( item ) => {
            item.addEventListener('click', ( e ) => {
              let index = e.currentTarget.dataset.set;
              const content = document.querySelector('.spoiler__head[data-set="' + index + '"]');
              const positionY = content.getBoundingClientRect().top + window.scrollY - 90;
              item.closest('.faq-search').classList.remove('active');
              
              const scrollToSmoothly = ( pos, time ) => {
                let currentPos = window.scrollY;
                let start = null;
                if (time === null) time = 500;
                pos = +pos;
                time = +time;
                window.requestAnimationFrame(function step( currentTime ) {
                  start = !start ? currentTime : start;
                  let progress = currentTime - start;
                  if (currentPos < pos) {
                    window.scrollTo(0, ((pos - currentPos)*progress/time) + currentPos);
                  }
                  else {
                    window.scrollTo(0, currentPos - ((currentPos - pos)*progress/time));
                  }
                  if (progress < time) {
                    window.requestAnimationFrame(step);
                  }
                  else {
                    window.scrollTo(0, pos);
                  }
                });
              }
              
              scrollToSmoothly(positionY, 400);
            });
          });
          
        });
      }
    }
    
    closeSelectOutside() {
      const select = document.querySelectorAll('.faq-search');
      window.addEventListener('click', function ( e ) {
        select.forEach(( input ) => {
          if (!input.contains(e.target)) {
            input.classList.remove('active');
          }
        });
      });
    }
    
  }
  
  new search();
  
  function closeResultSearchOnClick() {
    if (document.querySelector('.question__search') !== null) {
      document.querySelector('.question__search .close-search').addEventListener('click', e => {
        e.target.closest('.question__search').classList.remove('active');
        e.target.closest('.question__search').querySelector('input').value = '';
      });
    }
  }
  closeResultSearchOnClick();
  
  function closeResultSearchOutside() {
    const select = document.querySelectorAll('.question__search');
    window.addEventListener('click', function ( e ) {
      select.forEach(( input ) => {
        if (!input.contains(e.target)) {
          input.classList.remove('active');
        }
      });
    });
  }
  closeResultSearchOutside();
  
  // init functions
  new animatedBlock();
  new videoPlayer();
  new burgerMenu();
  new spoiler();
  new modal();
  new select();
  new scrollToBlock();
  new hideIconsDefi();
  new hideInfoBlocks();
  
  function linksInBlog() {
    if (document.querySelectorAll('.sArticle__content a').length) {
      let links = document.querySelectorAll('.sArticle__content a');
      links.forEach(item => {
        item.setAttribute('class', 'sticky-cursor sticky-dot');
      });
    }
  }
  linksInBlog();
  
  let observer = new MutationObserver(function ( mutations ) {
    mutations.forEach(function ( mutation ) {
      if (mutation.target.className === 'sBlog__articles-wrap') {
        new scrollToBlock();
      }
      if (mutation.target.className === 'defi__content') {
        new hideIconsDefi();
      }
    });
  });
  
  observer.observe(document.documentElement, {
    attributes: true, childList: true, subtree: true
  });
  
  let linkPage = window.location.href;
  if (linkPage.indexOf('#search-') > -1) {
    const parts = linkPage.split('/');
    let lastSegment = parts.pop() || parts.pop();
    let getID = lastSegment.slice(1);
    
    let blockID = document.querySelector(lastSegment);
    blockID.style.color = '#6dffd5';
    setTimeout(() => {
      let contentBody = document.querySelector('.faq__body').offsetTop;
      let contentFaq = document.querySelector('.faq-content').offsetTop;
      let currentSet = document.getElementById(getID).offsetTop - 90 + contentFaq + contentBody;
      
      window.scroll({
        top: currentSet, left: 0, behavior: 'smooth'
      });
    }, 200);
    
    setTimeout(() => {
      blockID.removeAttribute('style');
    }, 3000);
  }
  
  if (document.querySelector('.ref-banner button') !== null) {
    const refButton = document.querySelector('.ref-banner button');
    refButton.addEventListener('click', () => {
      let target = document.querySelector('#crypto-bloom');
      window.scrollTo({
        top: target.getBoundingClientRect().top + window.scrollY - 90,
        behavior: "smooth",
      });
    });
  }
  
  let articleTable = document.querySelectorAll('.sArticle__content table');
  if (articleTable.length > 0) {
    articleTable.forEach(item => {
      let wrap = document.createElement('div');
      wrap.setAttribute('class', 'sArticle__content-table');
      
      item.parentNode.insertBefore(wrap, item);
      wrap.appendChild(item);
    })
  }
  
  function addImageInForm() {
    let imageInputs = document.querySelectorAll('.image-input');
    let previewImages = document.querySelectorAll('.preview-image');
    
    const clearErrors = () => {
      const inputsFile = document.querySelectorAll('.inputs-file label');
      inputsFile.forEach(item => {
        if (item.classList.contains('error')) {
          item.classList.remove('error');
          item.querySelector('.error-message').remove();
        }
      });
    }
    
    imageInputs.forEach(function ( input, index ) {
      let btnRemoveImage = document.createElement('span');
      btnRemoveImage.setAttribute('class', 'remove-image sticky-cursor');
      if (input.closest('.input-file') !== null) {
        input.closest('.input-file').appendChild(btnRemoveImage);
      }
      
      input.addEventListener('change', function () {
        previewImage(input, previewImages[index]);
        toggleActiveClass(input);
        
        let checkImage;
        let timeUpload = 0;
        let alertTimer;
        let acceptedImg = input.getAttribute('accept');
        let typeImg = input.files[0].type.slice(6);
        
        input.closest('label').classList.add('loading');
        if (input.closest('label').classList.contains('loaded')) {
          input.closest('label').classList.remove('loaded');
        }
        if (input.closest('label').classList.contains('error')) {
          input.closest('label').classList.remove('error');
        }
        if (input.parentNode.querySelector('.error-message') !== null) {
          input.parentNode.querySelector('.error-message').remove();
        }
        
        let errorMessage = document.createElement('div');
        errorMessage.setAttribute('class', 'error-message');
        
        clearTimeout(alertTimer);
        
        checkImage = setInterval(() => {
          timeUpload++;
          let src = previewImages[index].getAttribute("src").trim();
          
          if (src !== '' && timeUpload > 80) {
            clearInterval(checkImage);
            input.closest('label').classList.remove('loading');
            clearErrors();
            
            if (!acceptedImg.toLowerCase().includes(typeImg.toLowerCase())) {
              previewImages[index].scr = '';
              input.value = '';
              errorMessage.append(`Only ${acceptedImg.replace(/,/g, ', ')} formats`);
              input.parentNode.appendChild(errorMessage);
              input.closest('label').classList.add('error');
              
              if (input.closest('.input-file').classList.contains('with-file')) {
                input.closest('.input-file').classList.remove('with-file');
              }
              
              alertTimer = setTimeout(() => {
                if (input.parentNode.querySelector('.error-message') !== null) {
                  input.parentNode.querySelector('.error-message').remove();
                  input.closest('label').classList.remove('error');
                }
              }, 8000);
              return;
            }
            
            if (input.files[0].size > 5120000) {
              input.value = '';
              previewImages[index].scr = '';
              errorMessage.append('File max size 5Mb!');
              input.parentNode.appendChild(errorMessage);
              input.closest('label').classList.add('error');
              
              if (input.closest('.input-file').classList.contains('with-file')) {
                input.closest('.input-file').classList.remove('with-file');
              }
              
              alertTimer = setTimeout(() => {
                if (input.parentNode.querySelector('.error-message')) {
                  input.parentNode.querySelector('.error-message').remove();
                  input.closest('label').classList.remove('error');
                }
              }, 6000);
              return;
            }
            
            input.closest('.input-file').classList.add('with-file');
            input.closest('label').classList.add('loaded');
          }
          
          if (timeUpload === 1000) {
            clearInterval(checkImage);
          }
        }, 10)
      });
    });
    
    const removeImage = () => {
      const btnRemoveImage = document.querySelectorAll('.remove-image');
      btnRemoveImage.forEach(btn => {
        btn.addEventListener('click', e => {
          btn.closest('.input-file').querySelector('input').value = '';
          btn.closest('.input-file').querySelector('label').classList.remove('loaded');
          btn.closest('.input-file').classList.remove('with-file');
          setTimeout(() => {
            btn.closest('.input-file').querySelector('.preview-image').src = '';
          }, 500)
        });
      });
    }
    
    const previewImage = ( input, previewImage ) => {
      let reader = new FileReader();
      reader.onload = function ( e ) {
        previewImage.src = e.target.result;
      }
      reader.readAsDataURL(input.files[0]);
    }
    
    const toggleActiveClass = ( input ) => {
      let label = input.closest('label');
      if (input.files.length > 0) {
        label.classList.add('active');
      }
      else {
        label.classList.remove('active');
      }
    }
    
    removeImage();
  }
  addImageInForm();
  
  function feedbackForm() {
    
    const removeActiveButton = ( buttons ) => {
      buttons.forEach(item => {
        item.classList.remove('active');
      })
    }
    
    const openPanelWithForm = () => {
      const feedbackPanel_btn = document.querySelector('.feedback-panel_btn--main');
      if (feedbackPanel_btn !== null) {
        feedbackPanel_btn.addEventListener('click', function () {
          this.classList.toggle('active');
          this.closest('.feedback-panel').classList.toggle('open');
          document.querySelectorAll('.feedback-panel_modal').forEach(function ( element ) {
            element.classList.remove('active');
          });
        });
      }
    }
    
    const openFeedbackForm = () => {
      const modalButtons = document.querySelectorAll('.btn--modal');
      modalButtons.forEach(button => {
        button.addEventListener('click', function ( event ) {
          const target = button.dataset.target;
          const modal = document.querySelector('#' + target);
          document.querySelector('#modal-feedback-success .title').innerHTML = button.dataset.type;
          if (modal && !modal.classList.contains('active')) {
            modal.classList.add('active');
          }
        });
      });
    }
    
    const switchFeedbackForm = () => {
      const buttons = document.querySelectorAll('.issue-btn');
      if (buttons.length > 0) {
        window.scroll({
          top: 0, behavior: 'smooth'
        });
        
        buttons.forEach(button => {
          button.addEventListener('click', () => {
            removeActiveButton(buttons);
            closeAllForms();
            button.classList.add('active');
            
            const form = button.dataset.target.toString();
            document.getElementById(form).style.display = 'block';
            
            const successTitle = button.dataset.title;
            document.getElementById('form-feedback-success').querySelector('.title').innerHTML = successTitle;
            
            const height = document.querySelector('.issue__forms').getBoundingClientRect().height;
            const offset = document.querySelector('.issue__forms').getBoundingClientRect().top + window.scrollY;
            
            window.scroll({
              top: offset - 110,
              behavior: "smooth",
            });
          });
        });
      }
      
      const closeAllForms = () => {
        const forms = document.querySelectorAll('.feedback-panel_form');
        forms.forEach(form => {
          form.style.display = "none";
        })
      }
    }
    
    const closeFormOnClickOutside = () => {
      const feedbackPanel = document.querySelector('.feedback-panel');
      document.addEventListener('click', ( e ) => {
        const withinBoundaries = e.composedPath().includes(feedbackPanel);
        if (!withinBoundaries) {
          feedbackPanel.classList.remove('open');
          document.querySelector('.feedback-panel_btn--main').classList.remove('active');
          document.querySelectorAll('.feedback-panel_modal').forEach(function ( element ) {
            element.classList.remove('active');
          });
        }
      });
    }
    
    const disabledBtn = buttons => {
      buttons.forEach(button => {
        if (!button.classList.contains('active')) {
          button.setAttribute('disabled', 'disabled');
        }
      });
    }
    
    const unDisabledBtn = buttons => {
      buttons.forEach(button => {
        button.removeAttribute('disabled');
      });
    }
    
    const validateForm = () => {
      const forms = document.querySelectorAll('.wpcf7-form');
      forms.forEach(form => {
        form.querySelectorAll('input').forEach(input => {
          input.addEventListener('input', e => {
            if (e.target.value.trim() === '' && input.getAttribute('aria-required') === 'true')
              e.target.value = '';
          })
        });
        
        form.addEventListener('submit', e => {
          e.preventDefault();
          form.querySelector('[type=submit]').classList.add('sending');
          
          const buttons = document.querySelectorAll('.issue-btn');
          let files = document.querySelectorAll('.inputs-file label');
          let statusForm;
          let sendTimeForm = 0;
          
          if (buttons.length > 0) {
            disabledBtn(buttons);
          }
          
          statusForm = setInterval(() => {
            sendTimeForm++;
            const status = form.dataset.status
            
            if (status === 'invalid') {
              if (buttons.length > 0) {
                unDisabledBtn(buttons);
              }
              clearInterval(statusForm);
              form.querySelector('[type=submit]').classList.remove('sending');
            }
            
            if (status === 'sent') {
              clearInterval(statusForm);
              if (buttons.length > 0) {
                unDisabledBtn(buttons);
              }
              form.querySelector('[type=submit]').classList.remove('sending');
              
              if (form.closest('.feedback-panel') !== null) {
                form.closest('.feedback-panel').classList.remove('open');
                form.closest('.feedback-panel_modal').classList.remove('active');
                document.querySelector('.feedback-panel_btn--main').classList.remove('active');
              }
              
              if (form.closest('.feedback-panel_form') !== null) {
                form.closest('.feedback-panel_form').style.display = 'none';
                document.querySelector('.issue__head').style.display = "none";
                document.getElementById('form-feedback-success').style.display = "block";
                removeActiveButton(buttons);
                
                window.scrollTo({
                  top: 0,
                  behavior: "smooth",
                });
                
                let initialTime = 10;
                let time = initialTime;
                document.querySelector('.success-form-timer span').innerHTML = initialTime;
                
                let timer = setInterval(() => {
                  time--;
                  document.querySelector('.success-form-timer span').innerHTML = time;
                  
                  if (time === 0) {
                    clearInterval(timer);
                    document.querySelector('.issue__head').style.display = "flex";
                    document.getElementById('form-feedback-success').style.display = "none";
                    document.querySelector('.success-form-timer span').innerHTML = initialTime;
                  }
                }, 1000);
              }
              
              setTimeout(() => {
                files.forEach(item => {
                  item.querySelector('input').value = '';
                  item.querySelector('.preview-image').src = '';
                  item.classList.remove('loaded');
                  item.closest('.input-file').classList.remove('with-file');
                });
                
                if (form.closest('.feedback-panel') !== null) {
                  document.getElementById('modal-feedback-success').classList.add('active');
                }
              }, 500);
            }
            
            if (sendTimeForm === 6000) {
              clearInterval(statusForm);
            }
          }, 10);
        })
      })
    }
    
    openFeedbackForm();
    openPanelWithForm();
    switchFeedbackForm();
    //closeFormOnClickOutside();
    validateForm();
  }
  feedbackForm();
});