				<!-- Contact -->
					<section id="contact">
						<div class="inner">

<?php 
include 'control/mail.php';
include 'view/include.mailform.php';
/*                          Dieses Stück HTML-Code ist im 'include.mailform.php'
							<section> 
								<form method="post" action="#">
									<div class="field half first">
										<label for="name">Name</label>
										<input type="text" name="mailNam" id="name" value="<?= $mailNam ?>" />
									</div>
									<div class="field half">
										<label for="email">Email</label>
										<input type="text" name="mailAdr" id="email" value="<?= $mailAdr ?>" />
									</div>
									<div class="field">
										<label for="message">Nachricht</label>
										<textarea name="mailMsg" id="message" rows="6"><?= $mailMsg ?></textarea>
									</div>
									<ul class="actions">
										<li><input type="submit" name="btn_mailsend" value="Nachricht senden" class="special" /></li>
										<li><input type="submit" name="btn_mailclear" value="Clear" /></li>
									</ul>
								</form>
							</section>
*/
?>
						
							<section class="split">
								<section>
									<div class="contact-method">
										<span class="icon alt fa-envelope"></span>
										<h3>Email</h3>
										<a href="mailto:harald.mueller@tbz.ch">harald.mueller@tbz.ch</a>
									</div>
								</section>
								<section>
									<div class="contact-method">
										<span class="icon alt fa-phone"></span>
										<h3>Telefon</h3>
										<span>+41 79 700 14 14</span>
									</div>
								</section>
								<section>
									<div class="contact-method">
										<span class="icon alt fa-home"></span>
										<h3>Adresse</h3>
										<span>Ausstellungsstrase 70<br />
										8090 Z&uuml;rich<br />
										Switzerland</span>
									</div>
								</section>
							</section>
						</div>
					</section>

				<!-- Footer -->
					<footer id="footer">
						<div class="inner">
							<ul class="icons">
								<li><a href="https://www.facebook.com/harald.g.mueller" class="icon alt fa-facebook"><span class="label">Facebook</span></a></li>
								<li><a href="https://www.instagram.com/harald.g.mueller/?hl=de" class="icon alt fa-instagram"><span class="label">Instagram</span></a></li>
								<li><a href="https://gitlab.com/harald.mueller" class="icon alt fa-github"><span class="label">GitLab</span></a></li>
								<li><a href="https://www.linkedin.com/in/harald-m�ller-69314059" class="icon alt fa-linkedin"><span class="label">LinkedIn</span></a></li>
							</ul>
							<ul class="copyright">
								<li>&copy; hm</li><li>Ausgehen eines Designs aus: <a href="https://html5up.net">HTML5 UP</a></li>
							</ul>
						</div>
					</footer>

			</div>

		<!-- Scripts -->
			<script src="../../control/js/jquery.min.js"></script>
			<script src="../../control/js/jquery.scrolly.min.js"></script>
			<script src="../../control/js/jquery.scrollex.min.js"></script>
			<script src="../../control/js/skel.min.js"></script>
			<script src="../../control/js/util.js"></script>
			<script src="../../control/js/main.js"></script>

	</body>
</html>