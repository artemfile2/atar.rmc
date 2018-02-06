    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <?php
            foreach ($breadcrumb as $item){
                echo '<li class="breadcrumb-item">'.$item.'</li>';
            }
            ?>
        </ol>
    </nav>

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
            <td><a href="<?='/strax/?kod='. $item['tabn']?>"><?=$item['TABN']?></a></td>
            <td><a href="#"><?=$item['FIO']?></a></td>
            <td><a href="#"><?=$item['GO']?></a></td>
            <td><a href="#"><?=$item['KAT']?></a></td>
            <td><a href="#"><?=$item['DLG']?></a></td>
            <td><a href="#">Изменить</a></td>
            <td><a href="#">Удалить</a></td>
        </tr>
        <?php
            endforeach;
        ?>
        </tbody>
    </table>