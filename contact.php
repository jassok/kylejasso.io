<?php $sub = true; ?>
<?php include 'header.php'; ?>
<script type="text/javascript">
	$(function () {

		$('button[name="submit"]').click(function () {
			var check = $('input[name="captcha"]').val();

			$('input').each(function () {
				$(this).removeAttr('style');
			});

			if(check == 'kylejasso.io' || check == 'http://www.kylejasso.io') {
				if(!$('input[name="email"]').val()) {
					
					$('input[name="email"]').css('border','1px solid red');

					if(!$('input[name="phone"]').val()) {
						$('input[name="phone"]').css('border','1px solid red');
						return false;
					}
				}

				$.ajax({
					type:"POST",
					url:"class.mail.php",
					data: {
						'name':$('input[name="name"]').val(),
						'email':$('input[name="email"]').val(),
						'phone':$('input[name="phone"]').val(),
						'subject':$('input[name="subject"]').val(),
						'message':$('textarea[name="message"]').val()
					}
				}).done(function(msg) {
					$('.success').popUp(msg,false,false,true);
				});
			} else {
				$('input[name="captcha"]').css('border','1px solid red');
				return false;
			}
			return false;
		});
		$('.success').on("click", function () {
            $('.success').fadeOut(function () {
                $(".browserDimmer").fadeOut(function () {
                    $('.success').html("");
                });
            });
            return false;
        });
	});
</script>
<div class="success"></div>

<div class="contact clearfix">
	<div class="introduction">
		<h2 class="subHeading">Contact</h2>
	</div>
	<div class="center">
		
		<div class="wrap">
			<p>Have questions? Want answers? Interesting in learning more about me and my skills? Fill out the form below to contact me</p>
			<hr />
			<label>Name</label>
			<input type="text" name="name" />

			<label>E-mail</label>
			<input type="email" name="email" />

			<label>Phone</label>
			<input type="text" name="phone" />

			<label>Subject</label>
			<input type="text" name="subject" />

			<label>Message</label>
			<textarea name="message"></textarea>

			<h3>Human Test</h3>
			<p>Q: If a train is traveling at 75mph, and its destination is 24 miles away, what is my domain name?</p>
			<input type="text" name="captcha" />

			<button type="button" name="submit">Submit</button>
		</div>
	</div>
</div>

<?php include "footer.php"; ?>