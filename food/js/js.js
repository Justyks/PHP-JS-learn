"use strict";


window.addEventListener('DOMContentLoaded', () => {
    //Tabs

    const tabs = document.querySelectorAll(".tabheader__item");
    const tabsContent = document.querySelectorAll('.tabcontent');
    const tabsParent = document.querySelector(".tabheader__items");

    function hideTabContent() {
        tabsContent.forEach(item => {
            item.classList.remove('show');
            item.classList.add('hide');
        });
        tabs.forEach(tab => {
            tab.classList.remove('tabheader__item_active');
        });
    }

    function showTabContent(i = 0) {
        tabsContent[i].classList.add('show');
        tabsContent[i].classList.remove('hide');
        tabs[i].classList.add('tabheader__item_active');
    }
    hideTabContent();
    showTabContent();

    tabsParent.addEventListener('click', (e) => {
        const target = e.target;
        if (target && target.classList.contains("tabheader__item")) {
            tabs.forEach((item, index) => {
                if (target == item) {
                    hideTabContent();
                    showTabContent(index);
                }
            });

        }

    });


    //Menu Items
    const menu = document.querySelector('.menu__field').querySelector('.container');
    class MenuItem {
        constructor(src, alt, subtitle, descr, price, classes = 'menu__item') {
            this.classes = classes;
            this.src = src;
            this.alt = alt;
            this.subtitle = subtitle;
            this.descr = descr;
            this.price = price;
        }
        addMenuItem() {
            const item = document.createElement('div');
            item.classList.add(this.classes);
            item.innerHTML = `
            <img src="${this.src}" alt="${this.alt}">
                    <h3 class="menu__item-subtitle">Меню ${this.subtitle}</h3>
                    <div class="menu__item-descr">${this.descr}</div>
                    <div class="menu__item-divider"></div>
                    <div class="menu__item-price">
                        <div class="menu__item-cost">Цена:</div>
                        <div class="menu__item-total"><span>${this.price}</span> грн/день</div>
            `;
            menu.append(item);
        }
    }
    const getResource = async (url) => {
        const res = await fetch(url);
        if (!res.ok) {
            throw new Error(`Couldn't fetch ${url},status:${res.status}`);
        }
        return await res.json();
    };
    getResource('http://localhost:3000/menu')
        .then(data => {
            data.forEach(({
                img,
                altimg,
                title,
                descr,
                price
            }) => {
                new MenuItem(img, altimg, title, descr, price).addMenuItem();
            });
        });
    // axios.get('http://localhost:3000/menu')
    // .then(data => {
    //     data.data.forEach(({
    //             img,
    //             altimg,
    //             title,
    //             descr,
    //             price
    //         }) => {
    //             new MenuItem(img, altimg, title, descr, price).addMenuItem();
    //         });
    //     }
    // );


    //Timer
    const timer = document.querySelector('.timer');
    const timerBlocks = document.querySelectorAll('.timer__block');
    const deadline = new Date(2022, 8, 29, 10);
    const timerReload = setInterval(timerUpdate, 1000);
    timerUpdate();


    function timerUpdate() {
        let now = new Date();
        let days = Math.floor((deadline - now) / 1000 / 60 / 60 / 24);
        let leave1 = (deadline - now) % (24 * 3600 * 1000);
        let hours = Math.floor(((leave1) / 1000 / 60 / 60));
        let leave2 = (leave1) % (3600 * 1000);
        let minutes = Math.floor(((leave2) / 1000 / 60));
        let leave3 = (leave2) % (60 * 1000);
        let seconds = Math.floor(((leave3) / 1000));
        timerBlocks[0].querySelector('span').textContent = needZero(days);
        timerBlocks[1].querySelector('span').textContent = needZero(hours);
        timerBlocks[2].querySelector('span').textContent = needZero(minutes);
        timerBlocks[3].querySelector('span').textContent = needZero(seconds);
        if (deadline <= now) {
            timerBlocks[0].querySelector('span').textContent = 0;
            timerBlocks[1].querySelector('span').textContent = 0;
            timerBlocks[2].querySelector('span').textContent = 0;
            timerBlocks[3].querySelector('span').textContent = 0;
            clearInterval(timerReload);
        }
    }

    function needZero(value) {
        if (value < 10) {
            return `0${value}`;
        } else {
            return value;
        }
    }

    //Modal

    const btnModal = document.querySelectorAll('button');
    const modal = document.querySelector('.modal');
    const btnModalClose = document.querySelector('.modal__close');

    setTimeout(showModal, 5000000);

    modal.addEventListener('click', e => {
        if (e.target && e.target.classList.contains('modal')) {
            closeModal();
        }
    });

    btnModalClose.addEventListener('click', () => {
        closeModal();
    });

    btnModal.forEach(e => {
        e.addEventListener('click', () => {
            showModal();
        });
    });

    document.addEventListener('scroll', showModalByScroll);

    document.addEventListener('keydown', (e) => {
        if (e.code === "Escape" && modal.classList.contains('show')) {
            closeModal();
        }
    });

    function showModalByScroll() {
        if (Math.ceil(window.pageYOffset + document.documentElement.clientHeight) >= document.documentElement.scrollHeight) {
            showModal();
            document.removeEventListener('scroll', showModalByScroll);
        }
    }

    function showModal() {
        modal.classList.add('show');
        modal.classList.remove('hide');
        document.querySelector('body').style.overflow = 'hidden';
    }

    function closeModal() {
        modal.classList.add('hide');
        modal.classList.remove('show');
        document.querySelector('body').style.overflow = 'auto';
    }

    const forms = document.querySelectorAll('form');
    const message = {
        loading: 'icons/spinner.svg',
        success: 'Спасибо! Скоро мы с вами свяжемся',
        failure: 'Что-то пошло не так...'
    };
    forms.forEach(e => {
        bindPostData(e);
    });

    const postData = async (url, data) => {
        const res = await fetch(url, {
            headers: {
                'Content-Type': 'application/json'
            },
            method: 'POST',
            body: data
        });
        return await res.json();
    };

    function bindPostData(form) {
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            let statusMessage = document.createElement('img');
            statusMessage.src = message.loading;
            statusMessage.style.cssText = `
                display: block;
                margin: auto auto;
            `;
            form.insertAdjacentElement('afterend', statusMessage);
            let formData = new FormData(form);
            const json = JSON.stringify(Object.fromEntries((formData.entries())));

            postData('http://localhost:3000/requests', json)
                .then(() => {
                    statusMessage.remove();
                    showThanksModal(message.success);
                })
                .catch((error) => {
                    showThanksModal(message.failure);
                })
                .finally(() => {
                    form.reset();
                });
        });

    }

    function showThanksModal(message) {
        const prevModalDialog = document.querySelector('.modal__dialog');
        prevModalDialog.classList.add('hide');
        prevModalDialog.classList.remove('show');
        showModal();
        const thanksModal = document.createElement('div');
        thanksModal.classList.add('modal__dialog');
        thanksModal.innerHTML = `
        <div class="modal__content">
        <div class="modal__close" data-close>×</div>
        <div class="modal__title">${message}</div>
         </div>`;
        modal.append(thanksModal);
        setTimeout(() => {
            thanksModal.remove();
            prevModalDialog.classList.add('show');
            prevModalDialog.classList.remove('hide');
            closeModal();
        }, 4000);
    }

    //slider
    const sliderImages = document.querySelectorAll('.offer__slide');
    const prevSliderImgBtn = document.querySelector('.offer__slider-prev');
    const nextSliderImgBtn = document.querySelector('.offer__slider-next');
    const totalSliderImg = document.querySelector('#total');
    const currentSliderImg = document.querySelector('#current');
    const sliderWrapper = document.querySelector('.offer__slider-wrapper');
    const sliderInner = document.querySelector('.offer__slider-inner');
    const width = window.getComputedStyle(sliderWrapper).width;
    const slider=document.querySelector('.offer__slider');
    let offset = 0;
    let slideIndex = 1;

    totalSliderImg.textContent = needZero(sliderImages.length);

    sliderInner.style.transition = 'all 0.5s';
    sliderInner.style.width = 100 * sliderImages.length + '%';
    sliderInner.style.display = 'flex';

    sliderWrapper.style.overflow = 'hidden';

    sliderImages.forEach((image) => {
        image.style.width = width;
    });

    prevSliderImgBtn.addEventListener('click', () => {
        if (offset == 0) {
            slideIndex = sliderImages.length;
            offset = +width.replace(/\D/g,'') * (sliderImages.length - 1);
        } else {
            slideIndex -= 1;
            offset -=+width.replace(/\D/g,'');
        }
        changeSlide();
    });

    nextSliderImgBtn.addEventListener('click', () => {
        if (offset == +width.replace(/\D/g,'') * (sliderImages.length - 1)) {
            slideIndex = 1;
            offset = 0;
        } else {
            slideIndex++;
            offset += +width.replace(/\D/g,'');
        }
        changeSlide();
    });

    slider.style.position='relative';
    const indicators=document.createElement('ol'),
          dots=[];
    indicators.classList.add('carousel-indicators');
    slider.append(indicators);

    for(let i=0;i<sliderImages.length;i++){
        const dot=document.createElement('li');
        dot.classList.add('dot');
        indicators.append(dot);
        dots.push(dot);
        if(i==0){
            dot.style.opacity=1;
        }
    }

    dots.forEach((dot,index)=>{
        dot.addEventListener('click',()=>{
            offset = (+width.replace(/\D/g,''))*(index);
            slideIndex=index+1;
            changeSlide();
        });
    });

    function changeSlide(){
        currentSliderImg.textContent = needZero(slideIndex);
        dots.forEach(dot=>{
            dot.style.opacity=0.5;
        });
        dots[slideIndex-1].style.opacity=1;
        sliderInner.style.transform = `translateX(${-offset}px)`;
    }

    // hideOtherImages();

    // function hideOtherImages() {
    //     for (let i = 1; i < sliderImages.length; i++) {
    //         sliderImages[i].classList.add('hide');
    //     }
    // }

    // function nextSliderImage() {
    //     let curr = Number.parseInt(currentSliderImg.textContent) - 1;
    //     sliderImages[curr].classList.add('hide');
    //     sliderImages[curr].classList.remove('show');
    //     if (curr == sliderImages.length - 1) {
    //         sliderImages[0].classList.add('show');
    //         sliderImages[0].classList.remove('hide');
    //         currentSliderImg.textContent = needZero(1);
    //     } else {
    //         sliderImages[curr + 1].classList.add('show');
    //         sliderImages[curr + 1].classList.remove('hide');
    //         currentSliderImg.textContent = needZero(curr + 2);
    //     }

    // }

    // function prevSliderImage() {
    //     let curr = Number.parseInt(currentSliderImg.textContent) - 1;
    //     sliderImages[curr].classList.add('hide');
    //     sliderImages[curr].classList.remove('show');
    //     if (curr == 0) {
    //         let prev = sliderImages.length - 1;
    //         sliderImages[prev].classList.add('show');
    //         sliderImages[prev].classList.remove('hide');
    //         currentSliderImg.textContent = needZero(prev + 1);
    //     } else {
    //         sliderImages[curr - 1].classList.add('show');
    //         sliderImages[curr - 1].classList.remove('hide');
    //         currentSliderImg.textContent = needZero(curr);
    //     }

    // }

    //Calculator

    const total=document.querySelector('.calculating__total span');
    let sex='female',weight,ratio=1.375,height,age;

    function calcTotal(){
        let result;
        if(!age||!sex||!weight||!height||!ratio){
            total.textContent='____';
            return;
        }

        if(sex=='female'){
             result=Math.round(447.6 + (9.2 *weight) + (3.1 *height) - (4.3 *age)*ratio);
        }else{
             result=Math.round(88.36 + (13.4 *weight) + (4.8 *height) - (5.7 *age)*ratio);
        }
        total.textContent=result;
    }
    calcTotal();

    function getStaticInformation(parentSelector,activeClass){
        const elements=document.querySelectorAll(`${parentSelector} div`);
        elements.forEach((e)=>{
            e.addEventListener('click',()=>{
                if(e.getAttribute('data-ratio')){
                    ratio=+e.getAttribute('data-ratio');
                }else{
                    sex=e.getAttribute('id');
                }
                elements.forEach((e)=>{
                    e.classList.remove(activeClass);
                });
                e.classList.add(activeClass);
                calcTotal();
            });
        });

    }

    getStaticInformation('#gender','calculating__choose-item_active');
    getStaticInformation('.calculating__choose_big','calculating__choose-item_active');

    function getDynamicInformation(selector){
        const input=document.querySelector(selector);
        input.addEventListener('input',()=>{
            switch(input.getAttribute('id')){
                case 'height':
                    height=+input.value;
                    break;
                case 'weight':
                    weight=+input.value;
                    break;
                case 'age':
                    age=+input.value;
                    break;
            }
            calcTotal();
        });
        
    }
    getDynamicInformation('#height');
    getDynamicInformation('#weight');
    getDynamicInformation('#age');
});