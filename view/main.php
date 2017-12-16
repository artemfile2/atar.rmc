<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="view\css\style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="resources/css/materialize.min.css"  media="screen,projection"/>
    <title>ATAR-RMC</title>
</head>
<body>

<div class="row wrapper">
        <div class="col s12 header"><p>header</p></div>
        <div class="col s12 m4 l3 menu">
            <?php
                foreach ($mainmenu as $menu){
                     $str = '<div class="card-panel teal lighten-';
                     $str .= $menu['active'] ? '2' : '4';
                     $str .=  ' z-depth-3">';
                     $str .= $menu['name'].' '.$menu['active'];
                     $str .= '</div>';
                    echo $str;
                }
            ?>

        </div>
        <div class="col s12 m8 l9 content">
            <table class="bordered striped">
                <thead>
                <tr>
                    <th>Код</th>
                    <th>Наименование отделения</th>
                    <th>Заведующий(ая)</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($filials as $filial){
                            echo '<tr>';
                            echo '<td><a href="?id='.$filial['KOD'].'">'.$filial['KOD'].'</a></td><td><a href="#">'
                                        .$filial["NAME"].'</a></td><td>'
                                        .$filial["ZAV"].'</td>';
                            echo '</tr>';
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="col s12 footer"><p>footer</p></div>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="resources/js/materialize.min.js"></script>
</body>
</html>