<div class="clear"></div>
{question}
<div class="if">
    <span class="if_text">{$lang.if}</span>
    <div class="if_content">{choice1}</div>
</div>
<div class="but">
    <span class="but_text">{$lang.but}</span>
    <div class="but_content">{choice2}</div>
</div>
<div class="clear"></div>
{/question}
<div class="clear_more"></div>
<?php if($report_exists): ?>
<span class="success">{$lang.reported_already}</span>
<?php else: ?>
<form action="" method="post">
    <div class="if">
        <span class="if_text">{$lang.title}</span>
        <textarea maxlength="75" name="title" class="if_content"><?= set_value('title') ?></textarea>
    </div>
    <div class="but">
        <span class="but_text">{$lang.content}</span>
        <textarea maxlength="275" name="content" class="but_content"><?= set_value('content') ?></textarea>
    </div>
    <div class="clear"></div><br><br>
    <input type="submit" value="שלח" class="submit"><br><br>
    <div class="{message_type}">{message}</div>
</form>
<?php endif; ?>