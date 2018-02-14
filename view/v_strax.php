    <div class="col-3 menu">
        <?php
        //echo '<pre>' . print_r($mainmenu) . '</pre>';
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

        <!--Array (
            [index_list] => Array (
                [link] => /filial/all
                [name] => Тарификационный список
                [active] => )
            [employees] => Array (
                [link] => /strax/all
                [name] => Сотрудники
                [active] => )
            [reference] => Array (
                [name] => Справочники
                [active] => )
            [about] => Array (
                [name] => О программе
                [active] => )
            [exit] => Array (
                [link] => /auth/logout
                [name] => Выйти
                [active] => ) ) -->
    </div>

    <div class="col-7 content">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <?php
                    foreach ($breadcrumb as $item=>$value){
                        echo '<li class="breadcrumb-item">';
                                if (isset($value)){
                                    echo '<a href="' . $value . '">' . $item . '</a>';
                                } else {
                                    echo $item;
                                };
                        echo '</li>';
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