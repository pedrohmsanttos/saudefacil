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
        <form action="<?= $this->Url->build(["controller" => "Users","action" => "add"]); ?>" accept-charset="utf-8" method="post" class="registration-form">
        <fieldset>
            	<div class="form-top">
            		<div class="form-top-left">
            			<h3>Parte 1 / 5</h3>
                		<p>Dados Pessoais</p>
            		</div>
            		<div class="form-top-right">
            			<i class="fa fa-user"></i>
            		</div>
                </div>
                <div class="form-bottom">
                	<div class="form-group">
                        <?= $this->Form->input('name', ['label' => false, 'div' => false, 'class' => 'form-control', 'placeholder' => 'Nome Completo']); ?>
                    </div>
                    <div class="form-group">
                    	<?= $this->Form->input('birthday', ['label' => false, 'type' => 'text', 'div' => false, 'class' => 'date form-control','placeholder' => 'Data de Nascimento']); ?>
                    </div>
                    <div class="form-group">
                         <?= $this->Form->input('cellphone', ['label' => false, 'type' => 'text', 'div' => false, 'class' => 'cell form-control','placeholder' => 'Celular']); ?>
                    </div>

                    <div class="form-group">
                    	<?= $this->Form->input('phone', ['label' => false, 'type' => 'text', 'div' => false, 'class' => 'cell form-control','placeholder' => 'Telefone']); ?>
                    </div>
                    <button type="button" class="btn btn-next">Próximo</button>
                </div>
            </fieldset>

            <fieldset>
            	<div class="form-top">
            		<div class="form-top-left">
            			<h3>Parte 2 / 5</h3>
                		<p>Dados Residenciais</p>
            		</div>
            		<div class="form-top-right">
            			<i class="fa fa-home"></i>
            		</div>
              </div>
                <div class="form-bottom">
                    <div class="form-group">
                        <?= $this->Form->input('zip_code_address', ['label' => false, 'type' => 'text', 'div' => false, 'class' => 'form-control','placeholder' => 'Cep']); ?>
                    </div>
                    <div class="form-group">
                		<?= $this->Form->input('address', ['label' => false, 'type' => 'text', 'div' => false, 'class' => 'form-control','placeholder' => 'Endereço']); ?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('number_address', ['label' => false, 'type' => 'text', 'div' => false, 'class' => 'form-control','placeholder' => 'Número']); ?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('complement_address', ['label' => false, 'type' => 'text', 'div' => false, 'class' => 'form-control','placeholder' => 'Complemento']); ?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('district_address', ['label' => false, 'type' => 'text', 'div' => false, 'class' => 'form-control','placeholder' => 'Bairro']); ?>
                    </div>
                    <div class="form-group">
                    <label>Estado</label>
                    	<?= $this->Form->input('state_address', ['label' => false, 'div' => false, 'class' => 'form-control','placeholder' => 'Estado', 'options' => $states, 'empty' => 'Selecione']); ?>
                    </div>
                    <div class="form-group">
                    <label>Cidade</label>
                        <?= $this->Form->input('city_address', ['label' => false, 'div' => false, 'data-url' => $this->Url->build(["controller" => "Users","action" => "return_cities_state"]), 'class' => 'form-control','placeholder' => 'Cidade', 'empty' => 'Selecione', 'options' => $cities]); ?>
                    </div>
                    <button type="button" class="btn btn-previous">Previous</button>
                    <button type="button" class="btn btn-next">Next</button>
                </div>
            </fieldset>

            <fieldset>
            	<div class="form-top">
            		<div class="form-top-left">
            			<h3>Parte 3 / 5</h3>
                		<p>Dados Médicos</p>
            		</div>
            		<div class="form-top-right">
            			<i class="fa fa-user-md"></i>
            		</div>
                </div>
                <div class="form-bottom">
                	<div class="form-group">
                        <?= $this->Form->input('number_sus', ['label' => false, 'type' => 'text', 'div' => false, 'class' => 'cns form-control','placeholder' => 'N° Cartão SUS']); ?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('mother_name', ['label' => false, 'type' => 'text', 'div' => false, 'class' => 'form-control','placeholder' => 'Nome da Mãe']); ?>
                    </div>
                    <div class="form-group">
                        <label for="unknown_mother">Mãe Desconhecida?</label>
                        <?php echo $this->Form->checkbox('unknown_mother', ['label' => false, 'div' => false, 'class' => '']); ?>
                    </div>

                    <div class="form-group">
                     <label>Responsável Familiar</label>
                        <?= $this->Form->input('responsible_familiar', ['label' => false, 'div' => false, 'class' => 'form-control', 'options' => $responsible, 'empty' => 'Selecione']); ?>
                    </div>

                    <div class="form-group">
                        <?= $this->Form->input('responsible_number_sus', ['label' => false, 'div' => false, 'class' => 'cns form-control','placeholder' => 'N° Cartão SUS Responsável']); ?>
                    </div>

                    <button type="button" class="btn btn-previous">Voltar</button>
                    <button type="button" class="btn btn-next">Next</button>
                </div>
            </fieldset>

            <fieldset>
                <div class="form-top">
                    <div class="form-top-left">
                        <h3>Parte 4 / 5</h3>
                        <p>Dados Sociais</p>
                    </div>
                    <div class="form-top-right">
                        <i class="fa fa-male" id="user-class"></i>
                    </div>
                </div>
                <div class="form-bottom">
                    <div class="form-group">
                        <label>Sexo</label>
                        <div class="radio">
                            <label>
                                <input type="radio" value="M" id="" name="gender">Masculino
                            </label>
                            <label>
                                <input type="radio" value="F" id="" name="gender">Feminino
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
                    <div class="form-group">
                        <label for="deficiency ">Possui alguma deficiência?</label>
                        <?php echo $this->Form->checkbox('deficiency', ['label' => false, 'div' => false, 'class' => '']); ?>
                    </div>
                    <button type="button" class="btn btn-previous">Voltar</button>
                    <button type="button" class="btn btn-next">Avançar</button>
                </div>
            </fieldset>
            <fieldset>
            	<div class="form-top">
            		<div class="form-top-left">
            			<h3>Parte 5 / 5</h3>
                		<p>Dados De Acesso</p>
            		</div>
            		<div class="form-top-right">
            			<i class="fa fa-key"></i>
            		</div>
                </div>
                <div class="form-bottom">
                	<div class="form-group">
                        <?= $this->Form->input('username', ['label' => false, 'div' => false, 'class' => 'form-control', 'placeholder' => 'Email']); ?>
                    </div>
                    <div class="form-group">
                    	<?= $this->Form->input('password', ['label' => false, 'type' => 'password', 'div' => false, 'class' => 'form-control','placeholder' => 'Senha']); ?>
                    </div>

                    <button type="button" class="btn btn-previous">Voltar</button>
                    <button type="submit" class="btn btn-next">Cadastrar</button>
                </div>
            </fieldset>
        </form>

    </div>
