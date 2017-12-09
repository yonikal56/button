<table border="1" align="center">
    <tr>
        <th>{$lang.curse}</th>
        <th>{$lang.delete}</th>
    </tr>
    {curses}
    <tr>
        <td>{curse}</td>
        <td><a href="{base_url_segment}admin/curses/delete/{ID}">{$lang.delete}</a></td>
    </tr>
    {/curses}
    <form action="" method="post">
        {$lang.curse} : <input type="text" name="curse"><br>
        <input type="submit" value="{$lang.add}"><br>
    </form>
</table>