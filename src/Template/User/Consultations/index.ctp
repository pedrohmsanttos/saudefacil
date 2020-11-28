<?= $this->Html->css('datatables/dataTables.bootstrap.css') ?>
<div class="col-md-12">
    <h2>Minhas Consultas</h2>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <!-- Form Elements -->
            <div class="panel panel-default">
                <div class="panel-body">
                <br>
                <br>
                <?= $this->Flash->render() ?>
                    <?php if(!empty($consultations)): ?>
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example" style="text-align: center;">
                            <thead>
                                <tr>
                                    <th style="text-align: center;"><?= $this->Paginator->sort('id', 'ID') ?></th>
                                    <th style="text-align: center;"><?= $this->Paginator->sort('day', 'DIA') ?></th>
                                    <th style="text-align: center;"><?= $this->Paginator->sort('specialty_id', 'ESPECIALIDADE') ?></th>
                                    <th style="text-align: center;"><?= $this->Paginator->sort('district_id', 'BAIRRO') ?></th>
                                    <th style="text-align: center;"><?= $this->Paginator->sort('status_id', 'STATUS') ?></th>
                                    <th style="text-align: center;"><?= $this->Paginator->sort('created', 'MARCADA EM') ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($consultations as $consultation): ?>
                                    <tr class="">
                                        <td class="center">#<?= $this->Number->format($consultation->id) ?></td>
                                        <td class="center"><?= h($consultation->day) ?> - <?= h($consultation->hour) ?></td>
                                        <td class="center"><?= $consultation->has('specialty') ? $consultation->specialty->name : '' ?></td>
                                        <td class="center"><?= $consultation->has('district') ? $consultation->district->name : '' ?></td>
                                        <td class="center">
                                            <?php if($consultation->status_consultation->name == "Nova"): ?>
                                                <span class="label label-default">NOVA</span>
                                            <?php endif; ?>
                                            <?php if($consultation->status_consultation->name == "Em Análise"): ?>
                                                <span class="label label-primary">EM ANÁLISE</span>
                                            <?php endif; ?>
                                            <?php if($consultation->status_consultation->name == "Cancelada"): ?>
                                                <span class="label label-warning">CANCELADA</span>
                                            <?php endif; ?>
                                            <?php if($consultation->status_consultation->name == "Aprovada"): ?>
                                                <span class="label label-success">APROVADA</span>
                                            <?php endif; ?>
                                            <?php if($consultation->status_consultation->name == "Reprovada"): ?>
                                                <span class="label label-danger">REPROVADA</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="center"><?= h($consultation->created) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php else: ?>
                      <p>Você não possui consultas marcadas!</p>
                    <?php endif; ?>
                </div>
            </div>
             <!-- End Form Elements -->
        </div>
    </div>
</div>

<?= $this->Html->script('stacktable/stacktable.js'); ?>
<script type="text/javascript">
    $('.table-consultations').stacktable();
</script>
