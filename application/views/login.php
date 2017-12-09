<div class="col-md-4"></div>
<section class="col-md-4 panel panel-default contentSpace">
	<h3>{$lang.login}</h3>
	<hr>
    <form action="" method="post">
        <div class="if">
            <span class="if_text">{$lang.username}</span>
            <input maxlength="15" name="username" class="but_content form-control" type="text" value="<?= set_value('username') ?>">
        </div>
        <div class="but">
            <span class="but_text">{$lang.password}</span>
            <input maxlength="25" name="password" class="but_content form-control" type="password" value="<?= set_value('password') ?>">
        </div>
        <div class="clear"></div><br><br>
        <button type="submit" class="btn btn-success btn-lg btn-block" class="submit">{$lang.connection}</button><br><br>
        <div class="{message_type} errors_box">{message}</div>
    </form>
</section>
<div class="col-md-4"></div>