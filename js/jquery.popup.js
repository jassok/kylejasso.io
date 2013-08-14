(function ($) {
    "use strict";

    $.fn.popUp = function (data, noDim, callback, close) {
        var thisWidth, scrollVal;
        console.log($(this));
        var $thisPopUp = $(this);
        if (noDim) { //---- don't use browserDimmer
            $thisPopUp.html(data);
            thisWidth = $thisPopUp.outerWidth();

            scrollVal = $(window).scrollTop();

            $thisPopUp.css({
                "marginLeft": "-" + thisWidth / 2 + "px"
            }).fadeIn(function () {
                $thisPopUp.animate({
                    "top": scrollVal + "px"
                }, 500);
                // callback
                if (typeof callback == 'function') {
                    callback.call(this, data);
                }
            });
        } else { //---- use browserDimmer
            $(".browserDimmer").fadeIn(function () {
                var xout = "";
                if(close) {
                    xout = "<p class='close'>x</p>";
                }
                $thisPopUp.html(data + xout);
                thisWidth = $thisPopUp.outerWidth();

                scrollVal = $(window).scrollTop();

                $thisPopUp.css({
                    "marginLeft": "-" + thisWidth / 2 + "px"
                }).fadeIn(function () {
                    $thisPopUp.animate({
                        "top": scrollVal + "px"
                    }, 500);
                    // callback
                    if (typeof callback == 'function') {
                        callback.call(this, data);
                    }
                });
            });
        }

        
    };
})( jQuery );