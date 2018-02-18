<?php
    include 'v_menu.php';

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
            <?= $LastRec['DATET']?>
        </strong>
    </li>
</ul>

<div>
    <form>
        <div class="form-group">
            <label for="tabnum">Табельный номер</label>
            <input type="text" class="form-control" id="tabnum"
                   placeholder="Табельный номер" value="<?=$content['TABN']?>">
        </div>
        <div class="form-group">
            <label for="InputFIO">Ф.И.О.</label>
            <input type="text" class="form-control" id="InputFIO"
                   placeholder="Ф.И.О." value="<?=$content['FIO']?>">
        </div>
        <div class="form-group">
            <label for="InputСategory">Категория</label>
            <input type="text" class="form-control" id="InputСategory"
                   placeholder="Категория" value="<?=$content['KAT']?>">
        </div>
        <div class="form-group">
            <label for="InputPosition">Должность</label>
            <input type="text" class="form-control" id="InputPosition"
                   placeholder="Должность" value="<?=$content['DLG']?>">
        </div>
        <div class="form-group">
            <label for="InputSalary">Месячный фонд</label>
            <input type="text" class="form-control" id="InputSalary"
                   placeholder="Месячный фонд" value="<?=$content['MFIT']?>">
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
        <button type="submit" class="btn btn-primary">Печать</button>
        <button type="submit" class="btn btn-primary">Закрыть</button>
    </form>
</div>