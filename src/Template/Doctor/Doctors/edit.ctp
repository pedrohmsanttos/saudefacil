<?php  use Cake\I18n\Time; ?>
<?php //pr($user);die;  ?>
<div class="col-md-12">
    <h2>Meus Dados</h2>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <!-- Form Elements -->
            <div class="panel panel-default">
                <div class="panel-body">
                <?= $this->Flash->render() ?>
                <?= $this->Form->create($doctor) ?>
                    <div class="row">
                        <div class="col-md-6">
                            <legend>Dados Pessoais <span><i class="fa fa-user"></i></span></legend>
                             <!-- <hr> -->
                            <div class="form-group">
                                <label>Nome</label>
                                <?= $this->Form->input('name', ['label' => false, 'div' => false, 'class' => 'form-control', 'placeholder' => '']); ?>
                            </div>

                            <legend>Dados de Acesso <span><i class="fa fa-key"></i></span></legend>
                            <div class="form-group">
                                <label>Email</label>
                                <?= $this->Form->input('username', ['label' => false, 'type' => 'email', 'div' => false, 'class' => 'form-control','placeholder' => 'Email', 'data-validation' => 'email']); ?>
                            </div>

                            </div> <!-- END col-md-6 -->

                        <div class="col-md-6">
                            

                            <legend>Dados Profissionais <span><i class="fa fa-user-md"></i></span></legend>
                              <!-- <hr> -->
                              <div class="form-group">
                                  <label>Unidade de Saúde</label>
                                  <?= $this->Form->input('unit_id', ['label' => false, 'div' => false, 'class' => 'form-control','options' => $units]); ?>
                              </div>

                              <div class="form-group">
                                <label>CRM</label>
                                <?= $this->Form->input('cfm', ['label' => false, 'div' => false, 'class' => 'form-control','placeholder' => 'CRM']); ?>
                            </div>
                             <div class="form-group">
                                <span class="pull-right">
                                    <?= $this->Form->button(__('Atualizar Dados'), ['class' => 'btn btn-danger']) ?>
                                </span>
                            </div>
                        </div><!-- END col-md-6 -->
                    </div> <!-- END row -->
                <?= $this->Form->end() ?>
                </div> <!-- END panel-body -->
            </div>
             <!-- End Form Elements -->
        </div>
    </div>
</div>


<?= $this->Html->script('mask.js'); ?>
