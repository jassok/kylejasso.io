<?php
/* == Email Styles =========================== */
$table = 'font-size: 18px; font-family:"Arial Black", Gadget, sans-serif; font-variant: small-caps; text-transform: lowercase; font-weight: 100; table-layout: fixed;';
$tabletrtd ='margin:0; padding:0; border:none; border-spacing:0; border-collapse:collapse; position: relative; vertical-align: top;';
$img = 'max-width:100%; border:none;';
$p = 'line-height:10px; padding: 0 10px; color:#fbfbfb;';
$a = 'color:#fbfbfb; text-decoration:none;';
$note = 'line-height:20px; width:500px; margin:50px; color:purple';
$centerSpace = 'width:533px; height:266px;';
$button ='background:#553679; color:#fbfbfb; padding:8px 15px; float:right; text-decoration:none;';
$clearfix = 'clear:both;';
$darkBlue = 'background:#586479;';
$desk = 'background:gray';
$mail = 'margin:0 auto; width:601px; background:#fbfbfb; line-height: 0;';
$heading ='line-height:20px;';
$orange = 'color:orange;';
$topspacer = 'height:49px;';
$vertSpacer = 'width:33px; height:266px;';


$emailnote ="
	<b>Greetings!</b><br /><br />
	Let me introduce myself, my name is Kyle Jasso and I am a front-end and back-end web developer currently based in the
	Greater Philadelphia area. I have been designing, programming, and learning all I can about web development for nearly
	five years now. The thrill of it has me constantly looking for new avenues and experiences to further my talents.<br /><br />

	As a self taught, and highly motovated coder, I am always looking for ways to improve, and new environments to learn and grow in.
	I would be honored, if you would take a few moments to checkout my portfolio, and resume. <br /><br />
		<a style='$button' href='http://www.kylejasso.io/'>Let me see it!</a>
	<br style='clearfix' />

	<br />
	Thanks, and I hope to hear from you soon!<br /><br />
	Kyle Jasso<br /><br />
	Phone: 503 369 6789<br />
	";


$message = "";

$message .= '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">';
$message .= '<html>';
$message .= '<head>';
$message .= '	<meta name="viewport" content="width=device-width, initial scale=1.0"/>';
$message .= '	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">';
$message .= '</head>';
$message .= '<body>';

