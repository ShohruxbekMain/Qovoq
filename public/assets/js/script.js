'use strict'

document.addEventListener('DOMContentLoaded', (event) => {
    const htmlElement = document.documentElement;
    const switchElement = document.getElementById('darkModeSwitch');

    // Set the default theme to dark if no setting is found in local storage
    const currentTheme = localStorage.getItem('bsTheme') || 'light';
    htmlElement.setAttribute('data-bs-theme', currentTheme);
    switchElement.checked = currentTheme === 'dark';

    switchElement.addEventListener('change', function () {
        if (this.checked) {
            htmlElement.setAttribute('data-bs-theme', 'dark');
            localStorage.setItem('bsTheme', 'dark');
        } else {
            htmlElement.setAttribute('data-bs-theme', 'light');
            localStorage.setItem('bsTheme', 'light');
        }
    });
});

/* ********************************************************** */
/* ########################################################## */
/* Voice on mode ******************************************** */
/* Modal okna zvukovoy effect uchun ************************* */
var VoiceModeStorage = localStorage.getItem("voiceModeStorage");
var voiceOn = document.querySelector(".voiceOn");
var voiceMode = document.querySelector(".voiceMode");
var timeCloseModalAlert = 100;
var voiceCheckStatus = 0;
var voiceModeControl = document.querySelector(".voiceModeControl");
var voiceSaveToggle = document.querySelector("input[id='toggleVoiceMode']");
// const voiceModeToggle = document.querySelector(".mode__voice");
// var justVoiceId = document.getElementById("voiceId");
var justVoiceClass = document.querySelector(".voiceUnique");

/* Barcha matnlarni ovozlarni ******************************* */

/* ijro etuvchi funksiyalar shuni ichida ******************** */

