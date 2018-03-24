<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="/resources/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <title><?=$title?></title>
</head>
<body>

    <div class="container">
        <header class="blog-header py-3 alert alert-success" role="alert">
            <div class="row flex-nowrap justify-content-between align-items-center">
                <div class="col-4 pt-1">
                    <p class="text-info">AtarRMC@mail.me</p>
                    <p class="text-info">8 912 456 78 90</p>
                </div>
                <div class="col-4 text-center">
                    <h4 class="alert-heading">Тарификационный список</h4>
                </div>
                <div class="col-4 d-flex justify-content-end align-items-center">
                    <a href="/" class="brand-logo right">AtarRMC</a>
                </div>
            </div>
        </header>
        <!--<div class="row">-->
            <?php
                echo $content;
            ?>
        <!--</div>-->

        <footer class="my-5 pt-5 text-muted text-center text-small alert alert-success" role="alert">
            <p class="text-info">AtarRMC@mail.me</p>
            <p class="text-info">8 912 456 78 90</p>
            <p class="col footer">
            <p>© 2017-2018</p>
        </footer>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>