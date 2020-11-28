<div class="row">
    <div class="col-sm-8 col-sm-offset-2 text">
        <h1><strong>Saúde Fácil</strong> </h1>
        <div class="description">
        	<p>
            	Marque suas consultas e monitore seus agendamentos de modo prático e rápido.
        	</p>
        </div>
    </div>
</div>
<div class="row">
  <div class="col-sm-6 col-sm-offset-3 form-box">

    <?= $this->Flash->render() ?>
    <form action="<?= $this->Url->build(["controller" => "Users","action" => "login"]); ?>" accept-charset="utf-8" method="post" class="registration-form">
      <fieldset>
        <div class="form-top">
          <div class="form-top-left">
            <h3>Entrar</h3>
            <p>Efetue login com seu email e senha</p>
          </div>
          <div class="form-top-right">
            <i class="fa fa-user"></i>
          </div>
        </div>

        <div class="form-bottom">
          <div class="form-group">
            <?= $this->Form->input('username', ['label' => false, 'div' => false, 'class' => 'form-control', 'placeholder' => 'Email']); ?>
          </div>
          <div class="form-group">
            <?= $this->Form->input('password', ['label' => false, 'type' => 'password', 'div' => false, 'class' => 'form-control','placeholder' => 'Senha']); ?>
          </div>
          <button type="submit" class="btn btn-next">Entrar</button>
        </div>
      </fieldset>
    </form>
  </div>
</div>
