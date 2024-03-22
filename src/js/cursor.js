/// cursor
class StickyCursor {
  constructor( hoverItems ) {
    this.hoverItems = hoverItems;
    this.init();
  }
  
  init() {
    this.initCursor();
    this.initHovers();
    this.hoverHeader();
    this.hoverModal();
    this.initBounds();
  }
  
  initCursor() {
    this.outerCursor = document.querySelector(".cursor--large");
    this.innerCursor = document.querySelector(".cursor--small");
    this.outerCursorBox = this.outerCursor.getBoundingClientRect();
    this.innerCursorBox = this.innerCursor.getBoundingClientRect();
    this.outerCursorSpeed = 0.3;
    this.clientX = -100;
    this.clientY = -100;
    
    document.addEventListener("mousemove", ( e ) => {
      this.clientX = e.clientX;
      this.clientY = e.clientY;
      this.clientYdot = e.clientY + window.scrollY;
      this.targetName = e.target.localName;
      
      gsap.to(this.innerCursor, this.outerCursorSpeed, {
        opacity: 1
      });
      gsap.to(this.outerCursor, this.outerCursorSpeed, {
        opacity: 1
      });
      
      if (this.targetName === 'iframe') {
        gsap.to(this.innerCursor, this.outerCursorSpeed, {
          opacity: 0,
          zIndex: '1'
        });
        gsap.to(this.outerCursor, this.outerCursorSpeed, {
          opacity: 0,
          zIndex: '1'
        });
      }
      
      if (this.targetName === 'section' || this.targetName === 'div' || this.targetName === 'img') {
        gsap.to(this.innerCursor, this.outerCursorSpeed, {
          zIndex: '102'
        });
        gsap.to(this.outerCursor, this.outerCursorSpeed, {
          zIndex: '100'
        });
      }
      
      if (e.target.offsetParent !== null && e.target.offsetParent !== undefined) {
        if (e.target.offsetParent.classList.contains('header') ||
          e.target.offsetParent.classList.contains('header__logo') ||
          this.targetName === 'header') {
          gsap.to(this.innerCursor, this.outerCursorSpeed, {
            zIndex: '105'
          });
          gsap.to(this.outerCursor, this.outerCursorSpeed, {
            zIndex: '105'
          });
        }
        
        if (e.target.offsetParent.classList.contains('modal__wrap') ||
          e.target.offsetParent.classList.contains('modal') ||
          e.target.offsetParent.classList.contains('modal__inner')) {
          gsap.to(this.innerCursor, this.outerCursorSpeed, {
            zIndex: '105'
          });
          gsap.to(this.outerCursor, this.outerCursorSpeed, {
            zIndex: '105'
          });
        }
      }
      
    });
    
    const render = () => {
      gsap.set(this.innerCursor, {
        x: this.clientX - this.innerCursorBox.width/2,
        y: this.clientY - this.innerCursorBox.height/2,
      });
      if (!this.isStuck) {
        gsap.to(this.outerCursor, this.outerCursorSpeed, {
          x: this.clientX - this.outerCursorBox.width/2,
          y: this.clientYdot - this.outerCursorBox.height/2,
        });
      }
      
      requestAnimationFrame(render);
    };
    render();
  }
  
  initHovers() {
    const handleMouseEnter = ( e ) => {
      const target = e.currentTarget;
      const box = target.getBoundingClientRect();
      let borderRadius = window.getComputedStyle(target).getPropertyValue('border-radius');
      
      this.outerCursorOriginals = {
        width: this.outerCursorBox.width,
        height: this.outerCursorBox.height,
      };
      
      switch (this.checkClass(target, 'sticky-cursor')) {
        case this.checkClass(target, "sticky-link") === true:
          this.isStuck = true;
          this.outerCursor.classList.add('cursor-link');
          this.innerCursor.classList.add('cursor-link');
          gsap.to(this.innerCursor, this.outerCursorSpeed, {
            scale: 1.4,
            opacity: .5
          });
          gsap.to(this.outerCursor, this.outerCursorSpeed, {
            opacity: .5,
            x: box.left,
            y: box.top + window.scrollY,
            width: box.width,
            height: box.height,
          });
          break;
        
        case this.checkClass(e.target, "sticky-dot") === true:
          this.innerCursor.classList.add('cursor-dot');
          this.outerCursor.classList.add('cursor-dot');
          gsap.to(this.innerCursor, this.outerCursorSpeed, {
            scale: 1.2,
          });
          gsap.to(this.outerCursor, this.outerCursorSpeed, {
            scale: .4,
          });
          break;
        
        case this.checkClass(e.target, "sticky-play") === true:
          this.innerCursor.classList.add('cursor-play');
          gsap.to(this.innerCursor, this.outerCursorSpeed, {
            scale: 3,
          });
          gsap.to(this.outerCursor, this.outerCursorSpeed, {
            scale: 3
          });
          
          document.querySelectorAll('.video-thumbnail').forEach(( item ) => {
            item.addEventListener('click', () => {
              this.innerCursor.classList.remove('cursor-play');
              gsap.to(this.innerCursor, this.outerCursorSpeed, {
                opacity: 0,
                zIndex: '1',
              });
              gsap.to(this.outerCursor, this.outerCursorSpeed, {
                opacity: 0,
                zIndex: '1',
                scale: 1
              });
            })
          })
          break;
        
        default:
          this.isStuck = true;
          this.outerCursor.classList.add('cursor-hover');
          this.innerCursor.classList.add('cursor-hover');
          gsap.to(this.innerCursor, this.outerCursorSpeed, {
            scale: 1.5,
            opacity: .8
          });
          gsap.to(this.outerCursor, this.outerCursorSpeed, {
            x: box.left,
            y: box.top + window.scrollY,
            width: box.width,
            height: box.height,
            borderRadius: borderRadius
          });
          break;
      }
    };
    
    const handleMouseLeave = () => {
      this.isStuck = false;
      
      this.innerCursor.classList.remove('cursor-play');
      this.outerCursor.classList.remove('cursor-link');
      this.innerCursor.classList.remove('cursor-link');
      this.innerCursor.classList.remove('cursor-dot');
      this.outerCursor.classList.remove('cursor-dot');
      this.outerCursor.classList.remove('cursor-hover');
      this.innerCursor.classList.remove('cursor-hover');
      
      gsap.to(this.innerCursor, this.outerCursorSpeed, {
        scale: 1,
        opacity: 1,
      });
      gsap.to(this.outerCursor, this.outerCursorSpeed, {
        width: "40px",
        height: "40px",
        opacity: 1,
        scale: 1,
        borderRadius: '100px',
        x: this.clientX - this.innerCursorBox.width/2,
        y: this.clientYdot - this.innerCursorBox.height/2,
      });
    };
    
    this.hoverItems.forEach(( item ) => {
      item.addEventListener("mouseenter", handleMouseEnter);
      item.addEventListener("mouseleave", handleMouseLeave);
    });
  }
  
