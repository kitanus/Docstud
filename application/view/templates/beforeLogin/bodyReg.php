
<div id="body">
    <div id="bCenterReg">
        <div id="bTextReg">Регистрация</div>
        <form method="POST" action="/?go=registration">
            <div class="bReg">
                <div class="bRText">Имя</div>
                <input class="bRField" name="name" type="text">
            </div>
            <div class="bReg">
                <div class="bRText">Фамилия</div>
                <input class="bRField" name="surname" type="text">
            </div>
            <div class="bReg">
                <div class="bRText">Институт</div>
                <select name="institute">
                    <option value="no">Выберите из списка</option>
                    <?= $user->printOption ($institute,"institute_name"); ?>
                </select>
            </div>
            <div class="bReg">
                <div class="bRText">Группа</div>
                <select name="group">
                    <option value="no">Выберите из списка</option>
                    <?= $user->printOption ($group,"group_name"); ?>
                </select>
            </div>
            <div class="bReg">
                <div class="bRText">Тип пользователя</div>
                <select name="user">
                    <option value="no">Выберите из списка</option>
                    <option value="2">Студент</option>
                    <option value="1">Староста</option>
                    <option value="3">Преподаватель</option>
                </select>
            </div>
            <div class="bReg">
                <div class="bRText">Email</div>
                <input class="bRField" name="email" type="text">
            </div>
            <div class="bReg">
                <div class="bRText">Пароль</div>
                <input class="bRField" name="password" type="text">
            </div>

            <input class="invisible" type="text" name="event" value="onReg">
            <input id="bRSubmit" type="submit" name="go" value="Регистрация">
        </form>
    </div>
</div>