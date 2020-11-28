<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="phmsanttos@gmail.com">
    <title>Saúde Fácil - <?= $title ?></title>
    <?php //pr($this->request->webroot);die; ?>
    <style type="text/css">
        .login-page
        {
            background-image: url('<?= $this->request->webroot ?>img/back/B2.png');
            /*background-repeat: no-repeat;
            bottom: 0;
            color: black;
            left: 0;
            overflow: auto;
            padding: 3em;
            position: absolute;
            right: 0;
            text-align: center;
            top: 0;
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;*/

            /*background-repeat: no-repeat;
            background-size:100%;
            bottom: 0;
            color: black;
            left: 0;
            overflow: auto;
            padding: 3em;
            position: absolute;
            right: 0;
            text-align: center;
            top: 0;
            background-size: cover;
*/

        }
    </style>
    <?= $this->Html->css('bootstrap.css') ?>
    <?= $this->Html->css('font-awesome.css') ?>
    <?= $this->Html->css('custom.css') ?>
    <?= $this->Html->script('jquery-1.10.2.js'); ?>
    <?= $this->Html->script('bootstrap.min.js'); ?>
    <?= $this->Html->script('jquery.metisMenu.js'); ?>
    <?= $this->Html->script('custom.js'); ?>
    <?= $this->Html->script('jquery.mask.js'); ?>
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />


</head>
<body class="login-page">
    <div class="container">
        <div class="row text-center  ">
            <div class="col-md-12">
                <?= $this->Html->image('logo-saude-facil.png', ['alt' => 'Logo - Saúde Fácil', 'width' => '500', 'class' => 'img-responsive', 'style' => 'margin: 0 auto;']); ?>
                <h2> <?= $title ?>  <span class=""><i class="fa fa-user"  ></i></span></h2>

                <h5></h5>
                 <br />
            </div>
        </div>
         <div class="row">
            <?= $this->fetch('content') ?>

        </div>
    </div>
    <!-- <script src="assets/js/custom.js"></script> -->

</body>
</html>