  initBounds() {
    const onMouseEnter = () => {
      this.outerCursor.classList.remove("hide");
      gsap.to(this.innerCursor, this.outerCursorSpeed, {
        scale: 1,
        opacity: 1,
      });
      gsap.to(this.outerCursor, this.outerCursorSpeed, {
        scale: 1,
        opacity: 1,
      });
    };
    
    const onMouseLeave = () => {
      this.outerCursor.classList.add("hide");
      gsap.to(this.innerCursor, this.outerCursorSpeed, {
        scale: 0,
        opacity: 0,
      });
      gsap.to(this.outerCursor, this.outerCursorSpeed, {
        scale: 2,
        opacity: 0,
      });
    };
    
    const scrollWindow = () => {
      gsap.to(this.innerCursor, this.outerCursorSpeed, {
        opacity: 0,
      });
      gsap.to(this.outerCursor, this.outerCursorSpeed, {
        opacity: 0
      });
    }
    
    document.addEventListener('scroll', scrollWindow);
    document.addEventListener("mouseenter", onMouseEnter);
    document.addEventListener("mouseleave", onMouseLeave);
    
  }
  
  hoverHeader() {
    this.header = document.querySelector('.header');
    
    const headerEnter = () => {
      gsap.to(this.innerCursor, this.outerCursorSpeed, {
        zIndex: 102,
      });
      gsap.to(this.outerCursor, this.outerCursorSpeed, {
        zIndex: 102
      });
    }
    
    const headerLeave = () => {
      gsap.to(this.outerCursor, this.outerCursorSpeed, {
        zIndex: 100
      });
    }
    
    this.header.addEventListener("mouseenter", headerEnter);
    this.header.addEventListener("mouseleave", headerLeave);
  }
  
  hoverModal() {
    this.modal = document.querySelectorAll('.modal');
    
    const modalEnter = () => {
      gsap.to(this.innerCursor, this.outerCursorSpeed, {
        zIndex: 102,
      });
      gsap.to(this.outerCursor, this.outerCursorSpeed, {
        zIndex: 102
      });
    }
    
    const modalLeave = () => {
      gsap.to(this.innerCursor, this.outerCursorSpeed, {
        zIndex: '999',
        opacity: 1
      });
      gsap.to(this.outerCursor, this.outerCursorSpeed, {
        zIndex: '100',
        opacity: 1
      });
    }
    
    this.modal.forEach(( modal ) => {
      modal.addEventListener("mouseenter", modalEnter);
      modal.addEventListener("mouseleave", modalLeave);
    })
  }
  
  checkClass( element, clsName ) {
    return (' ' + element.className + ' ').indexOf(' ' + clsName + ' ') > -1;
  }
}

setTimeout(() => {
  let cursor = document.querySelectorAll(".sticky-cursor");
  new StickyCursor(cursor);
}, 100);

// const send = XMLHttpRequest.prototype.send
// XMLHttpRequest.prototype.send = function () {
//   this.addEventListener('load', function () {
//     setTimeout(() => {
//       removeCursor();
//       appendCursor();
//       let cursor = document.querySelectorAll(".sticky-cursor");
//       new StickyCursor(cursor);
//     }, 30);
//   })
//   return send.apply(this, arguments)
// }

let mutationObserver = new MutationObserver(function ( mutations ) {
  mutations.forEach(function ( mutation ) {
    if (mutation.target.className === 'question__search_result') {
      let large = document.querySelector('.cursor--large');
      let small = document.querySelector('.cursor--small');
      large.removeAttribute('style');
      small.removeAttribute('style');
    }
  });
});

mutationObserver.observe(document.documentElement, {
  characterData: true,
  childList: true,
  subtree: true,
  characterDataOldValue: true
});

function appendCursor() {
  document.querySelector('.page-wrapper').insertAdjacentHTML(
    'beforeend',
    '<div class="cursor cursor--large"></div>' +
    '<div class="cursor cursor--small"></div>'
  );
}

function removeCursor() {
  document.querySelectorAll('.cursor').forEach(function ( cursor ) {
    cursor.remove();
  });
}