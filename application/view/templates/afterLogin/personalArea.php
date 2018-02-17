
<div id="body">
    <div id="bCenterPersonal">
        <div id="bTextPersonal">Личный кабинет</div>
        <form method="post" action="/?go=save&type=<?= $checkType?>">
            <div class="bPersonal">
                <div class="bPText">Имя</div>
                <input class="bPField" type="text" name="name" value="<? $student->registerName('name'); ?>">
            </div>
            <div class="bPersonal">
                <div class="bPText">Фамилия</div>
                <input class="bPField" type="text" name="surname" value="<? $student->registerName('surname'); ?>">
            </div>

            <? if ($checkType != 3): ?>
            <div class="bPersonal">
                <div class="bPText">Группа</div>
                <input class="bPField" type="text" name="group" value="<? $student->registerName('group'); ?>">
            </div>
            <? endif; ?>

            <div class="bPersonal">
                <div class="bPText">Email</div>
                <input class="bPField" type="text" name="email" value="<? $student->registerName('email'); ?>">
            </div>

            <input class="invisible" type="text" name="event" value="onSave">
            <input id="bPersonalSubmit" type="submit" name="go" value="Сохранить">
        </form>
    </div>
</div>