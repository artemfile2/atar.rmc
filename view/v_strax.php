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
                <?= $LastRec;?>
            </strong>
        </li>
        <br>
        <li class="list-group-item list-group-item-success d-flex justify-content-between lh-condensed">
            <a href="/strax/add/<?=$content[0]['KOD']?>">Добавить сотрудника</a>
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
                <td><a href="<?='/strax/edit/'. $item['TABN']?>">Изменить</a></td>
                <td><a href="<?='/strax/delete/'. $item['TABN']?>">Удалить</a></td>
            </tr>
            <?php
                endforeach;
            ?>
            </tbody>
        </table>
    </div>

<nav aria-label="Page navigation">
    <ul class="pagination pagination-lg justify-content-center">
        <?php
        if ($count > $show_pages){
            $i = 1;
            while ($i <= ceil($count / $show_pages)) {
                if ($i != $this_page){
                    /*echo '<a href="?page=' . $i . '"
                            title="Перейти на страницу '.$i.'">'.$i.'</a>';*/
                    echo '<li class="page-item">
                            <a class="page-link" href="/strax/all/?page='.$i.'"
                             tabindex="-1">'.$i.'</a>
                            </li>';
                }
                else{
                    echo '<b>' . $i . '</b>'; // Если это текущая страница - то ссылка на саму себя не нужна
                }
                $i++;
            }
        }
        ?>
<!--        <li class="page-item">
            <a class="page-link" href="/strax/all/?page=1" tabindex="-1">1</a>
        </li>
        <li class="page-item">
            <a class="page-link" href="/strax/all/?page=2">2</a>
        </li>-->
    </ul>
</nav>