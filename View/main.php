<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="view\css\style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <title>ATAR-RMC</title>
</head>
<body>

<div class="container-fluid">
    <div class="row wrapper">
        <div class="col-sm header">
            <a href="#" class="brand-logo right">AtarRMC</a>
            <p>header</p>
        </div>
    </div>
    <div class="row">
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
            <?php
            if (isset($content)):
                ?>
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
                    isset($content) ? $content : 'content';
                    ?>
                    </tbody>
                </table>
            <?php
            endif;
            ?>
        </div>

        <div class="col-2 menu">
            <div class="card-panel orange lighten-3 z-depth-3">Добавить</div>
        </div>
    </div>

    <div class="row">
        <div class="col footer"><p>footer</p></div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</body>
</html>