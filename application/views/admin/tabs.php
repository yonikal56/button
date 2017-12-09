<table border="1">
    <tr>
        <th>{$lang.name}</th>
        <th>{$lang.title}</th>
        <th>{$lang.page}</th>
        <th>{$lang.is_connected}</th>
        <th>{$lang.is_admin}</th>
        <th>{$lang.remove_tab}</th>
        <!--<th>Edit</th>-->
        <th>{$lang.move_tab_up}</th>
        <th>{$lang.move_tab_down}</th>
    </tr>
    <?php foreach($tabs as $tab): ?>
        <tr>
            <td><?= $tab['name'] ?></td>
            <td><?= $tab['title'] ?></td>
            <td><?= $tab['page'] ?></td>
            <td><?= $tab['is_login'] ?></td>
            <td><?= $tab['is_admin'] ?></td>
            <td><a href="{base_url_segment}admin/managetabs/remove_tab/<?= $tab['ID'] ?>">{$lang.remove_tab}</a></td>
            <!--<td><a href="{base_url}admin/managetabs/edit_tab/<?= $tab['ID'] ?>">Edit Tab</a></td>-->
            <td><a href="{base_url_segment}admin/managetabs/change_order/<?= $tab['ID'] ?>/up">{$lang.move_tab_up}</a></td>
            <td><a href="{base_url_segment}admin/managetabs/change_order/<?= $tab['ID'] ?>/down">{$lang.move_tab_down}</a></td>
        </tr>
    <?php endforeach; ?>
</table>
<a href="{base_url_segment}admin/managetabs/add_tab">{$lang.add_tab}</a>