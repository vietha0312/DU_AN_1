<?php
foreach ($ds_loai as $loai) : ?>
    <tr>
        <td><?= $loai['id_cate'] ?></td>
        <td><?= $loai['name_cate'] ?></td>

    </tr>
<?php endforeach ?>