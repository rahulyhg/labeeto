
<!-- Status bar overlay for full screen mode (PhoneGap) -->
<div class="statusbar-overlay"></div>
<!-- Panels overlay-->
<div class="panel-overlay"></div>
<!-- Left panel with reveal effect-->
<div class="panel panel-left panel-reveal">
    <div class="content-block">
        <p>Left panel content goes here</p>
    </div>
</div>
<!-- Views -->
<div class="views">
    <!-- Your main view, should have "view-main" class -->
    <div class="view view-main">
        <!-- Top Navbar-->

        <?php $this->renderPartial('../elements/mobile_nav'); ?>
        <!-- Pages container, because we use fixed-through navbar and toolbar, it has additional appropriate classes-->
        <div class="pages navbar-through toolbar-through">
            <!-- Page, "data-page" contains page name -->
            <div data-page="index" class="page">
                <!-- Scrollable page content -->
                <div class="page-content dialogs-page">
                    <div class="list-block media-list">
                        <ul class="mobile-dialogs">
                            <?php foreach($dialogs as $dialog): ?>
                                <li>
                                    <div class="row">
                                        <div class="col-md-12 dialog">
                                            <a href="<?=$this->createUrl('/im/mobileChat', ['user_id' => $dialog['id']]);?>" class="item-link item-content external">
                                                <div class="col-md-1 avatar">
                                                    <img src="<?=Yii::app()->baseUrl?>/uploads/avatar/<?=$dialog['photo'];?>" class="img-circle img-responsive img-thumbnail">
                                                </div>
                                                <div class="col-md-10">
                                                    <div class="row username">
                                                        <?=$dialog['username'];?>
                                                    </div>
                                                    <div class="row last-message">
                                                        <?=$dialog['lastMessage'];?>
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <div class="row date">
                                                        <?=date('d M', strtotime($dialog['created']));?>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>