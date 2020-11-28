<!-- /. NAV TOP  -->
<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
            <li class="text-center">
            <?php if($this->request['prefix'] == "user"): ?>

                <?php if($authUser['gender'] == "M" || $authUser['gender'] == ""): ?>
                    <?= $this->Html->image('icon/user-male.png', ['alt' => 'User', 'width' => '', 'class' => 'img-responsive user-image', 'style' => '']); ?>
                <?php endif; ?>

                <?php if($authUser['gender'] == "F"): ?>
                    <?= $this->Html->image('icon/user-female.png', ['alt' => 'User', 'width' => '', 'class' => 'img-responsive user-image', 'style' => '']); ?>
                <?php endif; ?>

            <?php endif; ?>
             <?php if($this->request['prefix'] == "admin"): ?>
                <?= $this->Html->image('icon/admin-male.png', ['alt' => 'User', 'width' => '', 'class' => 'img-responsive user-image', 'style' => '']); ?>
            <?php endif; ?>

            <?php if($this->request['prefix'] == "doctor"): ?>
                <?= $this->Html->image('icon/doctor-male.png', ['alt' => 'User', 'width' => '', 'class' => 'img-responsive user-image', 'style' => '']); ?>
            <?php endif; ?>
            </li>


        	<?php if($this->request['prefix'] == "user"): ?>
            <li>
                <a  href="unidades-de-saude" class="<?php echo ($this->request->params['controller'] == 'Units' && $this->request->params['action'] == 'index') ? "active-menu" : "" ?>"><i class="fa fa-hospital-o fa-3x"></i> Unidades de Saúde (USF)</a>
            </li>

            <li>
                <a  href="index.html" class="<?php echo ($this->request->params['controller'] == 'Consultations') ? "active-menu" : "" ?>"><i class="fa fa-medkit fa-3x"></i> Consultas<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">

                    <li>

                        <?php $class = ($this->request->params['controller'] == "Consultations" && $this->request->params['action'] == 'index') ? "active-menu" : "" ?>
                        <?php echo $this->Html->link('Minhas Consultas', ['controller' => 'Consultations', 'action' => 'index'], ['class' => $class]); ?>
                    </li>
                    <li>
                        <?php $class = ($this->request->params['controller'] == "Consultations" && $this->request->params['action'] == 'add') ? "active-menu" : "" ?>
                        <?php echo $this->Html->link('Marcar Consulta', ['controller' => 'Consultations', 'action' => 'add'], ['class' => $class]); ?>
                    </li>
                </ul>
              </li>


            <li>
                <a href="#" class="<?php echo ($this->request->params['controller'] == 'Users') ? "active-menu" : "" ?>"><i class="fa fa-user fa-3x"></i> Usuário<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <?php $class = ($this->request->params['controller'] == "Users" && $this->request->params['action'] == 'edit') ? "active-menu" : "" ?>
                        <?php echo $this->Html->link('Meus Dados', ['controller' => 'Users', 'action' => 'edit'], ['class' => $class]); ?>
                    </li>
                    <li>
                        <?php $class = ($this->request->params['controller'] == "Users" && $this->request->params['action'] == 'alterPassword') ? "active-menu" : "" ?>
                        <?php echo $this->Html->link('Alterar Senha', ['controller' => 'Users', 'action' => 'alterPassword'], ['class' => $class]); ?>
                    </li>
                </ul>
              </li>
              <?php endif; ?>
            <li>
                <!-- <a class="active-menu"  href="blank.html"><i class="fa fa-square-o fa-3x"></i> Blank Page</a> -->
            </li>


            <?php if($this->request['prefix'] == "admin"): ?>
            <li>
                <a href="#" class="<?php echo ($this->request->params['controller'] == 'Consultations') ? "active-menu" : "" ?>"><i class="fa fa-medkit fa-3x"></i> Consultas<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <?php $class = ($this->request->params['controller'] == "Consultations" && $this->request->params['action'] == 'index') ? "active-menu" : "" ?>
                        <?php echo $this->Html->link('Listar', ['controller' => 'Consultations', 'action' => 'index'], ['class' => $class]); ?>
                    </li>

                </ul>
            </li>

            <li>
                <a href="#" class="<?php echo ($this->request->params['controller'] == 'Units') ? "active-menu" : "" ?>"><i class="fa fa-hospital-o fa-3x"></i> Unidades de Saúde<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <?php $class = ($this->request->params['controller'] == "Units" && $this->request->params['action'] == 'index') ? "active-menu" : "" ?>
                        <?php echo $this->Html->link('Listar', ['controller' => 'Units', 'action' => 'index'], ['class' => $class]); ?>
                    </li>
                <li>
                    <?php $class = ($this->request->params['controller'] == "Units" && $this->request->params['action'] == 'add') ? "active-menu" : "" ?>
                    <?php echo $this->Html->link('Cadastrar', ['controller' => 'Units', 'action' => 'add'], ['class' => $class]); ?>
                </li>
                </ul>
            </li>

            <li>
                <a href="#" class="<?php echo ($this->request->params['controller'] == 'Doctors') ? "active-menu" : "" ?>"><i class="fa fa-user-md fa-3x"></i> Médicos<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <?php $class = ($this->request->params['controller'] == "Doctors" && $this->request->params['action'] == 'index') ? "active-menu" : "" ?>
                        <?php echo $this->Html->link('Listar', ['controller' => 'Doctors', 'action' => 'index'], ['class' => $class]); ?>
                    </li>
                <li>
                    <?php $class = ($this->request->params['controller'] == "Doctors" && $this->request->params['action'] == 'add') ? "active-menu" : "" ?>
                    <?php echo $this->Html->link('Cadastrar', ['controller' => 'Doctors', 'action' => 'add'], ['class' => $class]); ?>
                </li>
                </ul>
            </li>
            <li>
                <a href="#" class="<?php echo ($this->request->params['controller'] == 'Admins') ? "active-menu" : "" ?>"><i class="fa fa-user fa-3x"></i> Usuários<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <?php $class = ($this->request->params['controller'] == "Admins" && $this->request->params['action'] == 'index') ? "active-menu" : "" ?>
                        <?php echo $this->Html->link('Listar', ['controller' => 'Admins', 'action' => 'index'], ['class' => $class]); ?>
                    </li>
                <li>
                    <?php $class = ($this->request->params['controller'] == "Admins" && $this->request->params['action'] == 'add') ? "active-menu" : "" ?>
                    <?php echo $this->Html->link('Cadastrar', ['controller' => 'Admins', 'action' => 'add'], ['class' => $class]); ?>
                </li>
                </ul>
            </li>
            <?php endif; ?>

            <?php if($this->request['prefix'] == "doctor"): ?>
            <li>
                <!-- <a  href="minha-agenda" class="<?php echo ($this->request->params['controller'] == 'Doctors' && $this->request->params['action'] == 'index') ? "active-menu" : "" ?>"><i class="fa fa-user-md fa-3x"></i> Minha Agenda</a> -->
                <?php $class = ($this->request->params['controller'] == "Doctors" && $this->request->params['action'] == 'index') ? "active-menu" : "" ?>
                <?php echo $this->Html->link('Minha Agenda', ['controller' => 'Doctors', 'action' => 'index'], ['class' => $class]); ?>
            </li>

            <li>
                <a href="#" class="<?php echo ($this->request->params['controller'] == 'Users') ? "active-menu" : "" ?>"><i class="fa fa-user fa-3x"></i> Usuário<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <?php $class = ($this->request->params['controller'] == "Doctors" && $this->request->params['action'] == 'edit') ? "active-menu" : "" ?>
                        <?php echo $this->Html->link('Meus Dados', ['controller' => 'Doctors', 'action' => 'edit'], ['class' => $class]); ?>
                    </li>
                    <li>
                        <?php $class = ($this->request->params['controller'] == "Doctors" && $this->request->params['action'] == 'alterPassword') ? "active-menu" : "" ?>
                        <?php echo $this->Html->link('Alterar Senha', ['controller' => 'Doctors', 'action' => 'alterPassword'], ['class' => $class]); ?>
                    </li>
                </ul>
              </li>
            <?php endif; ?>
        </ul>

    </div>

</nav>
<!-- /. NAV SIDE  -->
