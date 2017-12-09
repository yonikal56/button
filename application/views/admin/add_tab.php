<form action="{base_url_segment}admin/managetabs/add_tab" method="post" class='contact_form'>
    {$lang.name}:<input type='text' name='name' value="<?= set_value('name') ?>"><br><br>
    {$lang.title}:<input type='text' name='title' value="<?= set_value('title') ?>"><br><br>
    {$lang.page}:<input type='text' name='page' value="<?= set_value('page') ?>"><br><br>
    {$lang.is_connected}:<select name="is_login">
        <option value="0">{$lang.only_unconnected}</option>
        <option value="1">{$lang.only_connected}</option>
        <option value="2">{$lang.both_connected}</option>
    </select><br><br>
    {$lang.is_admin}:<select name="is_admin">
        <option value="0">{$lang.not_only_admins}</option>
        <option value="1">{$lang.only_admins}</option>
    </select>
    <input type='submit' value='{$lang.add_tab}'>
</form><br>
<div class="{message_class}">{message}</div><br>
<a href="{base_url_segment}admin/managetabs">{$lang.back_tabs}</a>