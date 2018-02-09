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

    <?=$content_main;?>
</div>

<div class="col-2 menu">
    <div class="col-12 btn btn-outline-success">
        Добавить
    </div>
</div>