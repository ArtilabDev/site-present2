document.addEventListener("DOMContentLoaded",(()=>{if(setTimeout((()=>{document.querySelectorAll(".preload").forEach((e=>{e.classList.remove("preload")}))}),600),document.querySelectorAll(".networks-slider").length){const e=new Swiper(".networks-slider",{slidesPerView:"auto",loop:!0,watchSlidesProgress:!0,watchSlidesVisibility:!0,allowTouchMove:!1,speed:5e3,autoplay:{delay:0,disableOnInteraction:!1}});e.autoplay.stop();const t=()=>{const t=document.querySelector(".networks-slider");window.scrollY>t.offsetTop-window.innerHeight&&e.autoplay.start()};t(),window.addEventListener("scroll",t)}if(document.querySelectorAll(".partners-slider").length){const e=new Swiper(".partners-slider",{slidesPerView:"auto",spaceBetween:24,loop:!0,watchSlidesProgress:!0,watchSlidesVisibility:!0,allowTouchMove:!1,speed:7e3,autoplay:{delay:0,disableOnInteraction:!1}});e.autoplay.stop();const t=()=>{const t=document.querySelector(".networks-slider");window.scrollY>t.offsetTop-window.innerHeight&&e.autoplay.start()};t(),window.addEventListener("scroll",t)}if(document.querySelectorAll(".trending-slider").length){new Swiper(".trending-slider",{slidesPerView:"auto",loop:!0,watchSlidesProgress:!0,watchSlidesVisibility:!0,updateOnWindowResize:!0,centeredSlides:!0,speed:700,navigation:{nextEl:".trending-next",prevEl:".trending-prev"},pagination:{el:".swiper-pagination"}})}if(document.querySelectorAll(".quest-slider").length){new Swiper(".quest-slider",{slidesPerView:"auto",spaceBetween:24,loop:!1,watchSlidesProgress:!0,watchSlidesVisibility:!0,updateOnWindowResize:!0,speed:700,navigation:{nextEl:".trending-next",prevEl:".trending-prev"},pagination:{el:".swiper-pagination"}})}if(document.querySelectorAll(".participate-slider").length){new Swiper(".participate-slider",{slidesPerView:"auto",loop:!1,watchSlidesProgress:!0,watchSlidesVisibility:!0,updateOnWindowResize:!0,speed:700,on:{init:function(e){!function(e){let t=e.wrapperEl.children.length;const s=()=>{let s,o=0,l=1,i=[],r=[];for(let c=0;c<t;c++)c===o&&(s=e.wrapperEl.children[c].clientHeight,i.push(s),o+=2),c===l&&(s=e.wrapperEl.children[c].clientHeight,r.push(s),l+=2);return[Math.max(...i),Math.max(...r)]},o=()=>{let o=s()[0]-150,l=s()[1]-174,i=0,r=1;for(let s=0;s<t;s++)s===i&&(e.wrapperEl.children[s].querySelector(".participate-slide__content").style.height=o+"px",i+=2),s===r&&(e.wrapperEl.children[s].querySelector(".participate-slide__content").style.height=l+"px",e.wrapperEl.children[s].querySelector(".participate-slide__icon").style.marginTop=o+24+"px",r+=2)};o()}(e)}},navigation:{nextEl:".trending-next",prevEl:".trending-prev"},pagination:{el:".swiper-pagination"}})}if(document.querySelectorAll(".benefit-slider").length){const e=e=>{const t=e.dataset.id;return new Swiper(`#benefit-slider-${t}`,{slidesPerView:"auto",spaceBetween:44,loop:!1,watchSlidesProgress:!0,watchSlidesVisibility:!0,updateOnWindowResize:!0,speed:700,navigation:{nextEl:`.benefit-next-${t}`,prevEl:`.benefit-prev-${t}`},pagination:{el:`.swiper-pagination-${t}`,type:"fraction"}})};document.querySelectorAll(".benefit-slider").forEach((t=>e(t)))}if(document.querySelectorAll(".article-swiper").length){new Swiper(".article-swiper",{slidesPerView:"auto",loop:!1,spaceBetween:24,watchSlidesProgress:!0,watchSlidesVisibility:!0,updateOnWindowResize:!0,speed:700})}if(document.querySelectorAll(".team-slider").length){const e=new Swiper(".team-slider",{slidesPerView:"auto",spaceBetween:44,loop:!0,watchSlidesProgress:!0,updateOnWindowResize:!0,watchSlidesVisibility:!0,keyboard:!0,speed:600,breakpoints:{320:{slidesPerView:"auto",spaceBetween:24},768:{slidesPerView:"auto",spaceBetween:44}},navigation:{nextEl:".team-next",prevEl:".team-prev"},pagination:{el:".swiper-pagination",type:"fraction"}}),t=()=>{const t=document.querySelector(".team-slider");window.scrollY;t.getBoundingClientRect().top-window.innerHeight<0?e.autoplay.start():e.autoplay.stop()};t(),window.addEventListener("scroll",t)}document.querySelectorAll('a[href^="#"]').forEach((e=>{e.addEventListener("click",(function(e){e.preventDefault();let t=e.target.getAttribute("href"),s=document.querySelector(t).offsetTop-120;window.scroll({top:s,left:0,behavior:"smooth"})}))})),function(){let e;document.querySelectorAll(".d-checkbox").forEach((t=>{t.addEventListener("click",(t=>{e=t.currentTarget.querySelector("input").checked,e&&t.currentTarget.querySelector(".d-checkbox_check").removeAttribute("style")}))}))}();if(document.querySelectorAll(".feature-content-slider").length){let e=new Swiper(".feature-content-slider",{slidesPerView:1,loop:!1,allowTouchMove:!1,effect:"fade",speed:400,autoHeight:!0});class t{constructor(){this.tabMenu=document.querySelectorAll(".feature__tabs-menu_item"),this.tabIcon=document.querySelectorAll(".feature-icon"),this.intiWidth(),this.changeTab(),this.changeWidthOnResize()}intiWidth(){document.querySelectorAll(".feature__tabs-menu_item").length&&setTimeout((()=>{let e=document.querySelector(".feature__tabs-menu_item").offsetWidth;document.querySelector(".glider").style.width=e+"px"}),100)}changeTab(){this.tabMenu.forEach((t=>{t.addEventListener("click",(s=>{s.preventDefault();let o=s.target.offsetWidth;this.tabMenu.forEach((e=>{e.classList.remove("active")})),this.tabIcon.forEach((e=>{e.classList.remove("active")})),s.target.classList.add("active"),document.querySelector(".glider").style.width=o+"px",document.querySelector(".glider").style.left=s.target.offsetLeft+"px";const l=t.dataset.index;document.querySelector(`.feature-icon[data-index="${l}"]`).classList.add("active"),e.slideTo(l-1)}))}))}changeWidthOnResize(){const e=()=>{let e=document.querySelector(".feature__tabs-menu_item.active");setTimeout((()=>{document.querySelector(".glider").style.width=e.offsetWidth+"px",document.querySelector(".glider").style.left=e.offsetLeft+"px"}),500)};this.tabMenu.length&&window.addEventListener("resize",e)}}new t}class e{constructor(){this.button=document.querySelectorAll("[data-scroll-item]"),this.block=document.querySelector("[data-scroll-block]"),this.content=document.querySelector("[data-scroll-content]"),this.body=document.querySelector("[data-scroll-body]"),this.anchor=document.querySelectorAll("[data-scroll-anchor]"),this.initScrollBlock(),this.onTimeOut(),this.resize(),this.clickToScroll(),this.changeClass()}onTimeOut(){setTimeout((()=>{this.initScrollBlock()}),300)}initScrollBlock(){if(null!==this.body){let e=this.body.offsetTop,t=parseFloat(window.getComputedStyle(this.body).paddingTop),s=this.block.offsetHeight,o=this.content.offsetHeight,l=parseFloat(window.getComputedStyle(this.content).marginBottom);this.fixedBlock(e,t,l,o,s)}}clickToScroll(){this.button.forEach((e=>{"1"===e.dataset.scrollItem&&e.classList.add("touch"),e.addEventListener("click",(t=>{const s=e.dataset.scrollItem,o=document.querySelector('[data-scroll-anchor="'+s+'"]').getBoundingClientRect().top+window.scrollY-120,l=t.currentTarget;((e,t)=>{let s=window.scrollY,o=null;null===t&&(t=500),e=+e,t=+t,window.requestAnimationFrame((function l(i){o=o||i;let r=i-o;s<e?window.scrollTo(0,(e-s)*r/t+s):window.scrollTo(0,s-(s-e)*r/t),r<t?window.requestAnimationFrame(l):window.scrollTo(0,e)}))})(o,400),setTimeout((()=>{this.button.forEach((e=>{e.classList.remove("active"),e.classList.remove("touch")})),l.classList.add("active"),l.classList.add("touch")}),500)}))}))}changeClass(){if(null!==this.body){let e,t=this.body.offsetTop;const s=()=>{this.button.forEach((e=>{e.classList.remove("active")}))},o=()=>{let o=window.scrollY;this.anchor.forEach((l=>{let i=l.offsetTop+t-120;o>i&&(e=l.dataset.scrollAnchor,s(),document.querySelector('[data-scroll-item="'+e+'"]').classList.add("active"))}))};document.addEventListener("scroll",o)}}fixedBlock(e,t,s,o,l){document.addEventListener("scroll",(()=>{let i=window.scrollY;i>e+t-s&&i<e+t+o-l-s?this.block.classList.add("fixed"):this.block.classList.remove("fixed"),i>e+t+o-l-s?this.block.classList.add("fixed-bottom"):this.block.classList.remove("fixed-bottom")}))}resize(){window.addEventListener("resize",(()=>{this.initScrollBlock()}))}}class t{constructor(){this.logo=document.querySelectorAll(".block-name_logo"),this.icons()}icons(){this.logo.forEach((e=>{this.iconsLength(e.children);const t=document.createElement("span");t.setAttribute("class","icon-plus"),e.children.length>2&&e.append(t)}))}iconsLength(e){for(let t=0;t<e.length;t++)t>1&&(e[t].style.display="none")}showIcons(){}}new class{constructor(){this.input=document.querySelector(".faq-search input"),this.spoiler=document.querySelectorAll(".spoiler__head"),this.result=document.querySelector(".faq-search_result-wrap"),this.searchWord(),this.closeSelectOutside()}searchWord(){null!==this.input&&this.input.addEventListener("input",(e=>{let t=e.target.value,s=[],o=document.createElement("span");o.setAttribute("class","close-search"),0!==e.currentTarget.value.length?(null!==document.querySelector(".close-search")&&document.querySelector(".close-search").remove(),e.target.closest(".faq-search").append(o),e.target.closest(".faq-search").classList.add("active")):(e.target.closest(".faq-search").classList.remove("active"),document.querySelector(".close-search").remove()),null!==document.querySelector(".close-search")&&document.querySelector(".close-search").addEventListener("click",(e=>{e.target.closest(".faq-search").classList.remove("active"),e.target.closest(".faq-search").querySelector("input").value="",e.target.remove()})),this.spoiler.forEach(((e,o)=>{let l=e.innerText||"";if(l.toLowerCase().includes(t.toLowerCase())&&0!==t.length){let i=new RegExp(t,"gi");e.innerHTML=l.replace(i,'<span class="highlighted">$&</span>'),e.setAttribute("data-set",o),s.push({text:l.replace(i,'<span class="highlighted">$&</span>'),index:o})}else e.innerHTML=l})),this.result.innerHTML="",s.map((e=>this.result.innerHTML+="<div class='faq-item' data-set="+e.index+">"+e.text+"</div>")),document.querySelectorAll(".faq-item").length>0?null!==document.querySelector(".no-result-faq")&&document.querySelector(".no-result-faq").remove():this.result.innerHTML="<div class='no-result-faq'> No results found! </div>",document.querySelectorAll(".faq-item").forEach((e=>{e.addEventListener("click",(t=>{let s=t.currentTarget.dataset.set;const o=document.querySelector('.spoiler__head[data-set="'+s+'"]').getBoundingClientRect().top+window.scrollY-90;e.closest(".faq-search").classList.remove("active");((e,t)=>{let s=window.scrollY,o=null;null===t&&(t=500),e=+e,t=+t,window.requestAnimationFrame((function l(i){o=o||i;let r=i-o;s<e?window.scrollTo(0,(e-s)*r/t+s):window.scrollTo(0,s-(s-e)*r/t),r<t?window.requestAnimationFrame(l):window.scrollTo(0,e)}))})(o,400)}))}))}))}closeSelectOutside(){const e=document.querySelectorAll(".faq-search");window.addEventListener("click",(function(t){e.forEach((e=>{e.contains(t.target)||e.classList.remove("active")}))}))}},null!==document.querySelector(".question__search")&&document.querySelector(".question__search .close-search").addEventListener("click",(e=>{e.target.closest(".question__search").classList.remove("active"),e.target.closest(".question__search").querySelector("input").value=""})),function(){const e=document.querySelectorAll(".question__search");window.addEventListener("click",(function(t){e.forEach((e=>{e.contains(t.target)||e.classList.remove("active")}))}))}(),new class{constructor(){this.trigger=document.querySelectorAll(".animated"),this.init()}init(){const e=e=>{this.scroll=window.scrollY;let t=[];this.trigger.forEach(((e,s)=>{t.push(e.offsetTop-window.innerHeight),this.scroll>t[s]?e.classList.add("in-view"):e.classList.remove("in-view")}))};e(),window.addEventListener("scroll",e)}getAbsoluteHeight(e){e="string"==typeof e?document.querySelector(e):e;const t=window.getComputedStyle(e),s=parseFloat(t.marginTop)+parseFloat(t.marginBottom);return Math.ceil(e.offsetHeight+s)}},new class{constructor(){this.videoYoutube=document.querySelectorAll(".video-youtube"),this.videoVimeo=document.querySelectorAll(".video-vimeo"),this.youtube(),this.vimeo()}youtube(){this.videoYoutube.forEach((e=>{e.addEventListener("click",(function(t){this.videoSrc=e.getAttribute("data-video-src"),this.videoUrl=`https://www.youtube.com/embed/${this.videoSrc}?rel=0&amp;autoplay=1`,e.closest(".video-block").classList.add("load-iframe"),e.closest(".video-block").innerHTML=`\n               <iframe src="${this.videoUrl}"\n               frameborder="0"\n               class="video-iframe"\n               allow="autoplay; accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"\n               allowfullscreen></iframe>\n          `,e.style.display="none",t.preventDefault()}))}))}vimeo(){this.videoVimeo.forEach((e=>{e.addEventListener("click",(function(t){this.videoSrc=e.getAttribute("data-video-src"),this.videoUrl=`https://player.vimeo.com/video/${this.videoSrc}?autoplay=1`,e.closest(".video-block").classList.add("load-iframe"),e.closest(".video-block").innerHTML=`<iframe src="${this.videoUrl}" class="video-iframe" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>`,e.style.display="none",e.querySelector(".video-iframe").play(),t.preventDefault()}))}))}},new class{constructor(){this.burger=document.querySelector(".burger-menu"),this.header=document.querySelector(".header"),this.init()}init(){this.burger.addEventListener("click",(e=>{e.target.classList.toggle("active"),this.header.classList.toggle("open"),document.body.classList.toggle("hidden")}))}},new class{constructor(){this.spoilerHead=document.querySelectorAll(".spoiler__head"),this.resize(),this.heightSpoiler(),this.init()}init(){this.spoilerHead.forEach((t=>{t.addEventListener("click",(()=>{t.parentElement.dataset.status="open"===t.parentElement.dataset.status?"closed":"open",this.heightSpoiler(),setTimeout((()=>{(new e).initScrollBlock()}),600)}))}))}heightSpoiler(){this.spoilerHead.forEach((e=>{const t=e.parentElement.dataset.status,s=e.clientHeight,o=e.nextElementSibling.clientHeight;"open"===t&&(e.parentElement.style.height=s+o+"px"),"closed"===t&&(e.parentElement.style.height=s+"px")}))}resize(){window.addEventListener("resize",(()=>{this.heightSpoiler()}))}},new class{constructor(){this.btnModal=document.querySelectorAll(".btn-modal"),this.btnClose=document.querySelectorAll(".modal-close"),this.terms=document.querySelector(".confirm-terms"),this.openModal(this.btnModal),this.closeModal(this.btnClose),this.confirmTerms(this.terms)}openModal(e){e.forEach((e=>{e.addEventListener("click",(e=>{const t=e.target.dataset.target;document.querySelector("#"+t).classList.add("active"),document.body.classList.add("open-modal")}))}))}closeModal(e){e.forEach((e=>{e.addEventListener("click",(e=>{e.target.closest(".modal, .feedback-panel_modal").classList.remove("active"),document.body.classList.remove("open-modal")}))}))}confirmTerms(e){if(null!==e){let t;e.addEventListener("click",(e=>{setTimeout((()=>{t=e.target.closest(".modal-confirm").querySelector("input").checked,t?(e.target.closest(".modal").classList.remove("active"),document.body.classList.remove("open-modal")):(e.stopPropagation(),e.target.closest(".modal-confirm").querySelector(".d-checkbox_check").style.borderColor="red")}),100)}))}}},new class{constructor(){this.select=document.querySelectorAll(".converted-select"),this.init(),this.toggleSelect(),this.changeOption(),this.closeSelectOutside()}init(){this.select.forEach((e=>{this.item=e,e.style.display="none",this.selectIndex=e.dataset.index;const t=document.createElement("div"),s=document.createElement("div");let o=document.createElement("div");const l=document.createElement("div");t.setAttribute("class","select "+this.selectIndex),s.setAttribute("class","select-name sticky-cursor sticky-dot"),s.setAttribute("id",this.selectIndex),s.append(e.options[e.selectedIndex].innerText),e.before(t);const i=document.querySelector("."+this.selectIndex);o.setAttribute("class","select-options-wrap "+this.selectIndex+"-options"),i.append(s),l.setAttribute("class","select-options"),l.append(o),i.append(l);const r=document.querySelector("."+this.selectIndex+"-options"),c=e.options;for(let e=0;e<c.length;e++){const t=document.createElement("div"),s=c[e].dataset.img;if(void 0!==s){const e=document.createElement("img");e.setAttribute("src",s),t.append(e)}t.setAttribute("data-value",c[e].value),t.setAttribute("class","select-item sticky-cursor sticky-dot"),t.append(c[e].innerText),r.append(t)}if(e.classList.contains("select-search")){const e=document.createElement("div"),t=document.createElement("input");e.setAttribute("class","select-search"),t.setAttribute("type","search"),t.setAttribute("placeholder","Find"),t.setAttribute("class","search-input"),e.appendChild(t),l.prepend(e);document.querySelectorAll(".search-input").forEach((e=>{this.search(e)}))}}))}search(e){e.addEventListener("input",(e=>{const t=e.currentTarget.value;e.currentTarget.closest(".select-options").querySelectorAll(".select-item").forEach((e=>{const s=e.textContent;e.classList.add("hidden"),s.toLowerCase().includes(t.toLowerCase())&&0!==t.trim().length?(e.classList.add("found"),e.classList.remove("hidden")):e.classList.remove("found"),0===t.trim().length&&(e.classList.remove("found"),e.classList.remove("hidden"))}))}))}toggleSelect(){document.querySelectorAll(".select-name").forEach((e=>{e.addEventListener("click",(()=>{e.closest(".select").classList.toggle("open")}))}))}closeSelectOutside(){const e=document.querySelectorAll(".select");window.addEventListener("click",(function(t){e.forEach((e=>{e.contains(t.target)||e.classList.remove("open")}))}))}changeOption(){document.querySelectorAll(".select-options .select-item").forEach((t=>{let s=Math.floor(1e6*Math.random());t.closest(".select-options").setAttribute("data-index",s.toString()),t.addEventListener("click",(s=>{const o=s.currentTarget,l=o.innerHTML,i=o.textContent;t.closest(".select").classList.remove("open");const r=o.closest(".select-options").dataset.index,c=document.querySelectorAll("[data-index='"+r+"'] div");e(c),o.classList.add("active"),o.closest(".select-options").previousElementSibling.innerHTML="",o.closest(".select-options").previousElementSibling.innerHTML=l,o.closest(".select-options").previousElementSibling.classList.add("selected"),null!==t.closest(".select-options").querySelector(".select-search")&&(t.closest(".select-options").querySelector(".search-input").value=""),t.closest(".select").nextElementSibling.querySelectorAll("option").forEach((e=>{e.removeAttribute("selected"),e.value===i&&e.setAttribute("selected","selected")}))}))}));const e=e=>{e.forEach((e=>{e.classList.remove("active"),e.classList.contains("found")&&e.classList.remove("found"),e.classList.contains("hidden")&&e.classList.remove("hidden")}))}}},new e,new t,new class{constructor(){this.section=document.querySelectorAll(".info"),this.hideBlock()}hideBlock(){this.section.forEach((e=>{let t=e.querySelectorAll(".info__block");const s=e.querySelector(".show-more-info");let o=s.dataset.text;for(let e=0;e<t.length;e++)e>2&&t[e].classList.add("hidden");t.length>3&&s.append(o),s.addEventListener("click",(t=>{e.querySelectorAll(".hidden").forEach((e=>{e.classList.remove("hidden"),t.currentTarget.style.display="none"}))}))}))}},function(){if(document.querySelectorAll(".sArticle__content a").length){document.querySelectorAll(".sArticle__content a").forEach((e=>{e.setAttribute("class","sticky-cursor sticky-dot")}))}}(),new MutationObserver((function(s){s.forEach((function(s){"sBlog__articles-wrap"===s.target.className&&new e,"defi__content"===s.target.className&&new t}))})).observe(document.documentElement,{attributes:!0,childList:!0,subtree:!0});let s=window.location.href;if(s.indexOf("#search-")>-1){const e=s.split("/");let t=e.pop()||e.pop(),o=t.slice(1),l=document.querySelector(t);l.style.color="#6dffd5",setTimeout((()=>{let e=document.querySelector(".faq__body").offsetTop,t=document.querySelector(".faq-content").offsetTop,s=document.getElementById(o).offsetTop-90+t+e;window.scroll({top:s,left:0,behavior:"smooth"})}),200),setTimeout((()=>{l.removeAttribute("style")}),3e3)}if(null!==document.querySelector(".ref-banner button")){document.querySelector(".ref-banner button").addEventListener("click",(()=>{let e=document.querySelector("#crypto-bloom");window.scrollTo({top:e.getBoundingClientRect().top+window.scrollY-90,behavior:"smooth"})}))}let o=document.querySelectorAll(".sArticle__content table");o.length>0&&o.forEach((e=>{let t=document.createElement("div");t.setAttribute("class","sArticle__content-table"),e.parentNode.insertBefore(t,e),t.appendChild(e)})),function(){let e=document.querySelectorAll(".image-input"),t=document.querySelectorAll(".preview-image");e.forEach((function(e,l){let i=document.createElement("span");i.setAttribute("class","remove-image sticky-cursor"),null!==e.closest(".input-file")&&e.closest(".input-file").appendChild(i),e.addEventListener("change",(function(){let i;s(e,t[l]),o(e);let r,c=0,n=e.getAttribute("accept"),a=e.files[0].type.slice(6);e.closest("label").classList.add("loading"),e.closest("label").classList.contains("loaded")&&e.closest("label").classList.remove("loaded"),e.closest("label").classList.contains("error")&&e.closest("label").classList.remove("error"),null!==e.parentNode.querySelector(".error-message")&&e.parentNode.querySelector(".error-message").remove();let d=document.createElement("div");d.setAttribute("class","error-message"),clearTimeout(r),i=setInterval((()=>{if(c++,""!==t[l].getAttribute("src").trim()&&c>80){if(clearInterval(i),e.closest("label").classList.remove("loading"),document.querySelectorAll(".inputs-file label").forEach((e=>{e.classList.contains("error")&&(e.classList.remove("error"),e.querySelector(".error-message").remove())})),!n.toLowerCase().includes(a.toLowerCase()))return t[l].scr="",e.value="",d.append(`Only ${n.replace(/,/g,", ")} formats`),e.parentNode.appendChild(d),e.closest("label").classList.add("error"),e.closest(".input-file").classList.contains("with-file")&&e.closest(".input-file").classList.remove("with-file"),void(r=setTimeout((()=>{null!==e.parentNode.querySelector(".error-message")&&(e.parentNode.querySelector(".error-message").remove(),e.closest("label").classList.remove("error"))}),8e3));if(e.files[0].size>512e4)return e.value="",t[l].scr="",d.append("File max size 5Mb!"),e.parentNode.appendChild(d),e.closest("label").classList.add("error"),e.closest(".input-file").classList.contains("with-file")&&e.closest(".input-file").classList.remove("with-file"),void(r=setTimeout((()=>{e.parentNode.querySelector(".error-message")&&(e.parentNode.querySelector(".error-message").remove(),e.closest("label").classList.remove("error"))}),6e3));e.closest(".input-file").classList.add("with-file"),e.closest("label").classList.add("loaded")}1e3===c&&clearInterval(i)}),10)}))}));const s=(e,t)=>{let s=new FileReader;s.onload=function(e){t.src=e.target.result},s.readAsDataURL(e.files[0])},o=e=>{let t=e.closest("label");e.files.length>0?t.classList.add("active"):t.classList.remove("active")};document.querySelectorAll(".remove-image").forEach((e=>{e.addEventListener("click",(t=>{e.closest(".input-file").querySelector("input").value="",e.closest(".input-file").querySelector("label").classList.remove("loaded"),e.closest(".input-file").classList.remove("with-file"),setTimeout((()=>{e.closest(".input-file").querySelector(".preview-image").src=""}),500)}))}))}(),function(){const e=e=>{e.forEach((e=>{e.classList.remove("active")}))},t=e=>{e.forEach((e=>{e.removeAttribute("disabled")}))};document.querySelectorAll(".btn--modal").forEach((e=>{e.addEventListener("click",(function(t){const s=e.dataset.target,o=document.querySelector("#"+s);document.querySelector("#modal-feedback-success .title").innerHTML=e.dataset.type,o&&!o.classList.contains("active")&&o.classList.add("active")}))})),(()=>{const e=document.querySelector(".feedback-panel_btn--main");null!==e&&e.addEventListener("click",(function(){this.classList.toggle("active"),this.closest(".feedback-panel").classList.toggle("open"),document.querySelectorAll(".feedback-panel_modal").forEach((function(e){e.classList.remove("active")}))}))})(),(()=>{const t=document.querySelectorAll(".issue-btn");t.length>0&&(window.scroll({top:0,behavior:"smooth"}),t.forEach((o=>{o.addEventListener("click",(()=>{e(t),s(),o.classList.add("active");const l=o.dataset.target.toString();document.getElementById(l).style.display="block";const i=o.dataset.title;document.getElementById("form-feedback-success").querySelector(".title").innerHTML=i;document.querySelector(".issue__forms").getBoundingClientRect().height;const r=document.querySelector(".issue__forms").getBoundingClientRect().top+window.scrollY;window.scroll({top:r-110,behavior:"smooth"})}))})));const s=()=>{document.querySelectorAll(".feedback-panel_form").forEach((e=>{e.style.display="none"}))}})(),document.querySelectorAll(".wpcf7-form").forEach((s=>{s.querySelectorAll("input").forEach((e=>{e.addEventListener("input",(t=>{""===t.target.value.trim()&&"true"===e.getAttribute("aria-required")&&(t.target.value="")}))})),s.addEventListener("submit",(o=>{o.preventDefault(),s.querySelector("[type=submit]").classList.add("sending");const l=document.querySelectorAll(".issue-btn");let i,r=document.querySelectorAll(".inputs-file label"),c=0;l.length>0&&(e=>{e.forEach((e=>{e.classList.contains("active")||e.setAttribute("disabled","disabled")}))})(l),i=setInterval((()=>{c++;const o=s.dataset.status;if("invalid"===o&&(l.length>0&&t(l),clearInterval(i),s.querySelector("[type=submit]").classList.remove("sending")),"sent"===o){if(clearInterval(i),l.length>0&&t(l),s.querySelector("[type=submit]").classList.remove("sending"),null!==s.closest(".feedback-panel")&&(s.closest(".feedback-panel").classList.remove("open"),s.closest(".feedback-panel_modal").classList.remove("active"),document.querySelector(".feedback-panel_btn--main").classList.remove("active")),null!==s.closest(".feedback-panel_form")){s.closest(".feedback-panel_form").style.display="none",document.querySelector(".issue__head").style.display="none",document.getElementById("form-feedback-success").style.display="block",e(l),window.scrollTo({top:0,behavior:"smooth"});let t=10,o=t;document.querySelector(".success-form-timer span").innerHTML=t;let i=setInterval((()=>{o--,document.querySelector(".success-form-timer span").innerHTML=o,0===o&&(clearInterval(i),document.querySelector(".issue__head").style.display="flex",document.getElementById("form-feedback-success").style.display="none",document.querySelector(".success-form-timer span").innerHTML=t)}),1e3)}setTimeout((()=>{r.forEach((e=>{e.querySelector("input").value="",e.querySelector(".preview-image").src="",e.classList.remove("loaded"),e.closest(".input-file").classList.remove("with-file")})),null!==s.closest(".feedback-panel")&&document.getElementById("modal-feedback-success").classList.add("active")}),500)}6e3===c&&clearInterval(i)}),10)}))}))}()}));