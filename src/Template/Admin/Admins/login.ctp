<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
    <div class="panel panel-default">
        <div class="panel-heading">
    <strong>   Acesse a área administrativa. </strong>  
        </div>
        <div class="panel-body">
        <?= $this->Flash->render() ?>
            <?= $this->Form->create() ?>
                   <br />
                 <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                        <?= $this->Form->input('username', ['label' => false, 'type' => 'email', 'div' => false, 'class' => 'form-control','placeholder' => 'Email', 'data-validation' => 'email']); ?>
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                        <!-- <input type="password" class="form-control"  placeholder="Senha" /> -->
                         <?= $this->Form->input('password', ['label' => false, 'type' => 'password', 'div' => false, 'class' => 'form-control','placeholder' => 'Senha']); ?>    
                    </div>
                <div class="form-group">
                    <span class="pull-right">
                        <?php //echo $this->Html->link('Esqueceu sua senha?', ['controller' => 'Users', 'action' => 'forgotPassword']); ?>
                    </span>
                </div>
                 
                 <!-- <a href="index.html" class="btn btn-danger ">Entrar</a> -->
                 <?= $this->Form->button(__('Entrar'), ['class' => 'btn btn-danger']) ?>
                <hr />
               
                <?= $this->Form->end() ?>
        </div>
       
    </div>
</div>