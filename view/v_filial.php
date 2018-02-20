<?php
    include 'v_menu.php';
    echo '<br>';
    include 'v_breadcrumb.php';
?>

<ul class="list-group mb-3">
    <li class="list-group-item d-flex justify-content-between lh-condensed">
        Количество отделений
        <strong>
            <?= count($content)?>
        </strong>
    </li>
</ul>

    <div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
        <tr>
            <th>#</th>
            <th>Код</th>
            <th>Наименование отделения</th>
            <th>Заведующий(ая)</th>
            <th colspan="2" style="text-align: center">Действие</th>
        </tr>
        </thead>
        <tbody>
        <?php
            $i = 1;
            foreach ($content as $item):
        ?>
        <tr>
            <td><?= $i++ ?></td>
            <td><a href="<?='/strax/depart/'. $item['KOD']?>"><?=$item['KOD']?></a></td>
            <td><a href="<?='/strax/depart/'. $item['KOD']?>"><?=$item['NAME']?></a></td>
            <td><a href="<?='/strax/depart/'. $item['KOD']?>"><?=$item['ZAV']?></a></td>
            <td><a href="#">Изменить</a></td>
            <td><a href="#">Удалить</a></td>
        </tr>
        <?php
            endforeach;
        ?>
        </tbody>
    </table>
    </div>