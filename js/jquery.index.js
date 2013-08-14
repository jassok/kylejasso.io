function pushFooter() {
	$(".footerSpacer").height(0); //- remove .footerSpacer height for acurate calculations
	var browserHeight = $(window).height();
	var contentHeight = $("body").height();
	if (browserHeight > contentHeight) {
	var footerSpacerHeight = browserHeight-contentHeight;
	if (!$(".footerSpacer").length) { $(".footer").before("<div class='footerSpacer' />"); }
		$(".footerSpacer").height(footerSpacerHeight);
	}
}

$(function () {

	$(window).on("ready load resize", pushFooter);

});