<form action="{base_url}admin/login" method="post" class='contact_form'>
    Username:<input type='text' name='username' value="<?= set_value('username') ?>"><br><br>
    Password:<input type='text' name='password' value="<?= set_value('password') ?>"><br><br>
    <input type='submit' value='Login'>
</form><br>
<div class="{message_class}">{message}</div><br>