<?= $this->Form->create($ticket, ['id' => 'ticket-form']) ?>
    <?= $this->Form->input('full-service', [
        'type' => 'hidden', 
        'value' => 0
    ]) ?>
    <div class="form-group">
        <label for="description">Description (required)</label>
        <?= $this->Form->textarea('description', [
            'class' => 'form-control input-lg ticket-description',
            'placeholder' => 'Description (required) - For our \'QUICK\' service, please enter basic information in this box',
            'required' => true,
            'maxLength' => 100
        ]) ?>
    </div>
    <div class="form-group row">
        <div class="col-md-6 col-sm-12">
            <?= $this->Form->input('building_id', [
                'class' => 'form-control input-lg', 
                'options' => $buildings,
                'empty' => 'Select a building (required)',
                'label' => 'Building (required)',
                'required' => true
            ]) ?>
        </div>
        <div class="col-md-6 col-sm-12">
            <?= $this->Form->input('room', [
                'class' => 'form-control input-lg',
                'label' => 'Room (required)',
                'placeholder' => 'Room number / location (required)',
                'required' => true,
                'maxLength' => 150
            ]) ?>
        </div>
    </div>
    <div class="form-group checkbox row">
        <div class="col-lg-5 col-md-7 col-sm-12 col-xs-12">
            <div id="progress-tick" class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-circle-o"></i>
                </span>
                <input type="text" disabled class="display form-control" value="Click for 'FULL' service with progress updates">
            </div>
        </div>
    </div>
    <div id="full-service-form">
        <div class="form-group row">
            <div class="col-md-4">
                <?= $this->Form->input('department', [
                    'class' => 'form-control',
                    'label' => 'Department', 
                    'placeholder' => 'Department (required)',
                    'required' => false,
                    'disabled' => true,
                    'maxLength' => 150
                ]) ?>
            </div>
            <div class="col-md-4">
                <?= $this->Form->input('phone', [
                    'class' => 'form-control',
                    'label' => 'Phone', 
                    'placeholder' => 'Contact phone number (required)',
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
                    'empty' => 'Select a priority (required)',
                    'required' => false,
                    'label' => 'Priority',
                    'disabled' => true
                ]) ?>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-12">
                <label for="additional">Additional Information</label>
                <?= $this->Form->textarea('additional', [
                    'class' => 'form-control pull-right ',
                    'placeholder' => 'Additional Information',
                    'required' => false,
                    'disabled' => true,
                    'maxLength' => 200
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
