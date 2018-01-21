<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Accountlist[]|\Cake\Collection\CollectionInterface $accountlists
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Accountlist'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Accounts'), ['controller' => 'Accounts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Account'), ['controller' => 'Accounts', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Fans'), ['controller' => 'Fans', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Fan'), ['controller' => 'Fans', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Vassals'), ['controller' => 'Vassals', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vassal'), ['controller' => 'Vassals', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="accountlists index large-9 medium-8 columns content">
    <h3><?= __('Accountlists') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('account_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('project_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('which') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col"><?= $this->Paginator->sort('idol') ?></th>
                <th scope="col"><?= $this->Paginator->sort('vip') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nextmaxid') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($accountlists as $accountlist): ?>
            <tr>
                <td><?= $this->Number->format($accountlist->id) ?></td>
                <td><?= $accountlist->has('account') ? $this->Html->link($accountlist->account->id, ['controller' => 'Accounts', 'action' => 'view', $accountlist->account->id]) : '' ?></td>
                <td><?= $accountlist->has('project') ? $this->Html->link($accountlist->project->name, ['controller' => 'Projects', 'action' => 'view', $accountlist->project->id]) : '' ?></td>
                <td><?= h($accountlist->created) ?></td>
                <td><?= h($accountlist->modified) ?></td>
                <td><?= h($accountlist->which) ?></td>
                <td><?= h($accountlist->active) ?></td>
                <td><?= h($accountlist->idol) ?></td>
                <td><?= h($accountlist->vip) ?></td>
                <td><?= h($accountlist->nextmaxid) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $accountlist->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $accountlist->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $accountlist->id], ['confirm' => __('Are you sure you want to delete # {0}?', $accountlist->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
