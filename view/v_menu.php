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