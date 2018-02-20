<?php
    include 'v_menu.php';
    echo '<br>';
    include 'v_breadcrumb.php';
?>

    <ul class="list-group mb-3">
        <li class="list-group-item list-group-item-info d-flex justify-content-between lh-condensed">
            Заведующий отделением
            <strong>
                <?= $nameMentor?>
            </strong>
        </li>
        <li class="list-group-item d-flex justify-content-between lh-condensed">
            Количество рабочих
            <strong>
                <?= count($content);?>
            </strong>
        </li>
        <li class="list-group-item list-group-item-info d-flex justify-content-between lh-condensed">
            Последнее обновление
            <strong>
                <?= $LastRec['DATET']?>
            </strong>
        </li>
    </ul>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>#</th>
                <th>Табельный номер</th>
                <th>Ф.И.О.</th>
                <th>,</th>
                <th>Категория</th>
                <th>Должность</th>
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
                <td><a href="<?='/strax/one/'. $item['TABN']?>"><?=$item['TABN']?></a></td>
                <td><a href="<?='/strax/one/'. $item['TABN']?>"><?=$item['FIO']?></a></td>
                <td><a href="<?='/strax/one/'. $item['TABN']?>"><?=$item['GO']?></a></td>
                <td><a href="<?='/strax/one/'. $item['TABN']?>"><?=$item['KAT']?></a></td>
                <td><a href="<?='/strax/one/'. $item['TABN']?>"><?=$item['DLG']?></a></td>
                <td><a href="#">Изменить</a></td>
                <td><a href="#">Удалить</a></td>
            </tr>
            <?php
                endforeach;
            ?>
            </tbody>
        </table>
    </div>