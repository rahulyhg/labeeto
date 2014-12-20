<?php
    $cs = Yii::app()->clientScript;
//    $cs->registerScriptFile(Yii::app()->themeManager->baseUrl.'/js/foursquare.autocomplete.js');
//    $cs->registerScriptFile(Yii::app()->themeManager->baseUrl.'/js/slashman_myfeed.js');
    $cs->registerScriptFile(Yii::app()->themeManager->baseUrl.'/js/slashman_im.js');
    $cs->registerCssFile(Yii::app()->themeManager->baseUrl.'/css/im.css');
?>
<div class="row im-wrapper">
    <div class="col-md-5 dialogs-column">
        <div class="col-md-12 dialogs-search">
            <input type="text" class="form-control" placeholder="Search"/>
            <i class="fa fa-search"></i>
        </div>
        <div class="row dialogs">
            <?php
                foreach($dialogs as $dialog)
                {
                    $this->renderPartial('/elements/im/_dialog', array('data' => $dialog));
                }
            ?>
        </div>
    </div>
    <div class="col-md-7 messages-column">
        <?php if(count($dialogs) > 0) { ?>
            <div class="col-md-12 messages-header">
                <div class="col-md-2 avatar">
                    <img src="<?=Yii::app()->baseUrl?>/uploads/avatar/<?=$dialogs[0]['photo'];?>" class="img-circle img-responsive"/>
                </div>
                <div class="col-md-6 text">
                    <div class="row nickname">
                        <?=$dialogs[0]['username'];?>
                    </div>
                    <div class="row address">
                        <?=$dialogs[0]['address'];?>
                    </div>
                </div>
                <div class="col-md-4 buttons">
                    <div class="row new-message">
                        <a class="pink-button col-md-12">New Message</a>
                    </div>
                    <div class="row actions">
                        <a class="pink-button col-md-12">Actions <span class="bulls">&bull;&bull;&bull;</span></a>
                    </div>
                </div>
            </div>
            <div class="col-md-12 messages">
                <?php
                    foreach($messages as $message)
                    {
                        if($message->user_from != Yii::app()->user->getId())
                            $this->renderPartial('/elements/im/_message', array('data' => $message));
                        else
                            $this->renderPartial('/elements/im/_myMessage', array('data' => $message));
                    }
                ?>
            </div>
            <div class="col-md-12 message-form">
                <div class="col-md-12 form-panel">
                    <div class="row message-textarea">
                        <input type="text" name="toId" id="toId" value="<?=$dialogs[0]['userid'];?>" style="display: none;">
                        <textarea placeholder="Message"></textarea>
                    </div>
                    <div class="row message-panel-footer">
                        <div class="col-md-6 pull-left icons">
                            <i class="fa fa-camera"></i>
                            <i class="fa fa-map-marker"></i>
                        </div>
                        <div class="col-md-6 send-button-container">
                            <a class="pink-button simple send-message-button">Send</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>