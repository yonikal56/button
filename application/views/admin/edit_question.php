<div class="clear_more"></div>
{question}
<form action="" method="post">
    <div class="if">
        <span class="if_text">{$lang.if}</span>
        <textarea maxlength="75" name="if_content" class="if_content"><?= set_value('if_content', '{choice1}') ?></textarea>
    </div>
    <div class="but">
        <span class="but_text">{$lang.but}</span>
        <textarea maxlength="75" name="but_content" class="but_content"><?= set_value('but_content', '{choice2}') ?></textarea>
    </div>
    <div class="clear"></div><br><br>
    <input type="submit" value="{$lang.edit_question}" class="submit"><br><br>
    <div class="{message_type}">{message}</div>
</form>
{/question}