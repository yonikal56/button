<form action="{base_url_segment}admin/managepages/add_page" method="post" class='contact_form'>
    {$lang.name}:<input type='text' name='name' value="<?= set_value('name') ?>"><br><br>
    {$lang.machine_name}:<input type='text' name='machine_name' value="<?= set_value('machine_name') ?>"><br><br>
    <center>
        {$lang.content}:<br><textarea name='html'><?= set_value('html') ?></textarea><br>
    </center>
    {$lang.description}:<textarea name='description'><?= set_value('description') ?></textarea><br><br>
    {$lang.keywords}:<input type='text' name='keywords' value="<?= set_value('keywords') ?>"><br><br>
    <input type='submit' value='{$lang.add_page}'>
</form><br>
<div class="{message_class} errors_box">{message}</div><br>
<a href="{base_url_segment}admin/managepages">{$lang.back_pages}</a>
<script src="//cdn.ckeditor.com/4.5.1/standard/ckeditor.js"></script>
<script>
CKEDITOR.replace( 'html' );
CKEDITOR.config.allowedContent = true;
CKEDITOR.config.language = "{lang_short}";
</script>
<div class="clr" style="margin-bottom: 100px;"></div>