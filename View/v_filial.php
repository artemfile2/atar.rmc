    <div class="col-3 menu">
        <?php
            foreach ($mainmenu as $menu){
                $menu['active'] ? 'active' : '';
                if ($menu['active']){
                    $linkClass = "btn btn-primary btn-lg btn-block active";
                }
                else{
                    $linkClass = "btn btn-secondary btn-lg btn-block";
                }
                $str = '<a href="'.$menu['link'].'" class="'.$linkClass.'" 
                                       role="button"
                                       >'.$menu['name'].'</a>';
                echo $str;
            }
        ?>
    </div>

    <div class="col-7 content">
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
                <td><a href="<?='/strax/one/'. $item['KOD']?>"><?=$item['KOD']?></a></td>
                <td><a href="<?='/strax/one/'. $item['KOD']?>"><?=$item['NAME']?></a></td>
                <td><a href="<?='/strax/one/'. $item['KOD']?>"><?=$item['ZAV']?></a></td>
                <td><a href="#">Изменить</a></td>
                <td><a href="#">Удалить</a></td>
            </tr>
            <?php
                endforeach;
            ?>
            </tbody>
        </table>
    </div>

    <div class="col-2 menu">
        <div class="col-12 btn btn-outline-success">
            Добавить
        </div>
    </div>