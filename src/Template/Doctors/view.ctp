<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Doctor'), ['action' => 'edit', $doctor->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Doctor'), ['action' => 'delete', $doctor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $doctor->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Doctors'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Doctor'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Units'), ['controller' => 'Units', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Unit'), ['controller' => 'Units', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="doctors view large-9 medium-8 columns content">
    <h3><?= h($doctor->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($doctor->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Cfm') ?></th>
            <td><?= h($doctor->cfm) ?></td>
        </tr>
        <tr>
            <th><?= __('Unit') ?></th>
            <td><?= $doctor->has('unit') ? $this->Html->link($doctor->unit->name, ['controller' => 'Units', 'action' => 'view', $doctor->unit->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Username') ?></th>
            <td><?= h($doctor->username) ?></td>
        </tr>
        <tr>
            <th><?= __('Password') ?></th>
            <td><?= h($doctor->password) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($doctor->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($doctor->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($doctor->modified) ?></td>
        </tr>
    </table>
</div>
