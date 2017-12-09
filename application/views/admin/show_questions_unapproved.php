<form method="post" action="{base_url_segment}admin/unapproved/action">
<table border="1" align="center">
    <tr>
        <th><input type="checkbox"></th>
        <th>ID</th>
        <th>{$lang.if}</th>
        <th>{$lang.but}</th>
        <th>{$lang.clickedp}</th>
        <th>{$lang.unclickedp}</th>
        <th>{$lang.liked}</th>
        <th>{$lang.unliked}</th>
        <th>IP</th>
        <th>{$lang.approved}</th>
        <th>{$lang.edit_question}</th>
        <th>{$lang.delete_question}</th>
        <th>{$lang.approve_question}</th>
    </tr>
    {questions}
    <tr>
            <td><input type="checkbox" name="checkbox{ID}" value="{ID}"></td>
            <td>{ID}</td>
            <td style="max-width: 15%; word-break: break-all;">{choice1}</td>
            <td style="max-width: 15%; word-break: break-all;">{choice2}</td>
            <td>{click}</td>
            <td>{unclick}</td>
            <td>{like}</td>
            <td>{unlike}</td>
            <td>{adder_IP}</td>
            <td>{approved}</td>
            <td><a href="{base_url_segment}admin/unapproved/edit/{ID}">{$lang.edit_question}</a></td>
            <td><a href="{base_url_segment}admin/unapproved/delete/{ID}">{$lang.delete_question}</a></td>
            <td><a href="{base_url_segment}admin/unapproved/approve/{ID}">{$lang.approve_question}</a></td>
    </tr>
    {/questions}
</table>
    <select name="action">
        <option value="approve">{$lang.approve_question}</option>
        <option value="delete">{$lang.delete_question}</option>
    </select>
    <input type="submit">
</form>
{pagination}
<div style="margin-bottom: 100px;"></div>