<div class="col-md-4"></div>
<section class="col-md-4 panel panel-default contentSpace">
	<h3>{$lang.new_account}</h3>
	<hr>
    <form action="" method="post">
        <?php if(!$succeed): ?>
        <div class="if">
            <span class="if_text">{$lang.username}</span>
            <input maxlength="15" name="username" class="but_content form-control" type="text" value="<?= set_value('username') ?>">
        </div>
        <div class="but">
            <span class="but_text">{$lang.password}</span>
            <input maxlength="25" name="password" class="but_content form-control" type="password" value="<?= set_value('password') ?>">
        </div>
        <div class="clear"></div>
        <div class="if">
            <span class="if_text">{$lang.email}</span>
            <input maxlength="25" name="email" class="but_content form-control" type="email" value="<?= set_value('email') ?>">
        </div>
        <div class="clear"></div>
        <button type="submit" class="btn btn-success btn-lg btn-block register" class="submit">{$lang.register}</button>
        <?php endif; ?>
        <div class="{message_type} errors_box">{message}</div>
    </form>
</section>
<div class="col-md-4"></div>