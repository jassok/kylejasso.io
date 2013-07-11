$.fn.popUp = function (data, noDim, callback) {

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
            $thisPopUp.html("<p class='close'><a href='#closePopUp'>X</a></p>" + data);
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

    $thisPopUp.find("a[href=#closePopUp]").on("click", function () {
        $thisPopUp.fadeOut(function () {
            $(".browserDimmer").fadeOut(function () {
                $thisPopUp.html("");
            });
        });
        return false;
    });
}