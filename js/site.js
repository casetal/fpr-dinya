var ieold = '0';





$(function () {



    // first time post width/heigth to server

    // refresh page with opt viewport

    var wsurl = '/umbraco/Surface/HomeSurface/WindSize';

    //alert(wsurl);





    if (0 == "1") {

        //alert("hide");

        var ww = $(window).width();

        var wh = $(window).height();



        $.post(wsurl

            , { w: ww, h: wh }

            , function (data) {

                window.location.reload(true);

                //if (data.nr == true) {

                //    window.location.reload(true);

                //}

            });

    }

    else {

        //alert("show");

        $(".xhidden").removeClass("xhidden");

    }





    var array = ["Playstation Network PSN US 10$ USD", "Apex Legends 6700 Coins 60€ PS4", "Playstation Network PSN CH 40 CHF", "Playstation Network PSN FI 50€", "Xbox Live Gold Mitgliedschaft Membership 3 Monate Month", "Apple iTunes Store 15$ Dollar USD ", "Playstation Plus FI 12 Kuukautta Months", "Amazon 20£ GBP", "Amazon 15€ ES", "Playstation Network PSN ES 25€", "Amazon 10€ ES", "Xbox Live 10$ USD", "Playstation Network PSN UK 40£", "Playstation Network PSN ES 10€", "CashCard Der Weiße Hai 1.250.000 GTA Dollar PS4", "Microsoft Windows Store 25€", "Amazon 100€", "Playstation Network PSN RU 2500 Rubel", "Apple iTunes Store 25€ Euro AT", "Zalando 10€", "Amazon 5€ ES", "Amazon 20€ ES", "Nintendo eShop 25€", "Playstation Network PSN AT 40€", "Playstation Plus IT 3 Mesi Months", "Apex Legends 4350 Coins 40€ PS4", "Google Play 15€ Euro", "Amazon 10$ USD", "Final Fantasy XIV - A Realm Reborn 60 Days Game Time Card", "Wunschgutschein 15€", "Nintendo eShop 35€", "Congstar Prepaid 30€", "Fonic Prepaid 20€", "Origin EA 15€", "Playstation Network PSN DE 50€", "Apex Legends 11500 Coins 100€ PS4", "Amazon 25€ ES", "Playstation Network PSN DE 10€", "E-Plus Prepaid 30€", "Playstation Network PSN BE 20€", "Playstation Network PSN AT 30€", "Playstation Network PSN NL 10€", "E-Plus Prepaid 15€", "Otelo Prepaid 9€", "Playstation Plus PT 12 Meses Months", "T-Mobile Prepaid 15€", "Otelo Prepaid 19€", "Playstation Plus UK 3 Months", "Amazon 10£ GBP", "Amazon 50€ ES", "Playstation Network PSN ES 40€", "Playstation Network PSN AT 100€", "Lebara Prepaid 20€", "Xbox Live 25€", "Playstation Network PSN DE 75€", "New Super Mario Bros. U", "Amazon 100€ ES", "Fortnite 2.500 V-Bucks plus 300 Bonus (PS4 DE) - 25€ PlayStation Guthaben", "Congstar Prepaid 15€", "Lebara Prepaid 15€", "Fortnite 6.000 V-Bucks plus 1.500 Bonus (PS4 DE) - 60€ PlayStation Guthaben", "Dazn Mitgliedschaft 1 Monat 9,99€", "Xbox Live 75€", "Playstation Network PSN DE 30€", "Playstation Network PSN FI 20€", "Nintendo Switch Online 3 Monate Months 9,99", "Fortnite 10.000 V-Bucks plus 3.500 Bonus (PS4 AT) - 100€ PlayStation Guthaben", "Playstation Network PSN AT 20€", "Playstation Plus RU 3 Mesyatsy Months", "Playstation Network PSN UK 50£", "Vodafone CallYa Prepaid 15€", "Xbox Live 10€", "League of Legends LoL Card 20€ Euro 2800 Riot Points", "Fortnite 4.000 V-Bucks plus 1.000 Bonus (PS4 DE) - 40€ PlayStation Guthaben", "Playstation Network PSN PT 50€", "Spotify 30€", "Playstation Plus DE 12 Monate Months", "Playstation Plus FR 12 Mois Months", "Playstation Plus CH 3 Monate Months", "Pokemon Go Account Level 20", "Playstation Plus FI 3 Kuukautta Months", "Guild Wars 2 Gem Card 2000 Gems", "Playstation Network PSN FR 20€", "Playstation Network PSN ES 35€", "O2 Prepaid 15€", "Minecraft 23,95€", "Apple iTunes Store 50$ Dollar USD ", "Zalando 50€", "Xbox Live 50€", "Playstation Network PSN RU 4000 Rubel", "Amazon 5£ GBP", "Amazon 25€", "Fortnite 10.000 V-Bucks plus 3.500 Bonus (PS4 DE) - 100€ PlayStation Guthaben", "HD Plus 12 Monate 70€", "Playstation Network PSN CH 10 CHF", "Playstation Plus US 12 Months", "Playstation Network PSN CH 20 CHF", "Fortnite 4.000 V-Bucks plus 1.000 Bonus (Xbox) - 40€ Xbox Live Guthaben", "Playstation Network PSN NL 20€", "Playstation Plus CH 12 Monate Months", "Fonic Prepaid 30€", "World of Warcraft WoW Gamecard 60 Days", "Playstation Plus IT 12 Mesi Months", "Zalando 25€", "Playstation Network PSN ES 15€", "WildStar 60 Days Game Time Card", "VGO PSN Gewinnspielticket", "Apple iTunes Store 15€ Euro AT", "Playstation Network PSN RU 1000 Rubel", "Amazon 10€ FR", "Apple iTunes Store 50€ Euro AT", "Amazon 5€ FR", "Nintendo eShop 10$", "Pokemon Go Account Level 30", "Zalando 5€", "Fortnite 1.000 V-Bucks (PS4 AT) - 10€ PlayStation Guthaben", "NCsoft NCoin Card Karte 25€ Euro", "Lebara Prepaid 10€", "Apex Legends 2150 Coins 20€ PS4", "Playstation Plus RU 12 Mesyatsy Months", "Playstation Network PSN DE 35€", "Amazon 15€ FR", "Nintendo eShop 20$", "Nintendo eShop 15€", "Lycamobile Prepaid 20€", "Amazon 20€", "Playstation Plus DE 1 Monat Month", "Amazon 20€ FR", "Origin EA 30€", "Microsoft Office 2019 Home \u0026 Student ", "Steam 50€", "Vodafone CallYa Prepaid 25€", "Playstation Network PSN ES 30€", "Wunschgutschein 25€", "Playstation Network PSN DE 20€", "Playstation Network PSN AT 50€", "Xbox Live Gold Mitgliedschaft Membership 12 Monate Month", "Fortnite 4.000 V-Bucks plus 1.000 Bonus (PS4 AT) - 40€ PlayStation Guthaben", "Xbox Live 15$ USD", "Kaspersky Internet Security 2019", "Playstation Network PSN BE 50€", "Playstation Network PSN DE 25€", "Battle.net 50€", "Playstation Network PSN ES 50€", "Playstation Plus ES 3 Meses Months", "Apple iTunes Store 25$ Dollar USD ", "Xbox Live Gold Mitgliedschaft Membership 1 Monat Month", "Playstation Network PSN PT 20€", "Playstation Plus PT 3 Meses Months", "Blau.de Prepaid 15€", "Playstation Plus US 3 Months", "Amazon 25€ FR", "Apple iTunes Store 50€ Euro DE", "Playstation Network PSN CH 30 CHF", "League of Legends LoL Card 10€ Euro 1380 Riot Points", "Playstation Network PSN ES 20€", "T-Mobile Prepaid 30€", "Playstation Plus AT 12 Monate Months", "Microsoft Office 2019 Professional Plus", "Apple iTunes Store 15€ Euro DE", "Nintendo eShop 35$", "Microsoft Office 2019 Home \u0026 Business ", "Amazon 50€ FR", "Kaspersky Total Security Multi Device 2019", "Amazon 15£ GBP", "Playstation Plus ES 12 Meses Months", "Playstation Network PSN IT 20€", "League of Legends LoL Card 50$ Dollar Riot Points", "Playstation Plus DE 3 Monate Months", "Playstation Network PSN US 50$ USD", "Kaspersky Anti-Virus 2019", "Bigpoint Card 15 Euro ", "Amazon 50$ USD", "Amazon 15€", "Lycamobile Prepaid 10€", "League of Legends LoL Card 25$ Dollar Riot Points", "Playstation Network PSN AT 25€", "Playstation Network PSN CH 25 CHF", "Google Play 25€ Euro", "Microsoft Windows 10 Home", "Amazon 100€ FR", "Amazon 25$ USD", "Playstation Network PSN DE 15€", "Xbox Live 50$ USD", "Microsoft Windows Store 15€", "Amazon 10€ IT", "Steam 10€", "Netflix 25€", "Fortnite 1.000 V-Bucks (Xbox) - 10€ Xbox Live Guthaben", "Fortnite 2.500 V-Bucks plus 300 Bonus (Xbox) - 25€ Xbox Live Guthaben", "Playstation Network PSN DE 40€", "Playstation Network PSN UK 15£", "Amazon 5€ IT", "Fortnite 1.000 V-Bucks (PS4 DE) - 10€ PlayStation Guthaben", "Simyo Prepaid 15€", "Steam 20€", "Spotify 60€", "Netflix 15€", "Xbox Live 15€", "O2 Prepaid 20€", "Spotify 10€", "E-Plus Prepaid 20€", "Playstation Plus FR 3 Mois Months", "Amazon 100$ USD", "Playstation Network PSN AT 5€", "Amazon 15€ IT", "CashCard Tigerhai 200.000 GTA Dollar PS4", "Playstation Network PSN US 20$ USD", "Amazon 5€", "Amazon 10€", "Playstation Network PSN AT 35€", "Fortnite 6.000 V-Bucks plus 1.500 Bonus (PS4 AT) - 60€ PlayStation Guthaben", "Amazon 50€", "Fortnite 6.000 V-Bucks plus 1.500 Bonus (Xbox) - 60€ Xbox Live Guthaben", "Lebara Prepaid 30€", "Playstation Network PSN CH 35 CHF", "CashCard Megalodon 8.000.000 GTA Dollar PS4", "Apple iTunes Store 25€ Euro DE", "Playstation Network PSN UK 45£", "Klarmobil Prepaid 15€", "Playstation Network PSN IT 35€", "Playstation Network PSN FR 50€", "O2 Prepaid 30€", "Playstation Plus AT 3 Monate Months", "CashCard Bullenhai 500.000 GTA Dollar PS4", "Amazon 20€ IT", "Microsoft Windows 10 Professional", "Microsoft Windows Store 50€", "Playstation Plus UK 12 Months", "Xbox Live 25$ USD", "Battle.net 20€", "Playstation Network PSN CH 50 CHF", "Fortnite 2.500 V-Bucks plus 300 Bonus (PS4 AT) - 25€ PlayStation Guthaben", "Nintendo eShop 50€", "Amazon 25€ IT", "Xbox Live 30€", "Apex Legends 1000 Coins 10€ PS4", "Fortnite 10.000 V-Bucks plus 3.500 Bonus (Xbox) - 100€ Xbox Live Guthaben", "Nintendo eShop 50$", "Wunschgutschein 50€", "Google Play 50€ Euro", "Playstation Network PSN DE 100€", "Playstation Network PSN NL 50€", "Amazon 50€ IT", "Amazon 25£ GBP", "CashCard Walhai 3.500.000 GTA Dollar PS4", "Otelo Prepaid 29€", "Playstation Network PSN AT 10€", "Microsoft Office 2019 Mac Home \u0026 Business", "Xbox Live 20€", "Amazon 100€ IT", "Nintendo Switch Online 12 Monate Months 24,99", "Pokemon Go Account Level 25"];



    /*

    $("#srch").autocomplete({

        source: array,

        select: function (a, b) {

            //alert(b.item.value);

            $("#srch").val(b.item.value);

            $("#from").val("sel");

            $("#srch_form").submit()

        }

    });

    */



    if (ieold === "0") {

        function mobilecheck() {

            var check = false;

            (function (a) { if (/(android|ipad|playbook|silk|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(a) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0, 4))) check = true })(navigator.userAgent || navigator.vendor || window.opera);

            return check;

        }



        var ended = false;

        // var support = { animations: Modernizr.cssanimations };

        var animEndEventNames = { 'WebkitAnimation': 'webkitAnimationEnd', 'OAnimation': 'oAnimationEnd', 'animation': 'animationend' };

        // var animEndEventName = animEndEventNames[Modernizr.prefixed('animation')];



        //var etest = document.getElementById("logobtn");

        //etest.addEventListener("animationend", function () {

        //    alert("Ping");

        //}/*, false*/);



        var eventtype = mobilecheck() ? 'touchstart' : 'click';



        [].slice.call(document.querySelectorAll('.cbutton')).forEach(function (el) {

            el.addEventListener(eventtype, function (evt) {

                classie.add(el, 'cbutton--click');

                setTimeout(function () {

                    if (!ended) {

                        this.removeEventListener(animEndEventName, onEndCallbackFn);

                        classie.remove(el, 'cbutton--click');

                        var hurl = '/en';

                        document.location = hurl;

                    }

                }, 400);



                var onEndCallbackFn = function (ev) {

                    ended = true;

                    if (support.animations) {

                        if (ev.target != this) {

                            return;

                        }

                        this.removeEventListener(animEndEventName, onEndCallbackFn);

                    }

                    classie.remove(el, 'cbutton--click');

                    var hurl = '/en';

                    document.location = hurl;



                };



                if (support.animations) {

                    //animEndEventName = "MSAnimationEnd";

                    if (el.addEventListener)

                        el.addEventListener(animEndEventName, onEndCallbackFn);

                    else

                        el.attachEvent(animEndEventName, onEndCallbackFn);

                    //var xtest = document.getElementById("logobtn");

                    //xtest.addEventListener("animationend", function () {

                    //    alert("Ping");

                    //});

                }

                else {

                    //alert("no.support.animations:");

                    onEndCallbackFn();

                }

            });

        });

    }



    var width = 0;



    $(document).on('click', '.dropdown-menu', function (e) {

        // alert('test');



        e.stopPropagation();

    });

    if (window.innerWidth > 0) {

        width = window.innerWidth

    } else {

        width = screen.width;

    }

    if (width > 768) {

        $(document).ready(function () {

            jQuery(document).ready(function () {

                $(".dropdown-toggle").click(

                    function () {

                        $(this).next().stop().fadeIn("fast");

                        $(this).addClass('active');

                    },

                    function () {

                        $('.dropdown-menu', this).stop().fadeOut("fast");

                        $(this).removeClass('active');

                    });

            });

        });

    }




    // sessview dialog-----------------------------------------

    // $("#sessviewdialog").dialog({

    //     autoOpen: false,

    //     modal: true,

    //     height: 400,

    //     width: 700

    // });

    // $("#sessviewdialogopener").click(function () {

    //     $("#sessviewdialog").dialog("open");

    // });



    // // userview dialog-----------------------------------------

    // $("#userviewdialog").dialog({

    //     autoOpen: false,

    //     modal: true,

    //     cache: false,

    //     height: 400,

    //     width: 700

    // });

    // $("#userviewdialogopener").click(function () {

    //     $("#userviewdialog").dialog("open");

    // });



});





