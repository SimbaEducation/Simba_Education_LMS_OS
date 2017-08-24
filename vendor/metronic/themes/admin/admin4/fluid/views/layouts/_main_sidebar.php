<?php

use yii\helpers\Url;
use kartik\sidenav\SideNav;

/**
 * Variables to control the selection of side bar.
 * @todo : enhancement
 */
$activeController = strtolower($this->context->id);
$activeAction = strtolower($this->context->action->id);
$activeControllerAction = $activeController . '.' . $activeAction;
$activeCssClass = 'active';
$openCssClass = 'open';
$emptyCssClass = ' ';
$notActiveCssClass = '';
?>
<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar md-shadow-z-2-i  navbar-collapse ">

        <!--        <ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
        
                    <li class="start <?= ($activeControllerAction === 'site.index') ? $activeCssClass : $notActiveCssClass; ?>">
                        <a href="<?= Url::home() ?>">
                            <i class="icon-home"></i>
                            <span class="title">Dashboard</span>
                        </a>
                    </li>
                    <li class="<?= (in_array($activeController, ['user', 'user-type']) && $activeAction !== 'profile') ? $activeCssClass . $emptyCssClass . $openCssClass : $notActiveCssClass; ?> last">
                        <a href="javascript:;">
                            <i class="icon-users"></i>
                            <span class="title">Users</span>
                            <span class="arrow "></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="<?= (in_array($activeControllerAction, ['user.index', 'user.create', 'user.update'])) ? $activeCssClass : $notActiveCssClass; ?>">
                                <a href="<?= Url::to(['/user/index']) ?>">
                                    <i class="fa fa-chevron-right"></i>
                                    <span class="title">Users</span>
                                </a>
                            </li>
                            <li class="<?= ($activeControllerAction === 'user-type.index') ? $activeCssClass : $notActiveCssClass; ?>">
                                <a href="<?= Url::to(['/user-type/index']) ?>">
                                    <i class="fa fa-chevron-right"></i>
                                    <span class="title">User Types</span>
                                </a>
                            </li>
                        </ul>
                    </li>
        
                    <li class="start <?= ($activeControllerAction === 'settings.index') ? $activeCssClass : $notActiveCssClass; ?>">
                        <a href="<?= Url::to(['/settings/index']) ?>">
                            <i class="icon-settings"></i>
                            <span class="title">Settings</span>
                        </a>
                    </li>-->

        <!--<li class="last">
                <a href="javascript:;">
                <i class="icon-users"></i>
                <span class="title">Rbac Manager</span>
                <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                        <li>
                                <a href="<?= Yii::$app->getUrlManager()->createUrl('rbac'); ?>">
                                RBAC</a>
                        </li>
                        <li>
                                <a href="<?= Yii::$app->getUrlManager()->createUrl('auth-assignment'); ?>">
                                Auth Assignment</a>
                        </li>
                        <li>
                                <a href="<?= Yii::$app->getUrlManager()->createUrl('auth-item'); ?>">
                                Auth Item</a>
                        </li>
                        <li>
                                <a href="<?= Yii::$app->getUrlManager()->createUrl('auth-item-child'); ?>">
                                Auth Item Child</a>
                        </li>
                        <li>
                                <a href="<?= Yii::$app->getUrlManager()->createUrl('auth-rule'); ?>">
                                Auth Rule</a>
                        </li>
                </ul>
        </li>-->
        </ul>

        <?php
        echo SideNav::widget([
            'type' => SideNav::TYPE_DEFAULT,
            'items' => [
                [
                    'url' => Url::to(['/site/index']),
                    'label' => 'Dashboard',
                    'icon' => 'home',
                    'active' => $activeControllerAction === 'site.index' ? $activeCssClass : $notActiveCssClass
                ],
                [
                    'url' => Url::to(['/school/index']),
                    'label' => 'Schools',
                    'icon' => 'graduation',
                    'active' => in_array($activeControllerAction, ['school.index', 'school.create', 'school.update']) ? $activeCssClass : $notActiveCssClass
                ],
                [
                    'url' => Url::to(['/segment/index']),
                    'label' => 'Segments',
                    'icon' => 'list',
                    'active' => in_array($activeControllerAction, ['segment.index', 'segment.create', 'segment.update']) ? $activeCssClass : $notActiveCssClass
                ],
                [
                    'url' => Url::to(['/news/index']),
                    'label' => 'News',
                    'icon' => 'paper-clip',
                    'active' => in_array($activeControllerAction, ['news.index', 'news.create', 'news.update']) ? $activeCssClass : $notActiveCssClass
                ],
                [
                    'label' => 'Users',
                    'icon' => 'users',
                    'active' => in_array($activeController, ['user', 'user-type']) ? $activeCssClass : $notActiveCssClass,
                    'items' => [
                        ['label' => 'Users', 'icon' => 'user', 'url' => Url::to(['/user/index']), 'active' => in_array($activeControllerAction, ['user.index', 'user.create', 'user.update']) ? $activeCssClass : $notActiveCssClass],
                        ['label' => 'User Types', 'icon' => 'layers', 'url' => Url::to(['/user-type/index']), 'active' => in_array($activeControllerAction, ['user-type.index', 'user-type.create', 'user-type.update', 'user-type.view']) ? $activeCssClass : $notActiveCssClass],
                    ],
                ],
                [
                    'label' => 'Support Manager',
                    'icon' => 'support',
                    'active' => in_array($activeController, ['post', 'category']) ? $activeCssClass : $notActiveCssClass,
                    'items' => [
                        ['label' => 'Categories', 'icon' => 'tag', 'url' => Url::to(['/category/index']), 'active' => in_array($activeControllerAction, ['category.index', 'category.create', 'category.update']) ? $activeCssClass : $notActiveCssClass],
                        ['label' => 'Posts', 'icon' => 'pencil', 'url' => Url::to(['/post/index']), 'active' => in_array($activeControllerAction, ['post.index', 'post.create', 'post.update', 'post.view']) ? $activeCssClass : $notActiveCssClass],
                    ],
                ],
                [
                    'label' => 'Curriculum Manager',
                    'icon' => 'list',
                    'active' => in_array($activeController, ['cycles', 'cycle-templates', 'activities', 'activity-question', 'sub-subjects', 'subjects', 'preferences', 'activity-categories', 'domain-of-subject', 'standards', 'types-of-cycles']) ? $activeCssClass : $notActiveCssClass,
                    'items' => [
                        ['label' => 'Preferences', 'icon' => 'support', 'url' => Url::to(['/preferences/index']), 'active' => in_array($activeControllerAction, ['standards.index', 'standards.create', 'standards.update', 'standards.view', 'types-of-cycles.index', 'types-of-cycles.create', 'types-of-cycles.update', 'types-of-cycles.view', 'preferences.index', 'activity-categories.index', 'activity-categories.create', 'activity-categories.update', 'activity-categories.view']) ? $activeCssClass : $notActiveCssClass],
                        ['label' => 'Subjects', 'icon' => 'tag', 'url' => Url::to(['/subjects/index']), 'active' => in_array($activeControllerAction, ['subjects.index', 'subjects.create', 'subjects.update', 'subjects.view']) ? $activeCssClass : $notActiveCssClass],
                        ['label' => 'Learning Outcomes', 'icon' => 'notebook', 'url' => Url::to(['/sub-subjects/index']), 'active' => in_array($activeControllerAction, ['sub-subjects.index', 'sub-subjects.create', 'sub-subjects.update', 'sub-subjects.view']) ? $activeCssClass : $notActiveCssClass],
                        ['label' => 'Activity Question', 'icon' => 'question', 'url' => Url::to(['/activity-question/index']), 'active' => in_array($activeControllerAction, ['activity-question.index', 'activity-question.create', 'activity-question.update', 'activity-question.view']) ? $activeCssClass : $notActiveCssClass],
                        ['label' => 'Activities', 'icon' => 'list', 'url' => Url::to(['/activities/index']), 'active' => in_array($activeControllerAction, ['activities.index', 'activities.create', 'activities.update', 'activities.view']) ? $activeCssClass : $notActiveCssClass],
                        ['label' => 'Cycle Templates', 'icon' => 'grid', 'url' => Url::to(['/cycle-templates/index']), 'active' => in_array($activeControllerAction, ['cycle-templates.index', 'cycle-templates.create', 'cycle-templates.update', 'cycle-templates.view','cycle-templates.createtemplate','cycle-templates.updatetemplate']) ? $activeCssClass : $notActiveCssClass],
                        ['label' => 'Cycles', 'icon' => 'loop', 'url' => Url::to(['/cycles/index']), 'active' => in_array($activeControllerAction, ['cycles.index', 'cycles.create', 'cycles.update', 'cycles.view']) ? $activeCssClass : $notActiveCssClass],
                    ],
                ],
                [
                    'url' => Url::to(['/settings/index']),
                    'label' => 'Settings',
                    'icon' => 'settings',
                    'active' => $activeControllerAction === 'settings.index' ? $activeCssClass : $notActiveCssClass
                ],
            ],
        ]);
        ?>
        <!-- END SIDEBAR MENU -->
    </div>
</div>
<!-- END SIDEBAR -->