$message .= "<table style='$table $tabletrtd $mail'>";
$message .= "	<!-- Header -->";
$message .= "	<tr style='$tabletrtd $darkBlue $heading'>";
$message .= "		<td style='$tabletrtd'><p style='$p $orange'>Kyle Jasso</p></td>";
$message .= "		<td style='$tabletrtd'><p style='$p'><a style='$a' href='http://www.kylejasso.io/Email/email.php'>View Online</a></p></td>";
$message .= "		<td style='$tabletrtd'><p style='$p'><a style='$a' href='http://www.kylejasso.io'>Website</a></p></td>";
$message .= "		<td style='$tabletrtd width:250px; text-align:right;'><p style='$p'>Phone: <span style='$orange'>503 269 6789</span></p></td>";
$message .= "	</tr>";
$message .= "	<!-- Spacer -->";
$message .= "	<tr style='$tabletrtd $darkBlue $topspacer'>";
$message .= "		<td style='$tabletrtd' colspan='4'><a href='http://www.kylejasso.io/Email/email.php'><img style='$img' src='http://www.kylejasso.io/Email/images/email_04.png' alt='No images? Try viewing it in the browser!' /></a></td>";
$message .= "	</tr>";
$message .= "	<!-- Top Block -->";
$message .= "	<tr style='$darkBlue'>";
$message .= "		<td style='$tabletrtd' colspan='4'>";
$message .= "			<table style='$table $tabletrtd'>";
$message .= "				<tr style='$tabletrtd'>";
$message .= "					<!-- Left Space -->";
$message .= "					<td style='$tabletrtd $vertSpacer height:266px;'><img style='$img' src='http://www.kylejasso.io/Email/images/email_05.png' /></td>";
$message .= "					<!-- Center Space -->";
$message .= "					<td style='$tabletrtd $centerSpace'>";
$message .= "						<!-- 2x2 grid -->";
$message .= "						<table style='$table $tabletrtd'>";
$message .= "							<tr style='$tabletrtd height:133px;'>";
$message .= "							<!-- Coder -->";
$message .= "								<td style='$tabletrtd height:133px;'>";
$message .= "									<table style='$table $tabletrtd height:133px;'>";
$message .= "										<tr style='$tabletrtd height:133px;'>";
$message .= "										<!-- Computer -->";
$message .= "											<td style='$tabletrtd width:72px;'>";
$message .= "												<table style='$table $tabletrtd height:133px;'>";
$message .= "													<tr style='$tabletrtd'>";
$message .= "														<td style='$tabletrtd'><img style='$img' src='http://www.kylejasso.io/Email/images/email_06.png' /></td>";
$message .= "													</tr>";
$message .= "													<tr style='$tabletrtd'>";
$message .= "														<td style='$tabletrtd background:#040404; height:78px; width:72px;'><img style='$img' src='http://www.kylejasso.io/Email/images/email_13.png' /></td>";
$message .= "													</tr>";
$message .= "												</table>";
$message .= "											</td>";
$message .= "										<!-- Guy -->";
$message .= "											<td style='$tabletrtd width:77px;'>";
$message .= "												<table style='$table $tabletrtd'>";
$message .= "													<tr style='$tabletrtd'>";
$message .= "														<td style='$tabletrtd background:#101010; height:38px; width:77px;'><img style='$img' src='http://www.kylejasso.io/Email/images/email_07.png' /></td>";
$message .= "													</tr>";
$message .= "													<tr style='$tabletrtd'>";
$message .= "														<td style='$tabletrtd background:#efd6d6; height:50px; width:77px;'><img style='$img' src='http://www.kylejasso.io/Email/images/email_12.png' /></td>";
$message .= "													</tr>";
$message .= "													<tr style='$tabletrtd'>";
$message .= "													<!-- Tripple Block -->";
$message .= "														<td style='$tabletrtd'>";
$message .= "															<table style='$table $tabletrtd'>";
$message .= "																<tr style='$tabletrtd'>";
$message .= "																	<td style='$tabletrtd background:#040404; height:45px; width:22px;'><img style='$img' src='http://www.kylejasso.io/Email/images/email_16.png' /></td>";
$message .= "																	<td style='$tabletrtd background:#efd6d6; height:45px; width:28px;'><img style='$img' src='http://www.kylejasso.io/Email/images/email_17.png' /></td>";
$message .= "																	<td style='$tabletrtd background:#004983; height:45px; width:27px;'><img style='$img' src='http://www.kylejasso.io/Email/images/email_18.png' /></td>";
$message .= "																</tr>";
$message .= "															</table>";
$message .= "														</td>";
$message .= "													</tr>";
$message .= "												</table>";
$message .= "											</td>";
$message .= "										<!-- Chair -->";
$message .= "											<td style='$tabletrtd width:27px;'>";
$message .= "												<table style='$table $tabletrtd'>";
$message .= "													<tr style='$tabletrtd'>";
$message .= "														<td style='$tabletrtd height:70px; width:27px;'><img style='$img' src='http://www.kylejasso.io/Email/images/email_08.png' /></td>";
$message .= "													</tr>";
$message .= "													<tr style='$tabletrtd'>";
$message .= "														<td style='$tabletrtd background:#004983; height:63px; width:27px;'><img style='$img' src='http://www.kylejasso.io/Email/images/email_15.png' /></td>";
$message .= "													</tr>";
$message .= "												</table>";
$message .= "											</td>";
$message .= "										<!-- Spacer -->";
$message .= "											<td style='$tabletrtd width:47px;'>";
$message .= "												<table style='$table $tabletrtd'>";
$message .= "													<tr style='$tabletrtd'>";
$message .= "														<td style='$tabletrtd width:47px; height:55px;'><img style='$img' src='http://www.kylejasso.io/Email/images/email_09.png' /></td>";
$message .= "													</tr>";
$message .= "													<tr style='$tabletrtd'>";
$message .= "														<td style='$tabletrtd width:47px; height:78px;'><img style='$img' src='http://www.kylejasso.io/Email/images/email_14.png' /></td>";
$message .= "													</tr>";
$message .= "												</table>";
$message .= "											</td>";
$message .= "										</tr>";
$message .= "									</table>";
$message .= "								</td>";
$message .= "							<!-- Title -->";
$message .= "								<td style='$tabletrtd width:310px; height:133px;'>";
$message .= "									<img style='$img' src='http://www.kylejasso.io/Email/images/email_10.png' alt='WEB DEVELOPER' style='font-family: sans-serif; color: #fbfbfb; font-style: italic; font-size: 30px;'/>";
$message .= "								</td>";
$message .= "							</tr>";
$message .= "							<tr style='$tabletrtd height:133px;'>";
$message .= "							<!-- Desk -->";
$message .= "								<td style='$tabletrtd'>";
$message .= "									<table style='$table $tabletrtd width:223px;'>";
$message .= "										<tr style='$tabletrtd'>";
$message .= "											<td style='$tabletrtd background:#838383; height:98px; width:72px;'><img style='$img' src='http://www.kylejasso.io/Email/images/email_19.png' /></td>";
$message .= "											<td style='$tabletrtd background:#838383; height:98px; width:77px;'><img style='$img' src='http://www.kylejasso.io/Email/images/email_20.png' /></td>";
$message .= "											<td style='$tabletrtd background:#838383; height:98px; width:74px;'><img style='$img' src='http://www.kylejasso.io/Email/images/email_21.png' /></td>";
$message .= "										</tr>";
$message .= "										<tr style='$tabletrtd'>";
$message .= "											<td style='$tabletrtd' colspan='3'><img style='$img' src='http://www.kylejasso.io/Email/images/email_23.png' /></td>";
$message .= "										</tr>";
$message .= "									</table>";
$message .= "								</td>";
$message .= "							<!-- Computer -->";
$message .= "								<td style='$tabletrtd background:#101010; height:133px; width:310px;'><img style='$img' src='http://www.kylejasso.io/Email/images/email_22.png' /></td>";
$message .= "							</tr>";
$message .= "						</table>";
$message .= "					</td>";
$message .= "					<!-- Right Space -->";
$message .= "					<td style='$tabletrtd $vertSpacer height:266px;'><img style='$img' src='http://www.kylejasso.io/Email/images/email_11.png' /></td>";
$message .= "				</tr>";
$message .= "			</table>";
$message .= "		</td>";
$message .= "	</tr>";

