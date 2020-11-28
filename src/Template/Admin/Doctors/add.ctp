<div class="col-md-12">
    <h2>Cadastrar Médico</h2>
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
                                <label>Nome</label>
                                <?= $this->Form->input('name', ['label' => false,'value'=>'', 'type' => '', 'div' => false, 'class' => 'form-control','placeholder' => '']); ?>
                            </div>
                            <div class="form-group">
                                <label>CFM</label>
                                <?= $this->Form->input('cfm', ['label' => false,'value'=>'', 'type' => '', 'div' => false, 'class' => 'form-control','placeholder' => '']); ?>
                            </div>
                            <div class="form-group">
                                <label>UNIDADE DE SAÚDE</label>
                                <?= $this->Form->input('unit_id', ['options' => $units,'empty' => 'Selecione',  'label' => false,'value'=>'', 'type' => '', 'div' => false, 'class' => 'form-control','placeholder' => '']); ?>
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

                        <!-- <div class="col-md-12">
                          <legend><label>Agenda de Atendimento</label></legend>
                          <div class="col-md-3">
                              <div class="form-group">
                                  <label>Dia</label> -->
                                  <?php //echo $this->Form->input('day', ['options' => $days,'empty' => 'Selecione', 'label' => false,'id'=>'day' ,'value'=>'', 'type' => '', 'div' => false, 'class' => 'form-control','placeholder' => '']); ?>
                              <!-- </div>
                          </div> --> <!-- END col-md-3 -->
                          <!-- <div class="col-md-2">
                              <div class="form-group">
                                  <label>Hora Início</label> -->
                                  <?php //echo $this->Form->input('start_hour', ['label' => false,'value'=>'', 'id'=>'start_hour', 'type' => '', 'div' => false, 'class' => 'form-control','placeholder' => '']); ?>
                              <!-- </div>
                          </div> --> <!-- END col-md-2 -->
                          <!-- <div class="col-md-2">
                              <div class="form-group">
                                  <label>Hora Final</label> -->
                                  <?php //$this->Form->input('finish_hour', ['label' => false,'value'=>'', 'id' => 'finish_hour', 'type' => '', 'div' => false, 'class' => 'form-control','placeholder' => '']); ?>
                              <!-- </div>
                          </div> --> <!-- END col-md-2 -->
                          <!-- <div class="col-md-5">
                            <div class="form-group">
                                <label>Unidade de Saúde</label> -->
                                <?php //echo $this->Form->input('unit_id_diary', ['options' => $units,'empty' => 'Selecione', 'id'=>'unit_id_diary',  'label' => false,'value'=>'', 'type' => '', 'div' => false, 'class' => 'form-control','placeholder' => '']); ?>
                            <!-- </div>
                            <div class="form-group">
                               <span class="pull-right">
                                   <button class="btn btn-danger" id="btnAddAgenda" data-item="1" type="button">Cadastrar</button>
                               </span>
                           </div>
                          </div> --> <!-- END col-md-3 -->
                          <!-- <div style="margin-top: 150px">
                            <table class="table table-striped table-bordered table-hover" id="doctor-diary" style="text-align: center;">
                              <thead>
                                <tr>
                                  <th style="text-align: center;">Dia</th>
                                  <th style="text-align: center;">Hora Início</th>
                                  <th style="text-align: center;">Hora Final</th>
                                  <th style="text-align: center;">Unidade de Saúde</th>
                                  <th style="text-align: center;">Ação</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr class="">
                                  <td class="center" colspan="5" id="tr-init">Não há agenda cadastrada para esse médico</td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div> -->

                    </div> <!-- END row -->
                <?= $this->Form->end() ?>
                </div>
            </div>
             <!-- End Form Elements -->
        </div>
    </div>
</div>
<script type="text/javascript">
function removeTR(id){
  // var idAux = "'#" + id + "'";
  $(id).remove();
}
$(document).ready(function () {

    $("#btnAddAgenda").on('click', function(){

        $("#tr-init").hide();
        // console.log($("#btnAddAgenda").data('info'));
        var order = $("#btnAddAgenda").data('item');

        var idItem = "itemDiary"+order;

        var newRow = $("<tr id='"+idItem+"'>");
        var cols = "";

        cols += "<td class='day'>"+$("#day").val()+"</td>";
        cols += "<td class='start-hour'>"+$("#start_hour").val()+"</td>";
        cols += "<td class='finish-hour'>"+$("#finish_hour").val()+"</td>";
        cols += "<td class='unit'>"+$( "#unit_id_diary option:selected" ).text();+"</td>";
        cols += '<td>';
        cols += '<button class="btn btn-warning fa fa-pencil" id="btnEdit" type="button"></button>  ';
        cols += "<button class='btn btn-danger fa fa-trash btnRemove' type='button' onClick='removeTR("+idItem+")'></button>";
        cols += '</td>';

        newRow.append(cols);
        $("#doctor-diary").append(newRow);
        order = parseInt(order)+1;
        $("#btnAddAgenda").data('item', order);

        $(".btnRemove").on('click', function(){
          console.log($(this).parent('tr').find('id'));
        });


     });



   });
</script>
