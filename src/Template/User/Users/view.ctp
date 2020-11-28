<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($user->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th><?= __('Number Sus') ?></th>
            <td><?= h($user->number_sus) ?></td>
        </tr>
        <tr>
            <th><?= __('Responsible Number Sus') ?></th>
            <td><?= h($user->responsible_number_sus) ?></td>
        </tr>
        <tr>
            <th><?= __('Mother Name') ?></th>
            <td><?= h($user->mother_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Gender') ?></th>
            <td><?= h($user->gender) ?></td>
        </tr>
        <tr>
            <th><?= __('Breed') ?></th>
            <td><?= h($user->breed) ?></td>
        </tr>
        <tr>
            <th><?= __('Cellphone') ?></th>
            <td><?= h($user->cellphone) ?></td>
        </tr>
        <tr>
            <th><?= __('Phone') ?></th>
            <td><?= h($user->phone) ?></td>
        </tr>
        <tr>
            <th><?= __('Deficiency Type') ?></th>
            <td><?= h($user->deficiency_type) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Bithday') ?></th>
            <td><?= h($user->bithday) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($user->modified) ?></td>
        </tr>
        <tr>
            <th><?= __('Responsible Familiar') ?></th>
            <td><?= $user->responsible_familiar ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Unknown Mother') ?></th>
            <td><?= $user->unknown_mother ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Deficiency') ?></th>
            <td><?= $user->deficiency ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
