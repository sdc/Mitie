<div class="row">
    <div id="ticket-submission" class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
        <h1 class="title">Property Services Helpdesk</h1>
        <?= $this->Form->create($ticket, ['id' => 'ticket-form']) ?>
            <?= $this->Form->input('full-service', [
                'type' => 'hidden', 
                'value' => 0
            ]) ?>
            <div class="form-group">
                <?= $this->Form->textarea('description', [
                    'class' => 'form-control input-lg ticket-description',
                    'placeholder' => 'Description (required)',
                    'required' => true,
                    'maxLength' => 500
                ]) ?>
            </div>
            <div class="form-group row">
                <div class="col-md-6 col-sm-12">
                    <?= $this->Form->input('building_id', [
                        'class' => 'form-control input-lg', 
                        'options' => $buildings,
                        'empty' => 'Select a building (required)',
                        'label' => false,
                        'required' => true
                    ]) ?>
                </div>
                <div class="col-md-6 col-sm-12">
                    <?= $this->Form->input('room', [
                        'class' => 'form-control input-lg',
                        'label' => false,
                        'placeholder' => 'Room number / location (required)',
                        'required' => true,
                        'maxLength' => 150
                    ]) ?>
                </div>
            </div>
            <div class="form-group checkbox row">
                <div class="col-lg-3 col-md-5 col-sm-5 col-xs-12">
                    <div id="progress-tick" class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-circle-o"></i>
                        </span>
                        <input type="text" disabled class="display form-control" value="Progress Updates?">
                    </div>
                </div>
            </div>
            <div id="full-service-form">
                <div class="form-group row">
                    <div class="col-md-4">
                        <?= $this->Form->input('department', [
                            'class' => 'form-control',
                            'label' => false, 
                            'placeholder' => 'Department',
                            'required' => false,
                            'disabled' => true,
                            'maxLength' => 150
                        ]) ?>
                    </div>
                    <div class="col-md-4">
                        <?= $this->Form->input('phone', [
                            'class' => 'form-control',
                            'label' => false, 
                            'placeholder' => 'Contact phone number',
                            'required' => false,
                            'disabled' => true,
                            'type' => 'number',
                            'maxLength' => 20
                        ]) ?>
                    </div>
                    <div class="col-md-4">
                        <?= $this->Form->input('priority', [
                            'class' => 'form-control',
                            'options' => $priorities,
                            'empty' => 'Select a priority',
                            'required' => false,
                            'label' => false,
                            'disabled' => true
                        ]) ?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <?= $this->Form->textarea('additional', [
                            'class' => 'form-control pull-right ',
                            'placeholder' => 'Aditional Information',
                            'required' => false,
                            'disabled' => true,
                            'maxLength' => 500
                        ]) ?>
                    </div>
                </div>              
            </div>
            <div class="row">
                <div class="pull-right col-md-2 col-xs-12">
                    <?= $this->Form->submit('Submit ticket', [
                        'class' => 'btn btn-default pull-right',
                        'id' => 'submit-ticket'
                    ]) ?>
                </div>
            </div>
        <?= $this->Form->end() ?>
    </div>
</div>
