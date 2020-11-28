<div class="col-md-12">
    <h2>Cadastrar Usuário</h2>   
    <hr>
    <div class="row">
        <div class="col-md-12">
            <!-- Form Elements -->
            <div class="panel panel-default">
                <div class="panel-body">
                <?= $this->Flash->render() ?>
                <?= $this->Form->create($admin) ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nome</label>
                                <?= $this->Form->input('name', ['label' => false,'value'=>'', 'type' => '', 'div' => false, 'class' => 'form-control','placeholder' => '']); ?>
                            </div>
                            <div class="form-group">
                                <label>TIPO</label>
                                <?= $this->Form->input('role', ['options' => $role, 'empty' => 'Selecione', 'label' => false,'value'=>'', 'type' => '', 'div' => false, 'class' => 'form-control','placeholder' => '']); ?>
                            </div>
                        </div> <!-- END col-md-6 -->
                        
                        <div class="col-md-6">
                                <div class="form-group">
                                    <label>EMAIL</label>
                                    <?= $this->Form->input('username', ['label' => false,'value'=>'',  'type' => '', 'div' => false, 'class' => 'form-control','placeholder' => '']); ?>
                                </div>
                                <div class="form-group">
                                    <label>SENHA</label>
                                    <?= $this->Form->input('password', ['label' => false,'value'=>'',  'type' => '', 'div' => false, 'class' => 'form-control','placeholder' => '']); ?>
                                </div>
                             <div class="form-group">
                                <span class="pull-right">
                                    <?= $this->Form->button(__('Cadastrar'), ['class' => 'btn btn-danger']) ?>
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

