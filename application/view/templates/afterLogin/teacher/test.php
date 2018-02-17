
<div id="bodyTest">
    <div id="bodyTestLeft">
        <div id="bodyLeftTestCreate">
            <form method="post" action="/?go=test">
                <div id="bodyTestLeftListName">Создать тест</div>
                <input type="text" id="bodyTestLeftCount" name="count" placeholder="Сколько вопросов?">
                <div id="bodyTestLeftCreate">
                    <input type="submit" id="bodyTestLeftCreateSubmit" name="create" value="Создать">
                </div>
            </form>
        </div>
        <div id="bodyLeftTestList">
            <div id="bodyTestLeftListName">Список тестов</div>
            <div id="bodyTestLeftList">
                <?= $listTest;?>
            </div>
        </div>
        <div id="bodyLeftTestSend">
            <form method="post" action="/?go=test">
                <div id="bodyTestLeftListName">Отправить тест</div>
                <div class="bodyTestLeftOption">
                    <select name="test">
                        <?= $classTest->printOption($testList); ?>
                    </select>
                </div>
                <div class="bodyTestLeftOption">
                  к <select name="group">
                        <?= $classTest->printOption($group); ?>
                    </select>
                </div>
                <input type="submit" id="bodyTestLeftSendSubmit" name="send" value="Отправить">
            </form>
        </div>
    </div>
    <div id="bodyTestCenter">


        <?= $newTest;?>

        <? if(empty($_POST['create'])){ print $testStat;}; ?>

    </div>
</div>