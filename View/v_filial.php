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
            <td><a href="<?=ROOT .'/'. $item['KOD']?>"><?=$item['KOD']?></a></td>
            <td><a href="#"><?=$item['NAME']?></a></td>
            <td><a href="#"><?=$item['ZAV']?></a></td>
            <td><a href="#">Изменить</a></td>
            <td><a href="#">Удалить</a></td>
        </tr>
        <?php
            endforeach;
        ?>
        </tbody>
    </table>