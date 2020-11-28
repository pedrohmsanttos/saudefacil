<div class="col-md-12">
    <h2>Alterar Senha</h2>   
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
                            <div class="form-group">
                                <label>Senha</label>
                                <?= $this->Form->input('password', ['label' => false,'value'=>'', 'type' => 'password', 'div' => false, 'class' => 'form-control','placeholder' => '']); ?>
                            </div>
                        </div> <!-- END col-md-6 -->
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                    <label>Confirmar Senha</label>
                                    <?= $this->Form->input('confirm_password', ['label' => false,'value'=>'',  'type' => 'password', 'div' => false, 'class' => 'form-control','placeholder' => '']); ?>
                                </div>
                             <div class="form-group">
                                <span class="pull-right">
                                    <?= $this->Form->button(__('Alterar Senha'), ['class' => 'btn btn-danger']) ?>
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