/*

    maxmind_user_id = "106111";

    (function() {

        var loadDeviceJs = function() {

            var element = document.createElement('script');

            element.src = ('https:' == document.location.protocol ? 'https:' : 'http:')

              + '//device.maxmind.com/js/device.js';

            document.body.appendChild(element);

        };

        if (window.addEventListener) {

            window.addEventListener('load', loadDeviceJs, false);

        } else if (window.attachEvent) {

            window.attachEvent('onload', loadDeviceJs);

        }

    })();

*/





$(function () {

    'use strict';



    // autotest-----------------

    $(window).bind("load", function () {



        var ate = '0';

        var ctr = 'Home';

        var step = 1;



        if (ate === "1") {

            var iid = window.setInterval(function () {

                //alert(ctr + step);

                var url = '/umbraco/Surface/traceSurface/AutoTest'

                    + "?site=" + ctr + "&step=" + step;

                if (autoTest(url) === "stop")

                    window.clearInterval(iid);

                step = step + 1;

            }, 10000);

        }

    });



    // // swipe support 4 carousel

    // $("#myCarousel").swiperight(function () {

    //     $(this).carousel('prev');

    // });

    // $("#myCarousel").swipeleft(function () {

    //     $(this).carousel('next');

    // });



    // // Site

    // var theMQurl = null;

    // Index.run(theMQurl);



});