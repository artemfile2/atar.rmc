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