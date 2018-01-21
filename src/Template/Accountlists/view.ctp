<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Accountlist $accountlist
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Accountlist'), ['action' => 'edit', $accountlist->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Accountlist'), ['action' => 'delete', $accountlist->id], ['confirm' => __('Are you sure you want to delete # {0}?', $accountlist->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Accountlists'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Accountlist'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Accounts'), ['controller' => 'Accounts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Account'), ['controller' => 'Accounts', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Fans'), ['controller' => 'Fans', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Fan'), ['controller' => 'Fans', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Vassals'), ['controller' => 'Vassals', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vassal'), ['controller' => 'Vassals', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="accountlists view large-9 medium-8 columns content">
    <h3><?= h($accountlist->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Account') ?></th>
            <td><?= $accountlist->has('account') ? $this->Html->link($accountlist->account->id, ['controller' => 'Accounts', 'action' => 'view', $accountlist->account->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Project') ?></th>
            <td><?= $accountlist->has('project') ? $this->Html->link($accountlist->project->name, ['controller' => 'Projects', 'action' => 'view', $accountlist->project->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nextmaxid') ?></th>
            <td><?= h($accountlist->nextmaxid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($accountlist->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($accountlist->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($accountlist->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Which') ?></th>
            <td><?= $accountlist->which ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $accountlist->active ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Idol') ?></th>
            <td><?= $accountlist->idol ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Vip') ?></th>
            <td><?= $accountlist->vip ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Fans') ?></h4>
        <?php if (!empty($accountlist->fans)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Followed') ?></th>
                <th scope="col"><?= __('Relevant') ?></th>
                <th scope="col"><?= __('Testrelevant') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col"><?= __('Target Id') ?></th>
                <th scope="col"><?= __('Target Pk') ?></th>
                <th scope="col"><?= __('Target Username') ?></th>
                <th scope="col"><?= __('Target Fullname') ?></th>
                <th scope="col"><?= __('Target Description') ?></th>
                <th scope="col"><?= __('Target Age') ?></th>
                <th scope="col"><?= __('Target Posts') ?></th>
                <th scope="col"><?= __('Target Followers') ?></th>
                <th scope="col"><?= __('Target Followings') ?></th>
                <th scope="col"><?= __('Target Human') ?></th>
                <th scope="col"><?= __('Target Gender') ?></th>
                <th scope="col"><?= __('Target Verified') ?></th>
                <th scope="col"><?= __('Target Active') ?></th>
                <th scope="col"><?= __('Target Testhuman') ?></th>
                <th scope="col"><?= __('Target Testgender') ?></th>
                <th scope="col"><?= __('Target Testage') ?></th>
                <th scope="col"><?= __('Target Closed') ?></th>
                <th scope="col"><?= __('Target Validated') ?></th>
                <th scope="col"><?= __('Accountlist Id') ?></th>
                <th scope="col"><?= __('Idol Id') ?></th>
                <th scope="col"><?= __('Idol Pk') ?></th>
                <th scope="col"><?= __('Idol Username') ?></th>
                <th scope="col"><?= __('Idol Fullname') ?></th>
                <th scope="col"><?= __('Idol Description') ?></th>
                <th scope="col"><?= __('Idol Age') ?></th>
                <th scope="col"><?= __('Idol Posts') ?></th>
                <th scope="col"><?= __('Idol Followers') ?></th>
                <th scope="col"><?= __('Idol Followings') ?></th>
                <th scope="col"><?= __('Idol Human') ?></th>
                <th scope="col"><?= __('Idol Gender') ?></th>
                <th scope="col"><?= __('Idol Verified') ?></th>
                <th scope="col"><?= __('Idol Active') ?></th>
                <th scope="col"><?= __('Idol Testhuman') ?></th>
                <th scope="col"><?= __('Idol Testgender') ?></th>
                <th scope="col"><?= __('Idol Testage') ?></th>
                <th scope="col"><?= __('Idol Closed') ?></th>
                <th scope="col"><?= __('Idol Validated') ?></th>
                <th scope="col"><?= __('Project Id') ?></th>
                <th scope="col"><?= __('Project Name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($accountlist->fans as $fans): ?>
            <tr>
                <td><?= h($fans->id) ?></td>
                <td><?= h($fans->followed) ?></td>
                <td><?= h($fans->relevant) ?></td>
                <td><?= h($fans->testrelevant) ?></td>
                <td><?= h($fans->created) ?></td>
                <td><?= h($fans->modified) ?></td>
                <td><?= h($fans->active) ?></td>
                <td><?= h($fans->target_id) ?></td>
                <td><?= h($fans->target_pk) ?></td>
                <td><?= h($fans->target_username) ?></td>
                <td><?= h($fans->target_fullname) ?></td>
                <td><?= h($fans->target_description) ?></td>
                <td><?= h($fans->target_age) ?></td>
                <td><?= h($fans->target_posts) ?></td>
                <td><?= h($fans->target_followers) ?></td>
                <td><?= h($fans->target_followings) ?></td>
                <td><?= h($fans->target_human) ?></td>
                <td><?= h($fans->target_gender) ?></td>
                <td><?= h($fans->target_verified) ?></td>
                <td><?= h($fans->target_active) ?></td>
                <td><?= h($fans->target_testhuman) ?></td>
                <td><?= h($fans->target_testgender) ?></td>
                <td><?= h($fans->target_testage) ?></td>
                <td><?= h($fans->target_closed) ?></td>
                <td><?= h($fans->target_validated) ?></td>
                <td><?= h($fans->accountlist_id) ?></td>
                <td><?= h($fans->idol_id) ?></td>
                <td><?= h($fans->idol_pk) ?></td>
                <td><?= h($fans->idol_username) ?></td>
                <td><?= h($fans->idol_fullname) ?></td>
                <td><?= h($fans->idol_description) ?></td>
                <td><?= h($fans->idol_age) ?></td>
                <td><?= h($fans->idol_posts) ?></td>
                <td><?= h($fans->idol_followers) ?></td>
                <td><?= h($fans->idol_followings) ?></td>
                <td><?= h($fans->idol_human) ?></td>
                <td><?= h($fans->idol_gender) ?></td>
                <td><?= h($fans->idol_verified) ?></td>
                <td><?= h($fans->idol_active) ?></td>
                <td><?= h($fans->idol_testhuman) ?></td>
                <td><?= h($fans->idol_testgender) ?></td>
                <td><?= h($fans->idol_testage) ?></td>
                <td><?= h($fans->idol_closed) ?></td>
                <td><?= h($fans->idol_validated) ?></td>
                <td><?= h($fans->project_id) ?></td>
                <td><?= h($fans->project_name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Fans', 'action' => 'view', $fans->]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Fans', 'action' => 'edit', $fans->]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Fans', 'action' => 'delete', $fans->], ['confirm' => __('Are you sure you want to delete # {0}?', $fans->)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Vassals') ?></h4>
        <?php if (!empty($accountlist->vassals)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Account Id') ?></th>
                <th scope="col"><?= __('Accountlist Id') ?></th>
                <th scope="col"><?= __('Follow') ?></th>
                <th scope="col"><?= __('Relevant') ?></th>
                <th scope="col"><?= __('Testrelevant') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col"><?= __('Bycomment') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($accountlist->vassals as $vassals): ?>
            <tr>
                <td><?= h($vassals->id) ?></td>
                <td><?= h($vassals->account_id) ?></td>
                <td><?= h($vassals->accountlist_id) ?></td>
                <td><?= h($vassals->follow) ?></td>
                <td><?= h($vassals->relevant) ?></td>
                <td><?= h($vassals->testrelevant) ?></td>
                <td><?= h($vassals->created) ?></td>
                <td><?= h($vassals->modified) ?></td>
                <td><?= h($vassals->active) ?></td>
                <td><?= h($vassals->bycomment) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Vassals', 'action' => 'view', $vassals->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Vassals', 'action' => 'edit', $vassals->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Vassals', 'action' => 'delete', $vassals->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vassals->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