</div>
<script type="text/javascript">
$(document).ready(function () {

  $("input[name=gender]").on('click', function(){
    if($(this).val() == "F"){
      $("#user-class").removeClass('fa-male');
      $("#user-class").addClass('fa-female');
    }else if($(this).val() == "M"){
      $("#user-class").removeClass('fa-female');
      $("#user-class").addClass('fa-male');
    }
  });

  $("#state-address").on('change', function(){
      var url = $("#city-address").attr('data-url');
      var state = $("#state-address").val();

      $.ajax({
          type: "POST",
          url: url,
          data: "state=" + state,
          success: function(data){
              $('#city-address option').remove();

              $('#city-address').append($('<option>', {
                  value: "",
                  text: "Selecione uma cidade"
              }));

              data = $.parseJSON(data);
                  $.each(data, function(i, item) {
                  $('#city-address').append($('<option>', {
                      value: item,
                      text: item
                  }));

              });
          }
      });
  });

  $("#zip-code-address").on('blur', function(){
      $.isLoading({ text: "Aguarde" });
      var cep = $("#zip-code-address").val();

      var url = "https://viacep.com.br/ws/" + $.trim(cep)+"/json/";
      $.ajax({
          type: "GET",
          url: url,

          success: function(data){
              $("#address").val(data.logradouro);
              $("#district-address").val(data.bairro);
              $("#city-address").val(data.localidade);
              $("#state-address").val(data.uf);
              $("#complement-address").val(data.complemento);

              $.isLoading( "hide" );

          }
      });

  });


});
</script>
<?= $this->Html->css('css.isloading/isloading'); ?>
<?= $this->Html->script('mask.js'); ?>
<?= $this->Html->script('jquery.isLoading/isLoading'); ?>
