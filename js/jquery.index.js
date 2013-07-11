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

	$(window).load(function () {
		$('.bwWrapper').BlackAndWhite({
			hoverEffect : true,
			webworkerPatch : false,
			responsive : true,
			invertHoverEffect : false,
			speed : {
				fadeIn : 200,
				fadeOut : 800
			},
			onImageReady : function(img) {

			}
		});

		var $command = $('input[name="command"]');

		$command.focus();
		var lineInput, commmand, options, project, path;

		path = "S:\\KyleJasso.io>";

		$(document).keypress(function(e) {
			if($command.is(':focus')) {
		    	if(e.which == 13) {
		    		cleanInput = $command.val();
			        lineInput = cleanInput.split(" ");

			        for(var i = 0; i < lineInput.length; i++) {
			        	switch (i) {
			        		case 0:
			        			command = lineInput[i];
			        			break;
			        		case 1:
			        			if(lineInput[i].indexOf('-') >=0) {
			        				options = lineInput[i];
			        			} else {
			        				project = lineInput[i];
			        			}
			        			break;
			        		case 2:
			        			if(!project) {
			        				project = lineInput[i];
			        			}
			        			break;
			        	}
			        }

			        $('.body').append('<p>'+path + ' ' + cleanInput +'</p>');

			        // Ajax command
			        try {
				        $.ajax({
							type: "POST",
							url: "class.command.php",
							data: { cmd:command, opt:options, proj:project }
						}).done(function( msg ) {

							if(msg == 'clear') {
								$('.body').html('');
							} else {
								$('.body').append(msg);

								$(".body").scrollTop($(".body")[0].scrollHeight);
							}
						});
					} catch (e) {
						$('.body').append('<p>An error has occoured with command.');
					}



			        $command.val('');

		    	}
		    }
		});
	});

	$('.mini').click(function () {
		if($('.body').is(':visible')) {
			$('.body').slideUp();
			$('.input').hide();
		}
	});

	$('.full').click(function () {
		if(!$('.body').is(':visible')) {
			$('.body').slideDown();
			$('.input').show();
		}
	});

	$('.close').click(function () {
		$('.command').slideUp();
		$('.work').css('box-shadow','none');
	});

	$('.newCommand').click(function () {
		if(!$('.command').is(':visible')) {
			$('.command').slideDown();
			$('.work').removeAttr('style');
		}
	})
});