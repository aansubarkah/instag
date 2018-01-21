<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Comment $comment
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Comment'), ['action' => 'edit', $comment->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Comment'), ['action' => 'delete', $comment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $comment->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Comments'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Comment'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Posts'), ['controller' => 'Posts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Post'), ['controller' => 'Posts', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Accounts'), ['controller' => 'Accounts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Account'), ['controller' => 'Accounts', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Loves'), ['controller' => 'Loves', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Love'), ['controller' => 'Loves', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="comments view large-9 medium-8 columns content">
    <h3><?= h($comment->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Post') ?></th>
            <td><?= $comment->has('post') ? $this->Html->link($comment->post->id, ['controller' => 'Posts', 'action' => 'view', $comment->post->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Account') ?></th>
            <td><?= $comment->has('account') ? $this->Html->link($comment->account->id, ['controller' => 'Accounts', 'action' => 'view', $comment->account->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($comment->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pk') ?></th>
            <td><?= $this->Number->format($comment->pk) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Caption') ?></th>
            <td><?= $comment->caption ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Who') ?></th>
            <td><?= $comment->who ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $comment->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Content') ?></h4>
        <?= $this->Text->autoParagraph(h($comment->content)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Loves') ?></h4>
        <?php if (!empty($comment->loves)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Unlike') ?></th>
                <th scope="col"><?= __('Who') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col"><?= __('Account Id') ?></th>
                <th scope="col"><?= __('Account Pk') ?></th>
                <th scope="col"><?= __('Username') ?></th>
                <th scope="col"><?= __('Fullname') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('User Username') ?></th>
                <th scope="col"><?= __('User Name') ?></th>
                <th scope="col"><?= __('Post Id') ?></th>
                <th scope="col"><?= __('Post Pk') ?></th>
                <th scope="col"><?= __('Takenat') ?></th>
                <th scope="col"><?= __('Target Id') ?></th>
                <th scope="col"><?= __('Target Pk') ?></th>
                <th scope="col"><?= __('Target Username') ?></th>
                <th scope="col"><?= __('Target Fullname') ?></th>
                <th scope="col"><?= __('Location Id') ?></th>
                <th scope="col"><?= __('Location Pk') ?></th>
                <th scope="col"><?= __('Lat') ?></th>
                <th scope="col"><?= __('Lng') ?></th>
                <th scope="col"><?= __('Address') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Shortname') ?></th>
                <th scope="col"><?= __('Comment Id') ?></th>
                <th scope="col"><?= __('Caption') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($comment->loves as $loves): ?>
            <tr>
                <td><?= h($loves->id) ?></td>
                <td><?= h($loves->created) ?></td>
                <td><?= h($loves->modified) ?></td>
                <td><?= h($loves->unlike) ?></td>
                <td><?= h($loves->who) ?></td>
                <td><?= h($loves->active) ?></td>
                <td><?= h($loves->account_id) ?></td>
                <td><?= h($loves->account_pk) ?></td>
                <td><?= h($loves->username) ?></td>
                <td><?= h($loves->fullname) ?></td>
                <td><?= h($loves->user_id) ?></td>
                <td><?= h($loves->email) ?></td>
                <td><?= h($loves->user_username) ?></td>
                <td><?= h($loves->user_name) ?></td>
                <td><?= h($loves->post_id) ?></td>
                <td><?= h($loves->post_pk) ?></td>
                <td><?= h($loves->takenat) ?></td>
                <td><?= h($loves->target_id) ?></td>
                <td><?= h($loves->target_pk) ?></td>
                <td><?= h($loves->target_username) ?></td>
                <td><?= h($loves->target_fullname) ?></td>
                <td><?= h($loves->location_id) ?></td>
                <td><?= h($loves->location_pk) ?></td>
                <td><?= h($loves->lat) ?></td>
                <td><?= h($loves->lng) ?></td>
                <td><?= h($loves->address) ?></td>
                <td><?= h($loves->name) ?></td>
                <td><?= h($loves->shortname) ?></td>
                <td><?= h($loves->comment_id) ?></td>
                <td><?= h($loves->caption) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Loves', 'action' => 'view', $loves->]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Loves', 'action' => 'edit', $loves->]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Loves', 'action' => 'delete', $loves->], ['confirm' => __('Are you sure you want to delete # {0}?', $loves->)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
