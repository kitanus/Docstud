
<div id="header">
    <div id="hCenter">
        <div id="logo"><a href="/"><span id="doc">Doc</span><span id="stud">Stud</span></a></div>

        <? if ($checkType != 3): ?>
            <div id="commonWall" name="go"><a href="/?go=commonWall&type=other">Общая стена</a></div>
            <div id="lecture" name="go"><a href="/?go=lecture">Лекции</a></div>
            <div id="timetable" name="go"><a href="/?go=timeTable">Расписание</a></div>
        <? else : ?>
            <div id="message" name="go"><a href="/?go=messageWall">Сообщения</a></div>
            <div id="test" name="go"><a href="/?go=test">Тесты</a></div>
            <div id="lectureTeacher" name="go"><a href="/?go=lecture">Лекции</a></div>
        <? endif; ?>

            <div id="exit" name="go"><a href="/?go=exit">Выход</a></div>
            <div id="personalArea" name="go"><a href="/?go=personalArea">Личный кабинет</a></div>
    </div>
</div>