<?php
    include 'v_menu.php';

    include 'v_breadcrumb.php';
?>

    <div class="col-md-4 order-md-2 mb-4">
        <div class="col-12 btn btn-outline-success">
            Добавить
        </div>
        <div class="col-12 btn btn-outline-success">
            BCgjkmpjdfnm
        </div>
    </div>

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