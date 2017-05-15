<?= $this->Form->create($ticket, ['id' => 'ticket-form']) ?>
    <div class="form-group">
        <?= $this->Form->textarea('description', [
            'class' => 'form-control input-lg ticket-description',
            'disabled' => true,
            'value' => /*h*/($ticket->description)
        ]) ?>
    </div>
    <div class="form-group row">
        <div class="col-md-6 col-sm-12">
            <?= $this->Form->input('building_id', [
                'class' => 'form-control input-lg', 
                'options' => $buildings,
                'disabled' => true,
                'label' => false,
                'value' => h($ticket->building_id)
            ]) ?>
        </div>
        <div class="col-md-6 col-sm-12">
            <?= $this->Form->input('room', [
                'class' => 'form-control input-lg',
                'label' => false,
                'disabled' => true,
                'value' => h($ticket->room)
            ]) ?>
        </div>
    </div>
<?php
    if ($fullService) { ?>
    <hr />
    <div class="form-group row">
        <div class="col-md-6">
            <?= $this->Form->input('department', [
                'class' => 'form-control',
                'label' => false, 
                'disabled' => true,
                'value' => h($ticket->department)
            ]) ?>
        </div>
        <div class="col-md-6">
            <?= $this->Form->input('phone', [
                'class' => 'form-control',
                'label' => false, 
                'disabled' => true,
                'value' => h($ticket->phone)
            ]) ?>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-12">
            <?= $this->Form->input('priority', [
                'class' => 'form-control',
                'options' => $priorities,
                'disabled' => true,
                'label' => false,
                'value' => h($ticket->priority)
            ]) ?>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-12">
            <?= $this->Form->textarea('additional', [
                'class' => 'form-control pull-right ',
                'disabled' => true,
                'value' => /*h*/($ticket->additional)
            ]) ?>
        </div>
    </div>
<?php
    } ?>
<?= $this->Form->end() ?>
