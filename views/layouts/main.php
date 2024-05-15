<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body class="d-flex flex-column h-100">
    <?php $this->beginBody() ?>

    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="<?= Yii::$app->homeUrl ?>" class="logo d-flex align-items-center">
                <img src="assets/img/logo.png" alt="">
                <span class="d-none d-lg-block"><?php echo Yii::$app->name ?></span>
            </a>


        </div><!-- End Logo -->


        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
                <ul class="d-flex align-items-center">
                    <!--                <li class="nav-item">-->
                    <!--                    <a class="nav-link" href="--><?php //= Yii::$app->homeUrl 
                                                                            ?>
                    <!--">Home</a>-->
                    <!--                </li>-->
                    <!---->
                    <!--                <li class="nav-item">-->
                    <!--                    <a class="nav-link" href="--><?php //= Yii::$app->urlManager->createUrl(['/site/about']) 
                                                                            ?>
                    <!--">About</a>-->
                    <!--                </li>-->
                    <!---->
                    <!--                <li class="nav-item">-->
                    <!--                    <a class="nav-link" href="--><?php //= Yii::$app->urlManager->createUrl(['/site/contact']) 
                                                                            ?>
                    <!--">Contact</a>-->
                    <!--                </li>-->

                    <?php if (Yii::$app->user->isGuest) : ?>
                    <li class="nav-item">
                        <a class="nav-link"
                            href="<?= Yii::$app->urlManager->createUrl(['/site/signup']) ?>">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= Yii::$app->urlManager->createUrl(['/site/login']) ?>">Login</a>
                    </li>
                    <?php else : ?>
                    <li class="nav-item">
                        <?= Html::beginForm(['/site/logout'], 'post') ?>
                        <?= Html::submitButton(
                                'Logout (' . Yii::$app->user->identity->EMAIL . ')',
                                ['class' => 'nav-link btn btn-link logout']
                            ) ?>
                        <?= Html::endForm() ?>
                    </li>
                    <?php endif; ?>
                </ul>


        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <?php
    //    NavBar::begin([
    //        'brandLabel' => Yii::$app->name,
    //        'brandUrl' => Yii::$app->homeUrl,
    //        'options' => ['class' => 'navbar-expand-md navbar-dark bg-dark fixed-top']
    //    ]);
    //    echo Nav::widget([
    //        'options' => ['class' => 'navbar-nav'],
    //        'items' => [
    //            ['label' => 'Home', 'url' => ['/site/index']],
    //            ['label' => 'About', 'url' => ['/site/about']],
    //            ['label' => 'Contact', 'url' => ['/site/contact']],
    //            ['label' => 'Signup', 'url' => ['/users/signup']],
    //            Yii::$app->user->isGuest
    //                ? ['label' => 'Login', 'url' => ['/site/login']]
    //                : '<li class="nav-item">'
    //                    . Html::beginForm(['/site/logout'])
    //                    . Html::submitButton(
    //                        'Logout (' . Yii::$app->user->identity->EMAIL . ')',
    //                        ['class' => 'nav-link btn btn-link logout']
    //                    )
    //                    . Html::endForm()
    //                    . '</li>'
    //        ]
    //    ]);
    //    NavBar::end();
    ?>


    <main id="main" class="main">
        <div class="container">
            <div class="pagetitle">
                <?php if (!empty($this->params['breadcrumbs'])) : ?>
                <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
                <?php endif ?>
                <?= Alert::widget() ?>
                <?= $content ?>
            </div>
        </div>
    </main>





    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>