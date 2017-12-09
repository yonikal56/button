<table border="1" align="center">
    <tr>
        <th>{$lang.title}</th>
        <th>{$lang.content}</th>
        <th>IP</th>
        <th>{$lang.if}</th>
        <th>{$lang.but}</th>
        <th>ID</th>
        <th>{$lang.delete_question}</th>
        <th>{$lang.edit_question}</th>
        <th>{$lang.approve_question}</th>
        <th>{$lang.delete_report}</th>
    </tr>
    {reports}
    <tr>
        <td style="max-width: 10%; word-break: break-all;">{title}</td>
        <td style="max-width: 10%; word-break: break-all;">{content}</td>
        <td>{sender_IP}</td>
        <td style="max-width: 10%; word-break: break-all;">{choice1}</td>
        <td style="max-width: 10%; word-break: break-all;">{choice2}</td>
        <td>{question_ID}</td>
        <td><a href="{base_url_segment}admin/reports/delete_question/{ID}">{$lang.delete_question}</a></td>
        <td><a href="{base_url_segment}admin/reports/edit_question/{ID}">{$lang.edit_question}</a></td>
        <td><a href="{base_url_segment}admin/reports/approve_question/{ID}">{$lang.approve_question}</a></td>
        <td><a href="{base_url_segment}admin/reports/delete/{ID}">{$lang.delete_report}</a></td>
    </tr>
    {/reports}
</table>