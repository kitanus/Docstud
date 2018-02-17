
<div id="bodyWall">
    <div id="bodyCenterWall">
        <div id="bodyCenterTeacherWall">
            <form method="post" action="/?go=messageWall">
                <div id="bodyCenterTeacherWallAdd">
                    <input type="text" name="content" id="bodyCenterTeacherWallAddText">
                    <div id="bodyCenterTeacherWallAddAdress">
                        <select class="bodyCenterTeacherWallAddAdressSelect" name="group">
                            <option value="no">Группа</option>
                            <?= $functionsMessage->printOption($group); ?>
                        </select>
                        <select class="bodyCenterTeacherWallAddAdressSelect" name="email">
                            <option value="no">Емайл</option>
                            <?= $functionsMessage->printOption($email); ?>
                        </select>
                    </div>
                    <input type="submit" class="bodyCenterTeacherWallAddSubmit" name="step" value=">>">
                </div>
            </form>
            <?php foreach($message as $key => $value) : ?>
                <div class='bodyCenterTeacherWallMessages' <?= $functionsMessage->cssIfType($value)?> >
                    <div class='bodyCenterTeacherWallMessagesHeader'>
                            <a href="/?go=messageWall&idDelete=<?= $value['message_id']?>&step=deleteTeacherWall" class='bodyCenterTeacherWallMessagesHeaderClose'>Delete</a>
                        </div>
                    <div class='bodyCenterTeacherWallMessagesContent'><?= $value['message_content'] ?></div>
                    <div class='bodyCenterTeacherWallMessagesFooter'>
                        <div class='bodyCenterTeacherWallMessagesFooterUser'><?= $functionsMessage->choiceOutputMessage($value) ?></div>
                        <div class='bodyCenterTeacherWallMessagesFooterDatetime'><?= $value['message_time']?></div>
                    </div>
                </div>
            <? endforeach; ?>
        </div>
    </div>
</div>