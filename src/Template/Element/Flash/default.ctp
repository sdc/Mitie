<?php

$class = 'message';

if (!empty($params['class'])) {
    $class .= ' ' . $params['class'];
}

?>

<div class="alert alert-warning alert-dismissible animated fadeIn text-center" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>Warning!</strong> <?= h($message) ?>
</div>