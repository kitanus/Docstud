
<div id="bodyCenterTable">
    <div id="bodyTextTable">Расписание</div>
    <form id="save" method="post" action="/?go=timeTable"">
        <table>
            <tbody align="center">
                <tr>
                    <th>№</th>
                    <th>День</th>
                    <th>Время</th>
                    <th>Неделя</th>
                    <th>Предмет</th>
                    <th>Тип</th>
                    <th>Кабинет</th>
                    <th>Здание</th>
                    <th>Преподаватель</th>

                    <? if($type == 1) :?>
                        <th>Действие</th>
                    <? endif; ?>

                </tr>
                <?= $textTable; ?>
            </tbody>
        </table>

        <? if($type == 1) :?>
            <div id="bodyPersonalTableSubmits">
                <input id="bodyPersonalSaveTableSubmit" name="action" type="submit" value="Сохранить">
                <input id="bodyPersonalRebuildTableSubmit" name="action" type="submit" value="Добавить +">
            </div>
        <? endif; ?>

    </form>
</div>


