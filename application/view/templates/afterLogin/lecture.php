
<div id="bodyLecture">
    <div id="bodyLeftLecture">

        <div id="bodyLeftLectureCreate">
            <form method="POST" action="" enctype="multipart/form-data">
                <div id="bodyTestLeftListName">Добавить лекцию</div>
                <input type="file" id="bodyLeftLectureFile" multiple name="upload[]" value="Выберите txt-файл">
                <input type="submit" class="bodyLeftLectureSubmit" value="Добавить">
            </form>
        </div>
        <div id="bodyLeftLectureList">
            <div id="bodyTestLeftListName">Список лекций</div>
            <div id="bodyLeftBrowser">
                <? if(!empty($filles)){print $filles;};?>
            </div>
        </div>

        <? if($checkType != 3) :?>
            <div id="bodyLeftTestList">
                <div id="bodyTestLeftListName">Список тестов</div>
                <div id="bodyTestLeftList">
                    <?= $listTest;?>
                </div>
            </div>
        <? else : ?>
            <div id="bodyLeftLectureSend">
                <form method="post" action="/?go=lecture">
                    <div id="bodyTestLeftListName">Отправить лекцию</div>
                    <div class="bodyLeftOption">
                        <select name="lecture">
                            <?= $lectureList; ?>
                        </select>
                    </div>
                    <div class="bodyLeftOption">
                        к <select name="group">
                            <?= $classTest->printOption($groupName); ?>
                        </select>
                    </div>
                    <input type="submit" id="bodyLeftSendSubmit" name="lection" value="Отправить">
                </form>
            </div>
        <? endif; ?>

    </div>

    <?= $textFiles; ?>

    <? if($checkType != 3) :?>
        <?= $textTest;?>
    <? endif; ?>

    </div>
</div>