<?php use Cake\I18n\Date; ?>
<?php 
    $date = $consultation->day;
    // $date = new Date($consultation->day);
    // pr($date);die;
?>
<?= $this->Html->css('picker/default.css') ?>
<?= $this->Html->css('picker/default.date.css') ?>
<?= $this->Html->css('picker/default.time.css') ?>
<div class="col-md-12">
    <h2>Consulta - <?= $consultation->user->name ?></h2>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <!-- Form Elements -->
            <div class="panel panel-default">
                <div class="panel-body">
                <?= $this->Flash->render() ?>
                <?= $this->Form->create($consultation) ?>
                <?= $this->Form->input('user_id', ['label' => false, 'type' => 'hidden', 'div' => false]); ?>
                <?= $this->Form->input('specialty_id', ['label' => false, 'type' => 'hidden', 'div' => false]); ?>
                <?= $this->Form->input('status_id', ['value'=>$consultation->status_id, 'type' => 'hidden']); ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Dia</label>
                                <?= $this->Form->input('day', ['label' => false,'value'=>'', 'type' => 'text', 'div' => false, 'class' => 'form-control date','value' => $consultation->day->i18nFormat('dd/MM/yyyy'), 'disable' => false]); ?>
                            </div>
                            <div class="form-group">
                                <label>Hora</label>
                                <?= $this->Form->input('hour', ['label' => false,'value'=>'',  'type' => 'text', 'div' => false, 'class' => ' form-control hour','value' => $consultation->hour]); ?>
                            </div>
                            <div class="form-group">
                                <label>Médico</label>
                                <?php echo $this->Form->input('doctor_id', ['options' => $doctors, 'empty' => 'Selecione' ,'label' => false,'value'=>'', 'div' => false, 'class' => 'form-control']); ?>
                            </div>
                           
                        </div> <!-- END col-md-6 -->

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Especialidade Médica</label>
                                <div class="input text required">
                                    <input type="text" name="specialty_name" class="form-control" id="specialty_name" value="<?=$consultation['specialty']['name']?>" disabled="">
                                </div>
                            </div>
                             <div class="form-group">
                                <label>Observação</label>
                                <?= $this->Form->input('note', ['type' => 'textarea','rows'=>3,'label' => false, 'div' => false, 'class' => 'form-control','placeholder' => '', 'disabled'=>'disabled']); ?>
                            </div>
                            
                            <div class="form-group">
                                <span class="pull-right">
                                    <?= $this->Form->button(__('Atualizar'), ['class' => 'btn btn-danger']) ?>
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


<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $consultation->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $consultation->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Consultations'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Specialties'), ['controller' => 'Specialties', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Specialty'), ['controller' => 'Specialties', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Status Consultations'), ['controller' => 'StatusConsultations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Status Consultation'), ['controller' => 'StatusConsultations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Districts'), ['controller' => 'Districts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New District'), ['controller' => 'Districts', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="consultations form large-9 medium-8 columns content">
    <?= $this->Form->create($consultation) ?>
    <fieldset>
        <legend><?= __('Edit Consultation') ?></legend>
        <?php
            echo $this->Form->input('day');
            echo $this->Form->input('hour');
            echo $this->Form->input('specialty_id', ['options' => $specialties]);
            echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('status_id', ['options' => $statusConsultations]);
            echo $this->Form->input('district_id', ['options' => $districts]);
            echo $this->Form->input('note');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div> -->
