<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="author" content="phmsanttos@gmail.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Saúde Fácil - <?= $title ?></title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <!-- <script src="https://code.jquery.com/jquery-3.1.1.js"></script> -->
    <?= $this->Html->css('bootstrap.css') ?>
    <?= $this->Html->css('font-awesome.css') ?>
    <?= $this->Html->css('custom.css') ?>
    <?= $this->Html->css('fullcalendar/dist/css/fullcalendar.css') ?>
    <!-- <?= $this->Html->script('jquery-1.10.2.js'); ?> -->
    <!-- <?= $this->Html->script('jquery-3.1.1.js'); ?> -->
    <?= $this->Html->script('jquery-3.3.1.js'); ?>
    <?= $this->Html->script('bootstrap.min.js'); ?>
    <?= $this->Html->script('jquery.metisMenu.js'); ?>
    <?= $this->Html->script('morris/morris'); ?>
    <?=  $this->Html->script('custom.js'); ?>
    <?= $this->Html->script('jquery.mask.js'); ?>
    <?= $this->Html->script('morris/raphael-2.1.0.min'); ?>
    <?= $this->Html->script('moment/moment.js'); ?>
    <?= $this->Html->script('fullcalendar/dist/fullcalendar.js'); ?>
    <?= $this->Html->script('fullcalendar/dist/locale/pt-br.js'); ?>
</head>
<body>
    <div id="wrapper">
     <?php //pr($this->request);die; ?>
           <?= $this->element('navbar'); ?>
           <?= $this->element('sidebar'); ?>
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                       <?= $this->fetch('content') ?>

                </div>
                 <!-- /. ROW  -->
                 <hr />
            </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->

</body>
</html>