function activeVoice() {
    if (!voiceCheckStatus) {
        // Malum secundan keyin sahifa yangilanadi
        setInterval(() => {
            location.reload();
        }, timeCloseModalAlert);
    } else if (voiceCheckStatus) {
        // A simple IIFE function.
        // Простая функция IIFE.
        // Oddiy IIFE funktsiyasi.
        (function () {
            "use strict";
            // For the sake of practice.
            // Ради практики.
            // Amaliyot uchun.

            if (typeof speechSynthesis === 'undefined') return; // Some config stuffs...
            // Некоторые конфиги...
            // Ba'zi konfiguratsiyalar ...

            var voiceSelect = document.getElementById("voiceSelect");
            var myPhrase = ' ';
            var voices = []; // This is essentially similar to jQuery's $.ready.
            // По сути, это похоже на $.ready в jQuery.
            // Bu mohiyatan jQuery $.ready dasturiga o'xshaydi.

            var ready = function (callback) {
                var d = document,
                    s = d.readyState; // DOMContentLoaded was fired
                // DOMContentLoaded был запущен
                // DOMContentLoaded ishdan bo'shatildi

                if (s === "complete" || s === "loaded" || s === "interactive") {
                    callback();
                } else {
                    if (d.addEventListener) {
                        d.addEventListener("DOMContentLoaded", callback, false);
                    } else {
                        d.attachEvent("onDOMContentLoaded", callback);
                    }
                }
            }; // This is a function to display all possible voice options.
            // Это функция для отображения всех возможных вариантов голоса.
            // Bu barcha mumkin bo'lgan ovozli variantlarni ko'rsatish funksiyasi.


            function populateVoiceList() {
                voices = speechSynthesis.getVoices();

                for (var i = 0; i < voices.length; i++) {
                    var option = document.createElement('option');
                    option.textContent = voices[i].name + ' (' + voices[i].lang + ')';
                    option.textContent += voices[i].default ? ' -- DEFAULT' : '';
                    option.setAttribute('data-lang', voices[i].lang);
                    option.setAttribute('data-name', voices[i].name);
                    document.getElementById("voiceSelect").appendChild(option);
                }
            } // This is the handler for when the select tag is changed.
            // Это обработчик изменения тега select.
            // Bu tanlangan teg o'zgartirilganda ishlov beruvchidir.


            function handler() {
                var utterThis = new SpeechSynthesisUtterance(myPhrase);
                var selectedOption = voiceSelect.selectedOptions[0].getAttribute('data-name');

                for (var i = 0; i < voices.length; i++) {
                    if (voices[i].name === selectedOption) {
                        utterThis.voice = voices[i];
                    }
                }

                speechSynthesis.speak(utterThis);
            }

            function buildBtn(e) {
                let button = document.getElementById("voice");
                if (!getSelectionText()) {
                    button.style.display = "none";
                } else if (getSelectionText()) {
                    let x = e.pageX;
                    let y = e.pageY;
                    let justBitPlus = -20;
                    let justBitMinus = -5;
                    button.style.display = "block";
                    button.style.position = "absolute";
                    button.style.left = justBitPlus + x + "px";
                    button.style.top = justBitPlus + y + "px";
                    /*button.style.left = justBitMinus + x + "px";
                     button.style.top = justBitMinus + y + "px";*/

                    /*
                    let coor = "Coordinates: (" + x + "," + y + ")";
                    button.innerHTML = coor;
                    button.style.left = justBit + x + "px";
                    button.style.top = justBit + y + "px";
                    */
                }

            }

            function fnBrowserDetect() {
                let userAgent = navigator.userAgent;
                let browserName;
                var button = document.querySelector(".btn-voice");
                var detectBrowser = document.querySelector(".detect");

                if (userAgent.match(/chrome|chromium|crios/i)) {
                    button.addEventListener("click", () => {
                        setTimeout(function () {
                            speechSynthesis.cancel();
                            myPhrase = getSelectionText();
                            handler();
                        }, 1);
                    });
                    console.log("chrome work");
                } else if (userAgent.match(/firefox|fxios/i)) {
                    setTimeout(function () {
                        speechSynthesis.cancel();
                        myPhrase = getSelectionText();
                        handler();
                    }, 1);
                } else if (userAgent.match(/safari/i)) {
                    setTimeout(function () {
                        speechSynthesis.cancel();
                        myPhrase = getSelectionText();
                        handler();
                    }, 1);
                } else if (userAgent.match(/opr\//i)) {
                    button.addEventListener("click", () => {
                        setTimeout(function () {
                            speechSynthesis.cancel();
                            myPhrase = getSelectionText();
                            handler();
                        }, 1);
                    });
                } else if (userAgent.match(/edg/i)) {
                    button.addEventListener("click", () => {
                        setTimeout(function () {
                            speechSynthesis.cancel();
                            myPhrase = getSelectionText();
                            handler();
                        }, 1);
                    });
                } else {
                    button.addEventListener("click", () => {
                        setTimeout(function () {
                            speechSynthesis.cancel();
                            myPhrase = getSelectionText();
                            handler();
                        }, 1);
                    });
                }
            } // This is your code to get the selected text.
            // Это ваш код для получения выделенного текста.
            // Bu tanlangan matnni olish uchun sizning kodingiz.


            function getSelectionText() {
                var text = "";

                if (window.getSelection) {
                    text = window.getSelection().toString().trim(); // for Internet Explorer 8 and below. For Blogger, you should use &amp;&amp; instead of &&.
                    // для Internet Explorer 8 и ниже. Для Blogger следует использовать &amp;&amp; вместо &&.
                    // Internet Explorer 8 va undan past versiyalar uchun. Blogger uchun siz &amp;&amp;amp;amp;amp; ning o'rniga &&.
                } else if (document.selection && document.selection.type !== "Control") {
                    text = document.selection.createRange().text;
                }

                return text;
            } // This is the on mouse up event, no need for jQuery to do this.
            // Это событие при наведении мыши, для этого не требуется jQuery.
            // Bu sichqonchani yuqoriga ko'tarish hodisasi, buni amalga oshirish uchun jQuery kerak emas.


            document.onmouseup = function (e) {
                fnBrowserDetect();
                buildBtn(e);
            }; // Some place for the application to start.
            // Некоторое место для запуска приложения.
            // Ilovani boshlash uchun ba'zi joy.


            function start() {
                populateVoiceList();
                if (speechSynthesis.onvoiceschanged !== undefined) speechSynthesis.onvoiceschanged = populateVoiceList;
                voiceSelect.onchange = handler;
                setTimeout(handler, 75);
            } // Run the start function.
            // Запускаем функцию запуска.
            // Boshlash funksiyasini ishga tushiring.

            ready(start);


        })();
    }
}
const enableVoiceMode = () => {
    voiceOn.classList.add("active");
    voiceModeControl.classList.add("active");
    voiceSaveToggle.setAttribute("checked", "true");
    voiceSaveToggle.classList.add('active');
    voiceCheckStatus = 1;
    activeVoice();
    localStorage.setItem("voiceModeStorage", "enabled");
};

const DisableAllSound = () => {
    voiceModeControl.innerHTML = "";
    justVoiceClass.classList.add("d-none", "visibility-hidden", "user-select");
    /*document.getElementById("voice").innerHTML = "";*/
}

const EnableAllSound = () => {
    justVoiceClass.classList.remove("d-none", "visibility-hidden", "user-select");
}

const disableVoiceMode = () => {
    voiceOn.classList.remove("active");
    voiceModeControl.classList.remove("active");
    voiceSaveToggle.setAttribute("checked", "false");
    voiceSaveToggle.classList.remove('active');
    voiceCheckStatus = 0;
    localStorage.setItem("voiceModeStorage", null);
};

if (VoiceModeStorage === "enabled") {
    enableVoiceMode();
    EnableAllSound();
}
/*if ($("input[id='toggleVoiceMode']").length) {}*/
voiceSaveToggle.addEventListener("click", () => {

    console.log("VoiceON Clicked")
    console.log(voiceCheckStatus);

    if (!voiceCheckStatus) {
        enableVoiceMode();
        EnableAllSound();

        $.notify({
            // options
            icon: 'bx bx-volume-full bx-sm',
            title: 'Ovozli rejmda o’qish',
            message: 'Siz matnni ovozli rejimda o’qishni yoqdingiz, kerakli matnni belgilang va paydo bo’lgan tugmachani bosing !',
            // url: 'https://github.com/mouse0270/bootstrap-notify',
            // target: '_blank'
        }, {
            // settings
            element: 'body',
            // position: null,
            type: "info",
            // allow_dismiss: true,
            // newest_on_top: false,
            showProgressbar: false,
            placement: {
                from: "top",
                align: "right"
            },
            offset: 20,
            spacing: 10,
            z_index: 9999,
            delay: 3500,
            timer: 1000,
            url_target: '_blank',
            mouse_over: null,
            animate: {
                enter: 'animated fadeInDown shadow border-white  bg-primary text-white',
                exit: 'animated fadeOutRight'
            },
            onShow: null,
            onShown: null,
            onClose: null,
            onClosed: null,
            icon_type: 'class',
            // template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
            //     '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
            //     '<span data-notify="icon"></span> ' +
            //     '<span data-notify="title">{1}</span> ' +
            //     '<span data-notify="message">{2}</span>' +
            //     '<div class="progress" data-notify="progressbar">' +
            //     '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
            //     '</div>' +
            //     '<a href="{3}" target="{4}" data-notify="url"></a>' +
            //     '</div>'
        });
    } else {
        disableVoiceMode();
        DisableAllSound();

        $.notify({
            // options
            icon: 'bx bx-volume-mute bx-sm',
            title: 'Ovozli rejmda o’qish',
            message: 'Siz matnni ovozli rejimda o’qishni o’chirdingiz !',
            // url: 'https://github.com/mouse0270/bootstrap-notify',
            // target: '_blank'
        }, {
            // settings
            element: 'body',
            // position: null,
            type: "info",
            // allow_dismiss: true,
            // newest_on_top: false,
            showProgressbar: false,
            placement: {
                from: "top",
                align: "right"
            },
            offset: 20,
            spacing: 10,
            z_index: 9999,
            delay: 3500,
            timer: 1000,
            url_target: '_blank',
            mouse_over: null,
            animate: {
                enter: 'animated fadeInDown shadow border-white bg-primary text-white',
                exit: 'animated fadeOutRight'
            },
            onShow: null,
            onShown: null,
            onClose: null,
            onClosed: null,
            icon_type: 'class',
            // template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
            //     '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
            //     '<span data-notify="icon"></span> ' +
            //     '<span data-notify="title">{1}</span> ' +
            //     '<span data-notify="message">{2}</span>' +
            //     '<div class="progress" data-notify="progressbar">' +
            //     '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
            //     '</div>' +
            //     '<a href="{3}" target="{4}" data-notify="url"></a>' +
            //     '</div>'
        });
    }
});

/* ********************************************************** */
/* ########################################################## */
/*  ************************* */
/*=============== PLUS TOGGLE SIZE INCREMENT OR DECREMENT ===============*/
let plusMode = localStorage.getItem("plusMode");
const plusModeToggle = document.querySelector(".mode__plus");
/*let plusSvgNone = document.querySelectorAll(".plus-svg-none");*/
let plusSaveToggle = document.querySelector(".plusMode input[id='plusBtn']");
let plusTagBody = document.querySelector(".plus-tag-body");
// let socialPosition = document.querySelector('.social-position');
let widthRightNow = window.innerWidth;
let descTopWidth = 1024;

const enablePlusMode = () => {
    plusModeToggle.classList.add("active");
    plusTagBody.classList.add("active");
    plusSaveToggle.setAttribute("checked", "true");
    // socialPosition.classList.add("active");

    // for (let i = 0; i < svgNone.length; i++) {
    //     const element = svgNone[i];
    //     element.style.display = "none";
    // }
    localStorage.setItem("plusMode", "enabled");
};

const disablePlusMode = () => {
    plusModeToggle.classList.remove("active");
    plusTagBody.classList.remove("active");
    plusSaveToggle.setAttribute("checked", "false");
    // socialPosition.classList.remove("active");

    /*    for (let i = 0; i < svgNone.length; i++) {
            const element = svgNone[i];
            element.style.display = "block";
        }*/

    localStorage.setItem("plusMode", null);
};

if (plusMode === 'enabled') {
    enablePlusMode();
}

if ((widthRightNow >= descTopWidth) && (plusMode === null)) {
    enablePlusMode();
}

plusModeToggle.addEventListener("click", () => {

    plusMode = localStorage.getItem("plusMode");

    if (plusMode !== 'enabled') {

        enablePlusMode();

    } else {

        disablePlusMode();

    }
});

$(document).ready(function () {
    let plus5Max = '22px';
    let minus5Min = '16px';
    let decrease = document.querySelector(".decremet");
    let increase = document.querySelector(".increment");
    let autoSizeInvisible = document.querySelector(".autoSizeInvisible");
    let currentSize = document.getElementById("currentSize");
    var curFontSize = localStorage["FontSize"];
    var multipleTextBefore = 'Saytda font o\'lchovi';
    var multipleBefore = '<span class="bg-white text-primary p-1 mx-2 rounded-3 d-flex align-items-center justify-content-center" style="width: 37px; height: 37px;font-size: 16px;">' + '1x' + '</span>';
    var multipleTextAfter = 'karra kattalashtirildi';
    if (curFontSize) {
        //set to previously saved fontsize if available
        $('.dataFont').css('font-size', curFontSize);


        if (curFontSize === '16px') {
            multipleTextAfter = ' dastlabki holatga qaytarildi!';
            multipleBefore = '1x';
        }
        if (curFontSize === '17px') {
            // multiple = '1.0625x';
            multipleBefore = '1.1x';
        }
        if (curFontSize === '18px') {
            // multiple = '1.125x';
            multipleBefore = '1.2x';
        }
        if (curFontSize === '19px') {
            // multiple = '1.1875x';
            multipleBefore = '1.3x';
        }
        if (curFontSize === '20px') {
            // multiple = '1.25x';
            multipleBefore = '1.4x';
        }
        if (curFontSize === '21px') {
            // multiple = '1.3125x';
            multipleBefore = '1.5x';
        }
        if (curFontSize === '22px') {
            // multiple = '1.375x';
            multipleBefore = '1.6x';
        }
        currentSize.innerHTML = '<span class="bg-white text-primary p-1 mx-2 rounded-3 d-flex align-items-center justify-content-center" style="width: 37px; height: 37px; font-size: 16px;">' + multipleBefore + '</span>';
        // currentSize.innerHTML = ' <span class="bg-white text-primary p-1 mx-2 rounded-3">' + multiple + '</span> ';
        if (curFontSize === '22px') {
            increase.classList.add('active-last');
            increase.classList.add('visibile-hide');
            decrease.classList.remove('active-last');
            decrease.classList.add('visibile');
            autoSizeInvisible.classList.add('visibile');


        } else if (curFontSize === '16px') {
            decrease.classList.remove('active-last');
            decrease.classList.remove('visibile');
            autoSizeInvisible.classList.remove('visibile');
        } else {
            decrease.classList.add('active-last');
            decrease.classList.add('visibile');
            autoSizeInvisible.classList.add('visibile');

        }

    }
    $(".increaseFont,.decreaseFont,.resetFont").click(function () {
        var type = $(this).val();
        curFontSize = $('.dataFont').css('font-size');
        if (type === 'increase') {
            decrease.classList.remove('active-last');
            decrease.classList.add('visibile');

            autoSizeInvisible.classList.add('visibile');

            if (curFontSize !== plus5Max) {
                $('.dataFont').css('font-size', parseInt(curFontSize) + 1 + "px");
                curFontSize = parseInt(curFontSize) + 1 + "px";
                if (curFontSize === plus5Max) {
                    increase.classList.add('active-last');
                    increase.classList.add('visibile-hide');
                    autoSizeInvisible.classList.add('visibile');
                }
            } else {
                increase.classList.add('active-last');
                increase.classList.add('visibile-hide');
                autoSizeInvisible.classList.add('visibile');
            }
        } else if (type === 'decrease') {
            increase.classList.remove('active-last');
            increase.classList.remove('visibile-hide');

            if (curFontSize !== minus5Min) {
                $('.dataFont').css('font-size', parseInt(curFontSize) - 1 + "px");
                curFontSize = parseInt(curFontSize) - 1 + "px";
                if (curFontSize === minus5Min) {
                    autoSizeInvisible.classList.remove('visibile');
                    decrease.classList.add('active-last');
                    decrease.classList.remove('visibile');
                }

            } else {
                decrease.classList.add('active-last');
                decrease.classList.remove('visibile');

            }
        } else if (type === 'resetFont') {
            decrease.classList.remove('active-last');
            decrease.classList.remove('visibile');
            increase.classList.remove('active-last');
            increase.classList.remove('visibile-hide');
            autoSizeInvisible.classList.remove('visibile');

            $('.dataFont').css('font-size', "16px");
            curFontSize = "16px";
        }

        localStorage.setItem('FontSize', curFontSize);

        var multipleTextBefore = 'Saytda font o\'lchovi';
        var multiple = '16px';
        var multipleTextAfter = 'karra kattalashtirildi';

        if (curFontSize === '16px') {
            multipleTextAfter = ' dastlabki holatga qaytarildi!';
            multiple = '1x';
        }
        if (curFontSize === '17px') {
            // multiple = '1.0625x';
            multiple = '1.1x';
        }
        if (curFontSize === '18px') {
            // multiple = '1.125x';
            multiple = '1.2x';
        }
        if (curFontSize === '19px') {
            // multiple = '1.1875x';
            multiple = '1.3x';
        }
        if (curFontSize === '20px') {
            // multiple = '1.25x';
            multiple = '1.4x';
        }
        if (curFontSize === '21px') {
            // multiple = '1.3125x';
            multiple = '1.5x';
        }
        if (curFontSize === '22px') {
            // multiple = '1.375x';
            multiple = '1.6x';
        }
        // currentSize.innerText = curFontSize;
        currentSize.innerHTML = ' <span class="bg-white text-primary p-1 mx-2 rounded-3  d-flex align-items-center justify-content-center" style="width: 37px; height: 37px;font-size: 16px;">' + multiple + '</span> ';
        $.notify({
            // options
            icon: 'bx bx-font-size bx-sm',
            title: 'Font o\'lchovi',
            message: multipleTextBefore + ' ' + ' <span class="bg-white text-primary p-2 mx-2 rounded-3 d-flex align-items-center justify-content-center" style="width: 37px; height: 37px;font-size: 16px;">' + multiple + '</span> ' + ' ' + multipleTextAfter, //curFontSize
            // message: 'Sayda kunduzgi rejim ishga tushdi !',
            // url: 'https://github.com/mouse0270/bootstrap-notify',
            // target: '_blank'
        }, {
            // settings
            element: 'body',
            // position: null,
            type: "info",
            // allow_dismiss: true,
            // newest_on_top: false,
            showProgressbar: false,
            placement: {
                from: "top",
                align: "right"
            },
            offset: 20,
            spacing: 10,
            z_index: 9999,
            delay: 2000,
            timer: 1000,
            url_target: '_blank',
            mouse_over: null,
            animate: {
                enter: 'animated fadeInDown shadow border-white  bg-primary text-white',
                exit: 'animated fadeOutRight'
            },
            onShow: null,
            onShown: null,
            onClose: null,
            onClosed: null,
            icon_type: 'class',
            // template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
            //     '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
            //     '<span data-notify="icon"></span> ' +
            //     '<span data-notify="title">{1}</span> ' +
            //     '<span data-notify="message">{2}</span>' +
            //     '<div class="progress" data-notify="progressbar">' +
            //     '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
            //     '</div>' +
            //     '<a href="{3}" target="{4}" data-notify="url"></a>' +
            //     '</div>'
        });
    });
});
// For Dark Light mode//
const saveSwitch = document.querySelector(".dark-mode-switch input[type='checkbox']");
const darkModeSwitch = document.querySelector(".dark__mode__theme");
const enableDarkModeSwitch = () => {
    darkModeSwitch.classList.add("active");
    saveSwitch.setAttribute("checked", "true");
};
const disableDarkModeSwitch = () => {
    darkModeSwitch.classList.remove("active");
    saveSwitch.setAttribute("checked", "false");
};
// For Dark Light mode//
let darkModeStorage = localStorage.getItem("darkModeStorage");
const darkModeToggle = document.querySelector(".mode__theme");
let svgNone = document.querySelectorAll(".svg-none");
let saveToggle = document.querySelector(".darkmode input[type='checkbox']");
let body = document.body;

const enableDarkMode = () => {
    document.documentElement.classList.add("blind");
    body.classList.add("blind");
    darkModeToggle.classList.add("active");
    saveToggle.setAttribute("checked", "true");

    for (let i = 0; i < svgNone.length; i++) {
        const element = svgNone[i];
        element.style.display = "none";
    }

    localStorage.setItem("darkModeStorage", "enabled");
};

const disableDarkMode = () => {
    document.documentElement.classList.remove("blind");
    body.classList.remove("blind");
    darkModeToggle.classList.remove("active");
    saveToggle.setAttribute("checked", "false");

    for (let i = 0; i < svgNone.length; i++) {
        const element = svgNone[i];
        element.style.display = "block";
    }

    localStorage.setItem("darkModeStorage", null);
};

if (darkModeStorage === 'enabled') {
    enableDarkMode();
}

function disableScroll() {
    // Get the current page scroll position
    scrollTop = window.pageYOffset || document.documentElement.scrollTop;
    scrollLeft = window.pageXOffset || document.documentElement.scrollLeft,

        // if any scroll is attempted, set this to the previous value
        window.onscroll = function () {
            window.scrollTo(scrollLeft, scrollTop);
        };
}

function enableScroll() {
    window.onscroll = function () {
    };
}

darkModeToggle.addEventListener("click", () => {
    darkModeStorage = localStorage.getItem("darkModeStorage");

    if (darkModeStorage !== 'enabled') {
        enableDarkMode();
        $.notify({
            // options
            icon: 'bx bx-moon bx-sm',
            title: 'Tungi rejim yoqildi',
            message: 'Sayda tungi rejim ishga tushdi !',
            // url: 'https://github.com/mouse0270/bootstrap-notify',
            // target: '_blank'
        }, {
            // settings
            element: 'body',
            // position: null,
            type: "info",
            // allow_dismiss: true,
            // newest_on_top: false,
            showProgressbar: false,
            placement: {
                from: "top",
                align: "right"
            },
            offset: 20,
            spacing: 10,
            z_index: 9999,
            delay: 3500,
            timer: 1000,
            url_target: '_blank',
            mouse_over: null,
            animate: {
                enter: 'animated fadeInDown shadow border-white  bg-primary text-white',
                exit: 'animated fadeOutRight'
            },
            onShow: null,
            onShown: null,
            onClose: null,
            onClosed: null,
            icon_type: 'class',
            // template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
            //     '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
            //     '<span data-notify="icon"></span> ' +
            //     '<span data-notify="title">{1}</span> ' +
            //     '<span data-notify="message">{2}</span>' +
            //     '<div class="progress" data-notify="progressbar">' +
            //     '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
            //     '</div>' +
            //     '<a href="{3}" target="{4}" data-notify="url"></a>' +
            //     '</div>'
        });
        /*disableScroll();*/
    } else {
        disableDarkMode();
        $.notify({
            // options
            icon: 'bx bx-sun bx-sm',
            title: 'Kunduzgi rejim yoqildi',
            message: 'Sayda kunduzgi rejim ishga tushdi !',
            // url: 'https://github.com/mouse0270/bootstrap-notify',
            // target: '_blank'
        }, {
            // settings
            element: 'body',
            // position: null,
            type: "info",
            // allow_dismiss: true,
            // newest_on_top: false,
            showProgressbar: false,
            placement: {
                from: "top",
                align: "right"
            },
            offset: 20,
            spacing: 10,
            z_index: 9999,
            delay: 3500,
            timer: 1000,
            url_target: '_blank',
            mouse_over: null,
            animate: {
                enter: 'animated fadeInDown shadow border-white bg-primary text-white',
                exit: 'animated fadeOutRight'
            },
            onShow: null,
            onShown: null,
            onClose: null,
            onClosed: null,
            icon_type: 'class',
            // template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
            //     '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
            //     '<span data-notify="icon"></span> ' +
            //     '<span data-notify="title">{1}</span> ' +
            //     '<span data-notify="message">{2}</span>' +
            //     '<div class="progress" data-notify="progressbar">' +
            //     '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
            //     '</div>' +
            //     '<a href="{3}" target="{4}" data-notify="url"></a>' +
            //     '</div>'
        });
    }
});

/*=============== SCROLL UP ===============*/
if ($("#scroll-up").length) {
    function scrollUp() {
        const scrollUp = document.getElementById('scroll-up');
        // When the scroll is higher than 350 viewport height, add the show-scroll class to the a tag with the scroll-top class
        if (this.scrollY >= 350) scrollUp.classList.add('show-scroll');
        else scrollUp.classList.remove('show-scroll')
    }

    window.addEventListener('scroll', scrollUp)
}