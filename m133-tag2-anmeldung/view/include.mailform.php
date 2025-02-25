<section> 
	<form method="post" action="#mailformerrors" id="mailform">
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
