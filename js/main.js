function main() {

    (function () {
        'use strict';

        ////Set Videos below header
        //$("iframe").each(function(){
        //    var ifr_source = $(this).attr('src');
        //    var wmode = "wmode=transparent";
        //    if(ifr_source.indexOf('?') != -1) {
        //        var getQString = ifr_source.split('?');
        //        var oldString = getQString[1];
        //        var newString = getQString[0];
        //        $(this).attr('src',newString+'?'+wmode+'&'+oldString);
        //    }
        //    else $(this).attr('src',ifr_source+'?'+wmode);
        //});

        $(function() {
            $(".scroll").click(function() {
                if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
                    var target = $(this.hash);
                    target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
                    if (target.length) {
                        $('html, body').animate({
                            scrollTop: target.offset().top - 67
                        }, 1000);
                        return false;
                    }
                }
            });
        });


    }());


}
main();