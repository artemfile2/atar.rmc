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
        $y = 1;
        $first = $pages_side[0];
        $last = $pages_side[1];
        $cur_page = $pages_side[2];
        $count_page = $pages_side[3];

        if ($first > 1){
            echo '<li class="page-item">
                     <a class="page-link" href="/strax/all/?page='.$y.'"
                         tabindex="-1">'.$y.'</a>
                  </li>';
        }
        $y = $first - 1;
        if ($first > 2) {
            echo '<li class="page-item">
                    <a class="page-link" href="/strax/all/?page='.$y.'"
                       tabindex="-1">...</a>
                 </li>';
        } else {
            for($i = 2; $i < $first; $i++){
                echo '<li class="page-item">
                         <a class="page-link" href="/strax/all/?page='.$i.'"
                            tabindex="-1">'.$i.'</a>
                      </li>';
            }
        }
        for($i = $first; $i < $last + 1; $i++){
            // если выводится текущая страница, то ей назначается особый стиль css
            if($i == $cur_page) {
                echo '<li class="page-item active">
                         <a class="page-link" href="/strax/all/?page='.$i.'"
                            tabindex="-1">'.$i.'</a>
                      </li>';
            }
            else {
                echo '<li class="page-item">
                         <a class="page-link" href="/strax/all/?page='.$i.'"
                            tabindex="-1">'.$i.'</a>
                      </li>';
            }
        }
        $y = $last + 1;
        // часть страниц скрываем троеточием
        if ($last < $count_page && $count_page - $last > 2){
            echo '<li class="page-item">
                    <a class="page-link" href="/strax/all/?page='.$y.'"
                       tabindex="-1">...</a>
                 </li>';
        }
        // выводим последнюю страницу
        if ($last < $count_page) {
            echo '<li class="page-item">
                    <a class="page-link" href="/strax/all/?page='.$count_page.'"
                       tabindex="-1">'.$count_page.'</a>
                 </li>';
        }
        ?>

    </ul>
</nav>