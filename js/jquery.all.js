function pushFooter() {
    $(".footerSpacer").height(0); //- remove .footerSpacer height for acurate calculations
    var browserHeight = $(window).outerHeight();
    var contentHeight = $("body").outerHeight();
    if (browserHeight > contentHeight) {
        var footerSpacerHeight = browserHeight-contentHeight;
        if (!$(".footerSpacer").length) {
            $("footer").before("<div class='footerSpacer' />");
        }

        $(".footerSpacer").height(footerSpacerHeight);
    }
}
$(function () {
        $(window).bind("ready load resize", pushFooter);

});