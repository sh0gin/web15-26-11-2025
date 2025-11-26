<?php

use app\models\DocType;
?>
<div class="border p-3 m-4">
    <div>
        Вид документа: <?= DocType::getTitleDocument($model->passport_type_id) ?>
    </div>
    <div>
        Годен до: <?= $model->passport_expire ?>
    </div>
    <div>
        Номерер документа: <?= $model->passport_number ?>
    </div>
    <?php if ($model->passport_another) { ?>
        <div>
            Вид документа: <?= $model->passport_another ?>
        </div>
    <?php } ?>
    <div>
        Статус документа: <?= $model->passport_expire >= date('Y-m-d') ? 'Документ действителен' : "Документ просрочен" ?>
    </div>
</div>