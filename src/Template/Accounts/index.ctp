<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Account[]|\Cake\Collection\CollectionInterface $accounts
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Account'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Accountlists'), ['controller' => 'Accountlists', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Accountlist'), ['controller' => 'Accountlists', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Activities'), ['controller' => 'Activities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Activity'), ['controller' => 'Activities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Comments'), ['controller' => 'Comments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Comment'), ['controller' => 'Comments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Followers'), ['controller' => 'Followers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Follower'), ['controller' => 'Followers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Hates'), ['controller' => 'Hates', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Hate'), ['controller' => 'Hates', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Henchmans'), ['controller' => 'Henchmans', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Henchman'), ['controller' => 'Henchmans', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Likes'), ['controller' => 'Likes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Like'), ['controller' => 'Likes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Loves'), ['controller' => 'Loves', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Love'), ['controller' => 'Loves', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Messages'), ['controller' => 'Messages', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Message'), ['controller' => 'Messages', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Posts'), ['controller' => 'Posts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Post'), ['controller' => 'Posts', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Proposals'), ['controller' => 'Proposals', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Proposal'), ['controller' => 'Proposals', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Vassals'), ['controller' => 'Vassals', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vassal'), ['controller' => 'Vassals', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="accounts index large-9 medium-8 columns content">
    <h3><?= __('Accounts') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pk') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('username') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fullname') ?></th>
                <th scope="col"><?= $this->Paginator->sort('password') ?></th>
                <th scope="col"><?= $this->Paginator->sort('age') ?></th>
                <th scope="col"><?= $this->Paginator->sort('posts') ?></th>
                <th scope="col"><?= $this->Paginator->sort('followers') ?></th>
                <th scope="col"><?= $this->Paginator->sort('following') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('human') ?></th>
                <th scope="col"><?= $this->Paginator->sort('gender') ?></th>
                <th scope="col"><?= $this->Paginator->sort('verified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col"><?= $this->Paginator->sort('testhuman') ?></th>
                <th scope="col"><?= $this->Paginator->sort('testgender') ?></th>
                <th scope="col"><?= $this->Paginator->sort('testage') ?></th>
                <th scope="col"><?= $this->Paginator->sort('closed') ?></th>
                <th scope="col"><?= $this->Paginator->sort('validated') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($accounts as $account): ?>
            <tr>
                <td><?= $this->Number->format($account->id) ?></td>
                <td><?= $this->Number->format($account->pk) ?></td>
                <td><?= $account->has('user') ? $this->Html->link($account->user->name, ['controller' => 'Users', 'action' => 'view', $account->user->id]) : '' ?></td>
                <td><?= h($account->username) ?></td>
                <td><?= h($account->fullname) ?></td>
                <td><?= h($account->password) ?></td>
                <td><?= $this->Number->format($account->age) ?></td>
                <td><?= $this->Number->format($account->posts) ?></td>
                <td><?= $this->Number->format($account->followers) ?></td>
                <td><?= $this->Number->format($account->following) ?></td>
                <td><?= h($account->created) ?></td>
                <td><?= h($account->modified) ?></td>
                <td><?= h($account->human) ?></td>
                <td><?= h($account->gender) ?></td>
                <td><?= h($account->verified) ?></td>
                <td><?= h($account->active) ?></td>
                <td><?= h($account->testhuman) ?></td>
                <td><?= h($account->testgender) ?></td>
                <td><?= h($account->testage) ?></td>
                <td><?= h($account->closed) ?></td>
                <td><?= h($account->validated) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $account->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $account->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $account->id], ['confirm' => __('Are you sure you want to delete # {0}?', $account->id)]) ?>
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
