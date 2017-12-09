<form action="" method="post">
    <!-- What if -->
	<aside class="panel panel-success col-md-5">
		<!-- Title -->
		<div class="panel-heading">
			<h3 class="panel-title fontBold">{$lang.if}</h3>
		</div>
		<div class="panel-body">
            <input type="text" maxlength="255" name="if_content" class="form-control" value="<?= set_value('if_content') ?>">
		</div>
	</aside>
	
	<!-- Spacer -->
	<div class="col-md-2"></div>
	
	<!-- But -->
	<aside class="panel panel-danger col-md-5">
		<!-- Title -->
		<div class="panel-heading">
			<h3 class="panel-title fontBold">{$lang.but}</h3>
		</div>
		<div class="panel-body">
            <input type="text" maxlength="255" name="but_content" class="form-control" value="<?= set_value('but_content') ?>">
		</div>
	</aside>

    <!-- Clearing -->
	<div class="clr"></div>
	<div class="col-md-4"></div>
    <section class="col-md-4 panel panel-default contentSpace">
        <input type="checkbox" name="terms" value="terms" <?= isset($_POST['terms']) ? 'checked' : '' ?>><h4 class="terms_open">{$lang.accept}</h4>
        <hr>
        <textarea readonly class="form-control add_rules" rows="5">
            1) {$lang.rule1}
            2) {$lang.rule2}
            3) {$lang.rule3}
            4) {$lang.rule4}
            {$lang.rulenote}</textarea>
        <br>
		<div class="sendqButton">
        	<div class="g-recaptcha" data-sitekey="6LeiUB8TAAAAAF8J7gZPLm5sty7AcwBnKko4uK7Z"></div>
        	<button type="submit" class="btn btn-success btn-lg btn-block" class="submit">{$lang.add_question}</button>
		</div>
        <div class="{message_type} errors_box">{message}</div>
    </section>
	<div class="col-md-4"></div>
</form>