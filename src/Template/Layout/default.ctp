<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mitie Helpdesk</title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('Packages/bootstrap.min') ?>
    <?= $this->Html->css('Packages/font-awesome.min') ?>
<?php 
    if (isset($css) && is_array($css)) { 
        foreach($css as $cssFile) {
            echo $this->Html->css($cssFile);
        }
    }
?>
    <link href="https://fonts.googleapis.com/css?family=Patua+One" rel="stylesheet" type="text/css">
</head>
<body>
    <?= $this->Flash->render() ?>
    <div class="container-fluid row">
        <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
            <?= $this->fetch('content') ?>
        </div>
    </div>
    <footer>
    </footer>
    <?= $this->Html->script('Packages/jquery.min') ?>
    <?= $this->Html->script('Packages/bootstrap.min') ?>
    <?= $this->Html->script('Packages/modernizr-custom.min') ?>
<?php 
    if (isset($js) && is_array($js)) { 
        foreach($js as $jsFile) {
            echo $this->Html->script($jsFile);
        }
    }
?>
</body>
</html>
<noscript>
    <style type="text/css">
        .container-fluid { 
            display: none !important;
        }

        body {
            background: none;
        }
    </style>
    <div class="noscriptmsg">
        Please enable JavaScript to use this service
    </div>
</noscript>
