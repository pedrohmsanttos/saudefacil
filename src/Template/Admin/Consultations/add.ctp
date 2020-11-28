<?= $this->Html->css('picker/default.css') ?>
<?= $this->Html->css('picker/default.date.css') ?>
<?= $this->Html->css('picker/default.time.css') ?>
<div class="col-md-12">
    <h2>Marcar Consulta</h2>   
    <hr>
    <div class="row">
        <div class="col-md-12">
            <!-- Form Elements -->
            <div class="panel panel-default">
                <div class="panel-body">
                <?= $this->Flash->render() ?>
                <?= $this->Form->create($consultation) ?>
                <?= $this->Form->input('user_id', ['label' => false,'value'=>$authUser['id'], 'type' => 'hidden', 'div' => false]); ?>
                <?= $this->Form->input('status_id', ['label' => false,'value'=>'1', 'type' => 'hidden', 'div' => false]); ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Dia</label>
                                <?= $this->Form->input('day', ['label' => false,'value'=>'', 'type' => 'text', 'div' => false, 'class' => 'form-control datepicker','placeholder' => '', 'disable' => false]); ?>
                            </div>
                            <div class="form-group">
                                <label>Hora</label>
                                <?= $this->Form->input('hour', ['label' => false,'value'=>'',  'type' => 'text', 'div' => false, 'class' => 'timepicker form-control','placeholder' => '']); ?>
                            </div>
                            
                            <div class="form-group">
                                <label>Observação</label>
                                <?= $this->Form->input('note', ['type' => 'textarea','rows'=>3,'label' => false, 'div' => false, 'class' => 'form-control','placeholder' => '']); ?>
                            </div>
                        </div> <!-- END col-md-6 -->
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Especialidade Médica</label>
                                <?= $this->Form->input('specialty_id', ['options' => $specialties, 'empty' => 'Selecione' ,'label' => false,'value'=>'', 'div' => false, 'class' => 'form-control','placeholder' => '']); ?>
                            </div>
                            <div class="form-group">
                                <label>Bairro de preferência para o atendimento</label>
                                <?= $this->Form->input('district_id', ['options' => $districts, 'empty' => 'Selecione' ,'label' => false,'value'=>'', 'div' => false, 'class' => 'form-control','placeholder' => '']); ?>
                            </div>   
                            <div class="form-group">
                                <span class="pull-right">
                                    <?= $this->Form->button(__('Marcar'), ['class' => 'btn btn-danger']) ?>
                                </span>
                            </div>
                        </div><!-- END col-md-6 -->
                    </div> <!-- END row -->
                <?= $this->Form->end() ?> 
                </div>
            </div>
             <!-- End Form Elements -->
        </div>
    </div>
</div>
<?= $this->Html->script('mask.js'); ?>
<?= $this->Html->script('picker/picker.js'); ?>
<?= $this->Html->script('picker/picker.date.js'); ?>
<?= $this->Html->script('picker/picker.time.js'); ?>
<?= $this->Html->script('picker/legacy.js'); ?>
<?= $this->Html->script('picker/pt_BR.js'); ?>
   <script type="text/javascript">
    $(function () {
        $('.datepicker').blur();
    });
       
   </script> 
    <script type="text/javascript">
        //pickdate
        var $input = $( '.datepicker' ).pickadate({
            formatSubmit: 'dd/mm/yyyy',
            min: 1,
            closeOnSelect: true ,
            closeOnClear: false,
        })

        var picker = $input.pickadate('picker')

        // picktime
        var $inputTime = $( '.timepicker' ).pickatime({
            clear: '',
            format: 'H:i',
            formatSubmit: 'HH:i',
            min: [8,00],
            max: [17,0]   

        })
        var pickerTime = $input.pickatime('picker')
        picker.open()
        
    </script>

