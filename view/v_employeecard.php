<?php
    include 'v_menu.php';
    echo '<br>';
    include 'v_breadcrumb.php';
?>



<ul class="list-group mb-3">
    <li class="list-group-item list-group-item-info d-flex justify-content-between lh-condensed alert-info">
        Заведующий отделением
        <strong>
            <?= $nameMentor?>
        </strong>
    </li>
    <li class="list-group-item list-group-item-info d-flex justify-content-between lh-condensed">
        Последнее обновление
        <strong>
            <?= $LastRec?>
        </strong>
    </li>
</ul>

<div>
    <form method="post">
        <div class="row">
            <div class="col-md-3 mb-3">
                <label for="tabnum">Номер отдела</label>
                <input type="text" class="form-control" id="tabnum"
                       placeholder="Номер отдела" name="KOD" value="<?=$content['KOD']?>">
            </div>
            <div class="col-md-3 mb-3">
                <label for="tabnum">Номер сотрудника</label>
                <input type="text" class="form-control" id="tabnum"
                       placeholder="Номер сотрудника" name="TAB" value="<?=$content['TAB']?>">
            </div>
            <div class="col-md-6 mb-3">
                <label for="InputFIO">Ф.И.О.</label>
                <input type="text" class="form-control" id="InputFIO"
                       placeholder="Ф.И.О." name="FIO" value="<?=$content['FIO']?>">
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="InputСategory">Группа</label>
                <input type="text" class="form-control" id="InputСategory"
                       placeholder="Группа" name="GO" value="<?=$content['GO']?>">
            </div>
            <div class="col-md-4 mb-3">
                <label for="InputСategory">Категория</label>
                <input type="text" class="form-control" id="InputСategory"
                       placeholder="Категория" name="KAT" value="<?=$content['KAT']?>">
            </div>
            <div class="col-md-4 mb-3">
                <label for="InputСategory">Должность</label>
                <input type="text" class="form-control" id="InputСategory"
                       placeholder="Должность" name="DLG" value="<?=$content['DLG']?>">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="InputСategory">Квалификация</label>
                <input type="text" class="form-control" id="InputСategory"
                       placeholder="Квалификация" name="KVAL3" value="<?=$content['KVAL3']?>">
            </div>
            <div class="col-md-2 mb-3">
                <label for="InputСategory">Квалификация дата</label>
                <input type="text" class="form-control" id="InputСategory"
                       placeholder="Квалификация дата" name="DATKV3" value="<?=$content['DATKV3']?>">
            </div>
            <div class="col-md-2 mb-3">
                <label for="InputСategory">Стаж работы</label>
                <input type="text" class="form-control" id="InputСategory"
                       placeholder="Стаж работы" name="STD" value="<?=$content['STD']?>">
            </div>
            <div class="col-md-2 mb-3">
                <label for="InputСategory">Стаж работы в годах</label>
                <input type="text" class="form-control" id="InputСategory"
                       placeholder="Стаж работы" name="STAJ19" value="<?=$content['STAJ19']?>">
            </div>
        </div>

        <div class="row">
            <div class="col-md-2 mb-3">
                <label for="InputСategory">Надбавки за стаж в %</label>
                <input type="text" class="form-control" id="InputСategory"
                       placeholder="Надбавки за стаж" name="NADB20"  value="<?=$content['NADB20']?>">
            </div>
            <div class="col-md-3 mb-3">
                <label for="InputСategory">Надбавки за стаж </label>
                <input type="text" class="form-control" id="InputСategory"
                       placeholder="Надбавки за стаж" name="NADB21" value="<?=$content['NADB21']?>">
            </div>
            <div class="col-md-2 mb-3">
                <label for="InputСategory">Другие надбавки в %</label>
                <input type="text" class="form-control" id="InputСategory"
                       placeholder="Надбавки в процентах" name="POV12" value="<?=$content['POV12']?>">
            </div>
            <div class="col-md-3 mb-3">
                <label for="InputСategory">Другие надбавки</label>
                <input type="text" class="form-control" id="InputСategory"
                       placeholder="Надбавки за стаж" name="POV13" value="<?=$content['POV13']?>">
            </div>
            <div class="col-md-2 mb-3">
                <label for="InputPosition">Прочие надбавки</label>
                <input type="text" class="form-control" id="InputPosition"
                       placeholder="Прочие надбавки" name="PROC" value="<?=$content['PROC']?>">
            </div>
        </div>

        <div class="col-md-6 mb-3">
            <label for="InputSalary">Месячный фонд</label>
            <input type="text" class="form-control" id="InputSalary"
                   placeholder="Месячный фонд" value="<?=$content['MFIT']?>">
        </div>

        <br>

        <div class="form-group">
            <input type="submit" value="Сохранить" class="btn btn-primary">
            <button type="submit" class="btn btn-primary">Отмена</button>
        </div>
    </form>
</div>