$message .= "	<!-- Lower Block -->";
$message .= "	<tr style='$tabletrtd'>";
$message .= "		<td style='$tabletrtd' colspan='4'>";
$message .= "			<table style='$table $tabletrtd'>";
$message .= "				<tr style='$tabletrtd'>";
$message .= "					<td style='$tabletrtd'>";
$message .= "						<table style='$table $tabletrtd width:256px;'>";
$message .= "							<tr style='$tabletrtd'>";
$message .= "								<td style='$tabletrtd background:#f37021; height:76px; width:256px'><img style='$img margin-left:-20px; width:276px; max-width:276px; font-family: sans-serif; color: #101010; font-style: italic; font-size: 30px;' src='http://www.kylejasso.io/Email/images/email_25.png' alt='Portfolio' /></td>";
$message .= "							</tr>";
$message .= "							<tr style='$tabletrtd'>";
$message .= "								<td style='$tabletrtd'><img style='$img' src='http://www.kylejasso.io/Email/images/email_30.png' /></td>";
$message .= "							</tr>";
$message .= "						</table>";
$message .= "					</td>";
$message .= "					<td style='$tabletrtd background:#101010; height:103px; width:310px;'>a<img style='$img' src='http://www.kylejasso.io/Email/images/email_26.png' /></td>";
$message .= "					<td style='$tabletrtd'><img style='$img' src='http://www.kylejasso.io/Email/images/email_27.png' /></td>";
$message .= "				</tr>";
$message .= "			</table>";
$message .= "		</td>";
$message .= "	</tr>";
$message .= "	<tr style='$tabletrtd $mail'>";
$message .= "		<td style='$tabletrtd'>";
$message .= "			<p style='$note'>$emailnote</p>";
$message .= "		</td>";
$message .= "	</tr>";
$message .= "</table>";
$message .= "</body>";
$message .= "</html>";

$from = "kyle.jasso@gmail.com";
//$to = $_POST['to'];
//$subject = $_POST['subject'];

$headers = "From: $from \r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

//$mail = mail($to,$subject,$message,$headers);

echo $message;

?>