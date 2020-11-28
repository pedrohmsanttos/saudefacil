<?= $this->Html->css('datatables/dataTables.bootstrap.css') ?>
<div class="col-md-12">
    <h2>Usuários</h2>   
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
                                <?php foreach ($admins as $admin): ?>
                                    <tr class="">
                                        <td class="center">#<?= $this->Number->format($admin->id) ?></td>
                                        <td class="center"><?= h($admin->name) ?></td>
                                        <td class="center"><?= h($admin->username) ?></td>
                                        <td class="center"><?= h($admin->role) ?></td>
                                        <td class="center"><?= h($admin->created) ?></td>
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
