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