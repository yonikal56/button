<?php $tab = $tab[0]; ?>
{tab}
<form action="{base_url_segment}admin/managetabs/edit_tab/{ID}" method="post" class='contact_form'>
    Tab Name:<input type='text' name='name' value="<?= set_value('name', '{name}')?>"><br><br>
    Tab Title:<input type='text' name='title' value="<?= set_value('title', '{title}')?>"><br><br>
    Page Name:<input type='text' name='page' value="<?= set_value('page', '{page}') ?>"><br><br>
    Is Login:<select name="is_login">
        <option value="0"<?php echo set_select('is_login', '0', ($tab['is_login'] == '0')); ?>>{$lang.only_unconnected}</option>
        <option value="1"<?php echo set_select('is_login', '1', ($tab['is_login'] == '1')); ?>>{$lang.only_connected}</option>
        <option value="2"<?php echo set_select('is_login', '2', ($tab['is_login'] == '2')); ?>>{$lang.both_connected}</option>
    </select><br><br>
    Is Admin:<select name="is_admin">
        <option value="0"<?php echo set_select('is_admin', '0', ($tab['is_admin'] == '0')); ?>>{$lang.not_only_admins}</option>
        <option value="1"<?php echo set_select('is_admin', '1', ($tab['is_admin'] == '1')); ?>>{$lang.only_admins}</option>
    </select>
    <input type="hidden" name="id" value="{ID}">
    <input type='submit' value='{$lang.edit_tab}'>
</form><br>
<div class="{message_class}">{message}</div><br>
<a href="{base_url_segment}admin/managetabs">{$lang.back_tabs}</a>
{/tab}