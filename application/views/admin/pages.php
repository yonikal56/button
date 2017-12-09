<table border="1">
    <tr>
        <th>{$lang.name}</th>
        <th>{$lang.machine_name}</th>
        <th>{$lang.remove_page}</th>
        <th>{$lang.edit_page}</th>
    </tr>
    {pages}
        <tr>
            <td>{name}</td>
            <td>{machine_name}</td>
            <td><a href="{base_url_segment}admin/managepages/remove_page/{ID}">{$lang.remove_page}</a></td>
            <td><a href="{base_url_segment}admin/managepages/edit_page/{ID}">{$lang.edit_page}</a></td>
        </tr>
    {/pages}
</table>
<a href="{base_url_segment}admin/managepages/add_page">{$lang.add_page}</a>