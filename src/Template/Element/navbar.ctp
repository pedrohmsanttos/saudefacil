<nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html">
            <div>
            <?= $this->Html->image('logo-saude-facil-branca-2.png', ['alt' => 'Logo - Saúde Fácil', 'width' => '180', 'class' => 'img-responsive', 'style' => 'margin: 0 auto;']); ?>
            </div>
        </a> 
    </div>
    <div style="color: white;padding: 15px 50px 5px 50px;float: right;font-size: 16px;"> 
        Olá, <strong><?= $authUser['name'] ?></strong> &nbsp; 

        <?php if($this->request['prefix'] == 'user'): ?>
             <?php echo $this->Html->link('Logout', ['controller' => 'Users', 'action' => 'logout'], ['class' => 'btn btn-danger square-btn-adjust']); ?>
        <?php endif; ?>

        <?php if($this->request['prefix'] == 'admin'): ?>
             <?php echo $this->Html->link('Logout', ['controller' => 'Admins', 'action' => 'logout'], ['class' => 'btn btn-danger square-btn-adjust']); ?>
        <?php endif; ?>

        <?php if($this->request['prefix'] == 'doctor'): ?>
             <?php echo $this->Html->link('Logout', ['controller' => 'Doctors', 'action' => 'logout'], ['class' => 'btn btn-danger square-btn-adjust']); ?>
        <?php endif; ?>
    </div>
</nav>