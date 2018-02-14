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

<div class="col-2 menu">
    <div class="col-12 btn btn-outline-success">
        Добавить
    </div>
</div>