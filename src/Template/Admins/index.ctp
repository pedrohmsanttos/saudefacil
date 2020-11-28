<?= $this->Html->css('datatables/dataTables.bootstrap.css') ?>
<div class="col-md-12">
    <h2>Unidades de Saúde</h2>   
    <hr>
    <div class="row">
        <div class="col-md-12">
            <!-- Form Elements -->
            <div class="panel panel-default">
                <div class="panel-body">
                <div class="col-sm-2" style="float: right">
                <!-- <a class="btn btn-danger" href="#">Cadastrar <i class=" fa fa-plus "></i></a> -->
                    <?= $this->Html->link('Cadastrar', ['action' => 'add'], ['class' => 'btn btn-danger']) ?>
                </div>
                <br>
                <br>
                <?= $this->Flash->render() ?>
                    <div class="">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example" style="text-align: center;">
                            <thead>
                                <tr>
                                    <th style="text-align: center;"><?= $this->Paginator->sort('id', 'ID') ?></th>
                                    <th style="text-align: center;"><?= $this->Paginator->sort('name', 'NOME') ?></th>
                                    <th style="text-align: center;"><?= $this->Paginator->sort('username', 'EMAIL') ?></th>
                                    <th style="text-align: center;"><?= $this->Paginator->sort('role', 'TIPO') ?></th>
                                    <th style="text-align: center;"><?= $this->Paginator->sort('created', 'CADASTRADO EM') ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($units as $unit): ?>
                                    <tr class="">
                                        <td class="center">#<?= $this->Number->format($unit->id) ?></td>
                                        <td class="center"><?= h($unit->name) ?></td>
                                        <td class="center"><?= h($unit->email) ?></td>
                                        <td class="center"><?= h($unit->role) ?></td>
                                        <td class="center"><?= h($unit->created) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
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


<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Admin'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="admins index large-9 medium-8 columns content">
    <h3><?= __('Admins') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('role') ?></th>
                <th><?= $this->Paginator->sort('username') ?></th>
                <th><?= $this->Paginator->sort('password') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($admins as $admin): ?>
            <tr>
                <td><?= $this->Number->format($admin->id) ?></td>
                <td><?= h($admin->name) ?></td>
                <td><?= h($admin->role) ?></td>
                <td><?= h($admin->username) ?></td>
                <td><?= h($admin->password) ?></td>
                <td><?= h($admin->created) ?></td>
                <td><?= h($admin->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $admin->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $admin->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $admin->id], ['confirm' => __('Are you sure you want to delete # {0}?', $admin->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
