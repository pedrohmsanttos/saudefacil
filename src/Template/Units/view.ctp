<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Unit'), ['action' => 'edit', $unit->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Unit'), ['action' => 'delete', $unit->id], ['confirm' => __('Are you sure you want to delete # {0}?', $unit->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Units'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Unit'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Districts'), ['controller' => 'Districts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New District'), ['controller' => 'Districts', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Doctors'), ['controller' => 'Doctors', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Doctor'), ['controller' => 'Doctors', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Specialties'), ['controller' => 'Specialties', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Specialty'), ['controller' => 'Specialties', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="units view large-9 medium-8 columns content">
    <h3><?= h($unit->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($unit->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Cnes') ?></th>
            <td><?= h($unit->cnes) ?></td>
        </tr>
        <tr>
            <th><?= __('Address') ?></th>
            <td><?= h($unit->address) ?></td>
        </tr>
        <tr>
            <th><?= __('Phone') ?></th>
            <td><?= h($unit->phone) ?></td>
        </tr>
        <tr>
            <th><?= __('Latitude') ?></th>
            <td><?= h($unit->latitude) ?></td>
        </tr>
        <tr>
            <th><?= __('Longitude') ?></th>
            <td><?= h($unit->longitude) ?></td>
        </tr>
        <tr>
            <th><?= __('District') ?></th>
            <td><?= $unit->has('district') ? $this->Html->link($unit->district->name, ['controller' => 'Districts', 'action' => 'view', $unit->district->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($unit->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Rpa') ?></th>
            <td><?= $this->Number->format($unit->rpa) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($unit->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($unit->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Doctors') ?></h4>
        <?php if (!empty($unit->doctors)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Cfm') ?></th>
                <th><?= __('Unit Id') ?></th>
                <th><?= __('Username') ?></th>
                <th><?= __('Password') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($unit->doctors as $doctors): ?>
            <tr>
                <td><?= h($doctors->id) ?></td>
                <td><?= h($doctors->name) ?></td>
                <td><?= h($doctors->cfm) ?></td>
                <td><?= h($doctors->unit_id) ?></td>
                <td><?= h($doctors->username) ?></td>
                <td><?= h($doctors->password) ?></td>
                <td><?= h($doctors->created) ?></td>
                <td><?= h($doctors->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Doctors', 'action' => 'view', $doctors->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Doctors', 'action' => 'edit', $doctors->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Doctors', 'action' => 'delete', $doctors->id], ['confirm' => __('Are you sure you want to delete # {0}?', $doctors->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Specialties') ?></h4>
        <?php if (!empty($unit->specialties)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($unit->specialties as $specialties): ?>
            <tr>
                <td><?= h($specialties->id) ?></td>
                <td><?= h($specialties->name) ?></td>
                <td><?= h($specialties->created) ?></td>
                <td><?= h($specialties->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Specialties', 'action' => 'view', $specialties->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Specialties', 'action' => 'edit', $specialties->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Specialties', 'action' => 'delete', $specialties->id], ['confirm' => __('Are you sure you want to delete # {0}?', $specialties->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
