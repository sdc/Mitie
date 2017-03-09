<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Services Support Desk</title>
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
            <div class="row">
                <div id="ticket-submission" class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
                    <div class="row">
                        <div id="title-block" class="col-md-10">
                            <h1 class="title">Property Services Support Desk</h1>
                            <h4 class="emergency-text">For emergencies i.e. leaks/floods, power loss, safety or security issues - call x877</h4>
                        </div>
                        <div class="col-md-2 hidden-xs hidden-sm">
                            <?= $this->Html->image('property-services-logo.png', [
                                'height' => 50,
                                'width' => 50,
                                'class' => 'pull-right logo'
                            ]) ?>
                        </div>
                    </div>
                    <?= $this->fetch('content') ?>
                </div>
            </div>
        </div>
    </div>
    <footer></footer>
    <?= $this->Html->script('Packages/jquery.min') ?>
    <?= $this->Html->script('Packages/bootstrap.min') ?>
    <?= $this->Html->script('Packages/modernizr-custom.min') ?>
    <?= $this->Html->script('notify') ?>
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
