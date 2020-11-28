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
                <?= $this->Form->create($user) ?>
                    <div class="row">
                        <div class="col-md-6">
                            <legend>Dados Pessoais <span><i class="fa fa-user"></i></span></legend>
                             <!-- <hr> -->
                            <div class="form-group">
                                <label>Nome</label>
                                <?= $this->Form->input('name', ['label' => false, 'div' => false, 'class' => 'form-control', 'placeholder' => '']); ?>
                            </div>

                            <div class="form-group">
                                <?php
                                    $bithday = Time::parse($user['birthday']);
                                    $bithday = $bithday->format('d/m/Y');
                                ?>

                                <label>Data de Nascimento</label>
                                <?= $this->Form->input('birthday', ['label' => false, 'type' => 'text', 'div' => false, 'class' => 'date form-control','placeholder' => '', 'value' => $bithday]); ?>
                            </div>

                            <div class="form-group">
                                <label>Celular</label>
                                <?= $this->Form->input('cellphone', ['label' => false, 'type' => 'text', 'div' => false, 'class' => 'cell form-control','placeholder' => 'Celular']); ?>
                            </div>

                            <div class="form-group">
                                <label>Telefone</label>
                                 <?= $this->Form->input('phone', ['label' => false, 'type' => 'text', 'div' => false, 'class' => 'phone form-control','placeholder' => 'Telefone']); ?>
                            </div>

                            <legend>Dados Residenciais <span><i class="fa fa-home"></i></span></legend>
                            <div class="form-group">
                                <label>CEP</label>
                                 <?= $this->Form->input('zip_code_address', ['label' => false, 'type' => 'text', 'div' => false, 'class' => 'cep form-control','placeholder' => 'CEP']); ?>
                            </div>
                            <div class="form-group">
                                <label>Endereço</label>
                                 <?= $this->Form->input('address', ['label' => false, 'type' => 'text', 'div' => false, 'class' => 'form-control','placeholder' => 'Endereço']); ?>
                            </div>
                            <div class="form-group">
                                <label>Número</label>
                                 <?= $this->Form->input('number_address', ['label' => false, 'type' => 'text', 'div' => false, 'class' => 'form-control','placeholder' => 'Número']); ?>
                            </div>
                            <div class="form-group">
                                <label>Complemento</label>
                                 <?= $this->Form->input('complement_address', ['label' => false, 'type' => 'text', 'div' => false, 'class' => 'form-control','placeholder' => 'Complemento']); ?>
                            </div>
                            <div class="form-group">
                                <label>Bairro</label>
                                 <?= $this->Form->input('district_address', ['label' => false, 'type' => 'text', 'div' => false, 'class' => 'form-control','placeholder' => 'Bairro']); ?>
                            </div>
                            <div class="form-group">
                                <label>Estado</label>
                                 <?= $this->Form->input('state_address', ['label' => false, 'div' => false, 'class' => 'form-control','options' => $states, 'empty' => 'Selecione']); ?>
                            </div>
                            <div class="form-group">
                                <label>Cidade</label>
                                 <?= $this->Form->input('city_address', ['label' => false, 'div' => false, 'class' => 'form-control','options' => $cities, 'empty' => 'Selecione']); ?>
                            </div>
                        </div> <!-- END col-md-6 -->

                        <div class="col-md-6">
                          <legend>Dados Médicos <span><i class="fa fa-user-md"></i></span></legend>
                          <!-- <hr> -->
                          <div class="form-group">
                              <label>N° do Cartão do SUS</label>
                              <?= $this->Form->input('number_sus', ['label' => false, 'type' => 'text', 'div' => false, 'class' => 'cns form-control','placeholder' => 'N° Cartão SUS']); ?>
                          </div>

                          <div class="form-group">
                              <label>Nome da Mãe</label>
                              <?= $this->Form->input('mother_name', ['label' => false, 'type' => 'text', 'div' => false, 'class' => 'form-control','placeholder' => 'Nome da Mãe']); ?>
                          </div>

                          <div class="form-group">
                              <?php echo $this->Form->input('unknown_mother', ['label' => "Mãe desconhecida", 'div' => false, 'class' => '']); ?>
                          </div>

                          <div class="form-group">
                              <label>Responsável Familiar?</label>
                              <?= $this->Form->input('responsible_familiar', ['label' => false, 'div' => false, 'class' => 'form-control', 'options' => $responsible, 'empty' => 'Selecione']); ?>
                          </div>

                          <div class="form-group">
                              <label>N° Cartão SUS Responsável</label>
                              <?= $this->Form->input('responsible_number_sus', ['label' => false, 'div' => false, 'class' => 'cns form-control','placeholder' => '']); ?>
                          </div>

                            <legend>Dados Sociais <span><i class="fa fa-<?php echo ($user['gender'] == "M") ? "male" : "female" ?>"></i></span></legend>
                            <!-- <hr> -->
                            <div class="form-group">
                                <label>Sexo</label>
                                <div class="radio">
                                    <label>
                                        <input type="radio" value="M" id="" name="gender" <?php echo ($user['gender'] == "M") ? "checked" : ""  ?>>Masculino
                                    </label>
                                    <label>
                                        <input type="radio" value="F" id="" name="gender" <?php echo ($user['gender'] == "F") ? "checked" : ""  ?>>Feminino
                                    </label>
                                </div>
                            </div>


                            <div class="form-group">
                                <label>Orientação Sexual</label>
                                <?= $this->Form->input('sexual_orientation', ['label' => false, 'div' => false, 'class' => 'form-control', 'options' => $sexual_orientation, 'empty' => 'Selecione']); ?>
                            </div>

                            <div class="form-group">
                                <label>Cor/Raça</label>
                                <?= $this->Form->input('breed', ['label' => false, 'div' => false, 'class' => 'form-control', 'options' => $breed, 'empty' => 'Selecione']); ?>
                            </div>

                            <div class="form-group input-group">
                                <?php echo $this->Form->input('deficiency', ['label' => "Possui deficiência?", 'div' => false, 'class' => '']); ?>
                            </div>

                            <div class="form-group">
                                <label>Tipo de Deficiência</label>
                                <?= $this->Form->input('deficiency_type', ['label' => false, 'div' => false, 'class' => 'form-control', 'options' => $deficiency_type, 'empty' => 'Selecione']); ?>
                            </div>
                            <legend>Dados de Acesso <span><i class="fa fa-key"></i></span></legend>
                            <div class="form-group">
                                <label>Email</label>
                                <?= $this->Form->input('username', ['label' => false, 'type' => 'email', 'div' => false, 'class' => 'form-control','placeholder' => 'Email', 'data-validation' => 'email']); ?>
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
