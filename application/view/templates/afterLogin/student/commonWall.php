
<div id="bodyWall">
    <div id="bodyCenterWall">
        <div id="bodyCenterCommonWall">
            <div id="bodyCenterCommonWallHeader">
                <a id="bodyCenterCommonWallHeaderMyButtom" href="/?go=commonWall&type=my">Моя стена</a>
                <a id="bodyCenterCommonWallHeaderOtherButtom" href="/?go=commonWall&type=other">Общая стена</a>
            </div>

            <? if ($_GET["type"] == "other"): ?>
                <form method="post" action="/?go=commonWall&type=other">
                    <div id="bodyCenterCommonWallAdd">
                        <input type="text" name="content" id="bodyCenterCommonWallAddText">
                        <input type="submit" class="bodyCenterCommonWallAddSubmit" name="step" value=">>">
                    </div>
                </form>
            <? endif; ?>

            <?php foreach($message as $key => $value) : ?>
                <div class='bodyCenterCommonWallMessages' <?= $functionsMessage->cssIfType($value)?> >

                    <? if ($_GET["type"] == "other" && $checkType == 1 && empty($value['teacher_name'])): ?>
                        <div class='bodyCenterCommonWallMessagesHeader'>
                            <a href="/?go=commonWall&idDelete=<?= $value['message_id']?>&step=deleteCommonWall&type=other" class='bodyCenterCommonWallMessagesHeaderClose'>Delete</a>
                        </div>
                    <? endif; ?>

                    <div class='bodyCenterCommonWallMessagesContent'><?= $value['message_content'] ?></div>
                    <div class='bodyCenterCommonWallMessagesContent'></div>
                    <div class='bodyCenterCommonWallMessagesFooter'>
                        <div class='bodyCenterCommonWallMessagesFooterUser'><?= $functionsMessage->choiceOutputMessage($value) ?></div>
                        <div class='bodyCenterCommonWallMessagesFooterDatetime' onclick="ifDelete()"><?= $value['message_time']?></div>
                    </div>
                </div>
            <? endforeach; ?>

        </div>
    </div>
</div>