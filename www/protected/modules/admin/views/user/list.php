<table>
    <?php foreach ($members as $key => $user){ ?>
        <tr>
            <td><?php echo $user->userName ?></td>
            <td><?php echo $user->pass ?></td>
            <td><?php echo $user->email ?></td>
        </tr>
    <?php } ?>
</table>