<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Consultation'), ['action' => 'edit', $consultation->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Consultation'), ['action' => 'delete', $consultation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $consultation->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Consultations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Consultation'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Specialties'), ['controller' => 'Specialties', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Specialty'), ['controller' => 'Specialties', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Status Consultations'), ['controller' => 'StatusConsultations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Status Consultation'), ['controller' => 'StatusConsultations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Districts'), ['controller' => 'Districts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New District'), ['controller' => 'Districts', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="consultations view large-9 medium-8 columns content">
    <h3><?= h($consultation->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Hour') ?></th>
            <td><?= h($consultation->hour) ?></td>
        </tr>
        <tr>
            <th><?= __('Specialty') ?></th>
            <td><?= $consultation->has('specialty') ? $this->Html->link($consultation->specialty->name, ['controller' => 'Specialties', 'action' => 'view', $consultation->specialty->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $consultation->has('user') ? $this->Html->link($consultation->user->name, ['controller' => 'Users', 'action' => 'view', $consultation->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Status Consultation') ?></th>
            <td><?= $consultation->has('status_consultation') ? $this->Html->link($consultation->status_consultation->name, ['controller' => 'StatusConsultations', 'action' => 'view', $consultation->status_consultation->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('District') ?></th>
            <td><?= $consultation->has('district') ? $this->Html->link($consultation->district->name, ['controller' => 'Districts', 'action' => 'view', $consultation->district->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($consultation->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Day') ?></th>
            <td><?= h($consultation->day) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($consultation->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($consultation->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Note') ?></h4>
        <?= $this->Text->autoParagraph(h($consultation->note)); ?>
    </div>
</div>
