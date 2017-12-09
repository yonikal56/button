<table border="1" align="center">
    <tr>
        <th>ID</th>
        <th>{$lang.id}</th>
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
        <td>{ID}</td>
        <td style="max-width: 15%; word-break: break-all;">{choice1}</td>
        <td style="max-width: 15%; word-break: break-all;">{choice2}</td>
        <td>{click}</td>
        <td>{unclick}</td>
        <td>{like}</td>
        <td>{unlike}</td>
        <td>{adder_IP}</td>
        <td>{approved}</td>
        <td><a href="{base_url_segment}admin/questions/edit/{ID}">{$lang.edit_question}</a></td>
        <td><a href="{base_url_segment}admin/questions/delete/{ID}">{$lang.delete_question}</a></td>
        <td><a href="{base_url_segment}admin/questions/approve/{ID}">{$lang.approve_question}</a></td>
    </tr>
    {/questions}
</table>
{pagination}
<div style="margin-bottom: 100px;"></div>