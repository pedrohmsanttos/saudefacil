<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
    <div class="panel panel-default">
        <div class="panel-heading">
    <strong>   Recuperar a Senha </strong>  
        </div>
        <div class="panel-body">
            <?= $this->Form->create($user) ?>
                   <br />
                 <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                        <input type="text" class="form-control" placeholder="E-mail " />
                    </div>
                                                          
                <div class="form-group">
                    <span class="pull-right">
                        <?php echo $this->Html->link('Login', ['controller' => 'Users', 'action' => 'login']); ?>
                    </span>
                </div>
                 
                 <?= $this->Form->button(__('Recuperar Senha'), ['class' => 'btn btn-danger']) ?>
                <hr />
                Não é registrado? <?php echo $this->Html->link('Clique aqui.', ['controller' => 'Users', 'action' => 'add']); ?>
                <?= $this->Form->end() ?>
        </div>
       
    </div>
</div>