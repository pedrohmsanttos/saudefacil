<div class="col-md-12">
    <h2>Editar Unidade de Saúde</h2>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <!-- Form Elements -->
            <div class="panel panel-default">
                <div class="panel-body">
                <?php //pr($specialties);die; ?>
                <?= $this->Flash->render() ?>
                <?= $this->Form->create($unit) ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nome</label>
                                <?= $this->Form->input('name', ['label' => false, 'type' => '', 'div' => false, 'class' => 'form-control','placeholder' => '']); ?>
                            </div>

                            <div class="form-group">
                                <label>CNES</label>
                                <?= $this->Form->input('cnes', ['label' => false, 'type' => '', 'div' => false, 'class' => 'form-control','placeholder' => '']); ?>
                            </div>

                            <div class="form-group">
                                <label>RPA</label>
                                <?= $this->Form->input('rpa', ['options' => $rpas, 'empty'=>'Selecione', 'label' => false, 'type' => '', 'div' => false, 'class' => 'form-control','placeholder' => '']); ?>
                            </div>

                            <div class="form-group">
                                <label>Telefone</label>
                                <?= $this->Form->input('phone', ['label' => false, 'type' => '', 'div' => false, 'class' => 'form-control phone ','placeholder' => '']); ?>
                            </div>

                            <div class="form-group">
                                <label>Endereço</label>
                                <?= $this->Form->input('address', ['label' => false, 'type' => '', 'div' => false, 'class' => 'form-control','placeholder' => '']); ?>
                            </div>

                            <div class="form-group">
                                <label>Bairro</label>
                                <?= $this->Form->input('district_id', ['options' => $districts, 'label' => false, 'div' => false, 'class' => 'form-control']); ?>
                            </div>

                        </div> <!-- END col-md-6 -->

                        <div class="col-md-6">

                            <div class="form-group">
                            <label>Epecialidades Médica</label>
                            <?= $this->Form->input('specialties._ids', ['options' => $specialties, 'label' => false, 'type' => '', 'div' => false, 'class' => 'form-control specialties','placeholder' => '']); ?>
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

<?= $this->Html->css('multiselect/multi-select.css') ?>
<?= $this->Html->script('mask.js'); ?>
<?= $this->Html->script('multiselect/jquery.multi-select.js'); ?>
<?= $this->Html->script('multiselect/jquery.quicksearch.js'); ?>
<?= $this->Html->script('multiselect/multi.js'); ?>
