    <!--<div class="col-3 menu">-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Меню</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <?php
                        foreach ($mainmenu as $menu){
                            $active = $menu['active'] ? 'active' : '';
                            echo '<li class="nav-item ' . $active . '">';
                            echo '<a class="nav-link" href="'.$menu['link'].'">'.$menu['name'].'</a>';
                            echo '</li>';
                        }
                    ?>
                </ul>
            </div>
    </nav>

    <div>
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
    </div>


    <div class="col-md-4 order-md-2 mb-4">
        <div class="col-12 btn btn-outline-success">
            Добавить
        </div>
    </div>

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