<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Account $account
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Account'), ['action' => 'edit', $account->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Account'), ['action' => 'delete', $account->id], ['confirm' => __('Are you sure you want to delete # {0}?', $account->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Accounts'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Account'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Accountlists'), ['controller' => 'Accountlists', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Accountlist'), ['controller' => 'Accountlists', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Activities'), ['controller' => 'Activities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Activity'), ['controller' => 'Activities', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Comments'), ['controller' => 'Comments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Comment'), ['controller' => 'Comments', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Followers'), ['controller' => 'Followers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Follower'), ['controller' => 'Followers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Hates'), ['controller' => 'Hates', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Hate'), ['controller' => 'Hates', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Henchmans'), ['controller' => 'Henchmans', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Henchman'), ['controller' => 'Henchmans', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Likes'), ['controller' => 'Likes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Like'), ['controller' => 'Likes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Loves'), ['controller' => 'Loves', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Love'), ['controller' => 'Loves', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Messages'), ['controller' => 'Messages', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Message'), ['controller' => 'Messages', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Posts'), ['controller' => 'Posts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Post'), ['controller' => 'Posts', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Proposals'), ['controller' => 'Proposals', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Proposal'), ['controller' => 'Proposals', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Vassals'), ['controller' => 'Vassals', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vassal'), ['controller' => 'Vassals', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="accounts view large-9 medium-8 columns content">
    <h3><?= h($account->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $account->has('user') ? $this->Html->link($account->user->name, ['controller' => 'Users', 'action' => 'view', $account->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($account->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fullname') ?></th>
            <td><?= h($account->fullname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($account->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($account->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pk') ?></th>
            <td><?= $this->Number->format($account->pk) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Age') ?></th>
            <td><?= $this->Number->format($account->age) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Posts') ?></th>
            <td><?= $this->Number->format($account->posts) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Followers') ?></th>
            <td><?= $this->Number->format($account->followers) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Following') ?></th>
            <td><?= $this->Number->format($account->following) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($account->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($account->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Human') ?></th>
            <td><?= $account->human ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Gender') ?></th>
            <td><?= $account->gender ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Verified') ?></th>
            <td><?= $account->verified ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $account->active ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Testhuman') ?></th>
            <td><?= $account->testhuman ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Testgender') ?></th>
            <td><?= $account->testgender ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Testage') ?></th>
            <td><?= $account->testage ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Closed') ?></th>
            <td><?= $account->closed ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Validated') ?></th>
            <td><?= $account->validated ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($account->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Accountlists') ?></h4>
        <?php if (!empty($account->accountlists)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Account Id') ?></th>
                <th scope="col"><?= __('Project Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Which') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col"><?= __('Idol') ?></th>
                <th scope="col"><?= __('Vip') ?></th>
                <th scope="col"><?= __('Nextmaxid') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($account->accountlists as $accountlists): ?>
            <tr>
                <td><?= h($accountlists->id) ?></td>
                <td><?= h($accountlists->account_id) ?></td>
                <td><?= h($accountlists->project_id) ?></td>
                <td><?= h($accountlists->created) ?></td>
                <td><?= h($accountlists->modified) ?></td>
                <td><?= h($accountlists->which) ?></td>
                <td><?= h($accountlists->active) ?></td>
                <td><?= h($accountlists->idol) ?></td>
                <td><?= h($accountlists->vip) ?></td>
                <td><?= h($accountlists->nextmaxid) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Accountlists', 'action' => 'view', $accountlists->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Accountlists', 'action' => 'edit', $accountlists->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Accountlists', 'action' => 'delete', $accountlists->id], ['confirm' => __('Are you sure you want to delete # {0}?', $accountlists->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Activities') ?></h4>
        <?php if (!empty($account->activities)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Account Id') ?></th>
                <th scope="col"><?= __('Followers') ?></th>
                <th scope="col"><?= __('Following') ?></th>
                <th scope="col"><?= __('Posts') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($account->activities as $activities): ?>
            <tr>
                <td><?= h($activities->id) ?></td>
                <td><?= h($activities->account_id) ?></td>
                <td><?= h($activities->followers) ?></td>
                <td><?= h($activities->following) ?></td>
                <td><?= h($activities->posts) ?></td>
                <td><?= h($activities->created) ?></td>
                <td><?= h($activities->modified) ?></td>
                <td><?= h($activities->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Activities', 'action' => 'view', $activities->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Activities', 'action' => 'edit', $activities->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Activities', 'action' => 'delete', $activities->id], ['confirm' => __('Are you sure you want to delete # {0}?', $activities->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Comments') ?></h4>
        <?php if (!empty($account->comments)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Post Id') ?></th>
                <th scope="col"><?= __('Pk') ?></th>
                <th scope="col"><?= __('Content') ?></th>
                <th scope="col"><?= __('Caption') ?></th>
                <th scope="col"><?= __('Account Id') ?></th>
                <th scope="col"><?= __('Who') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($account->comments as $comments): ?>
            <tr>
                <td><?= h($comments->id) ?></td>
                <td><?= h($comments->post_id) ?></td>
                <td><?= h($comments->pk) ?></td>
                <td><?= h($comments->content) ?></td>
                <td><?= h($comments->caption) ?></td>
                <td><?= h($comments->account_id) ?></td>
                <td><?= h($comments->who) ?></td>
                <td><?= h($comments->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Comments', 'action' => 'view', $comments->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Comments', 'action' => 'edit', $comments->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Comments', 'action' => 'delete', $comments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $comments->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Followers') ?></h4>
        <?php if (!empty($account->followers)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Account Id') ?></th>
                <th scope="col"><?= __('Target Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Unfollow') ?></th>
                <th scope="col"><?= __('Who') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($account->followers as $followers): ?>
            <tr>
                <td><?= h($followers->id) ?></td>
                <td><?= h($followers->account_id) ?></td>
                <td><?= h($followers->target_id) ?></td>
                <td><?= h($followers->created) ?></td>
                <td><?= h($followers->modified) ?></td>
                <td><?= h($followers->unfollow) ?></td>
                <td><?= h($followers->who) ?></td>
                <td><?= h($followers->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Followers', 'action' => 'view', $followers->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Followers', 'action' => 'edit', $followers->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Followers', 'action' => 'delete', $followers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $followers->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Hates') ?></h4>
        <?php if (!empty($account->hates)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Which') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col"><?= __('Idol') ?></th>
                <th scope="col"><?= __('Vip') ?></th>
                <th scope="col"><?= __('Target Id') ?></th>
                <th scope="col"><?= __('Target Pk') ?></th>
                <th scope="col"><?= __('Target Username') ?></th>
                <th scope="col"><?= __('Target Fullname') ?></th>
                <th scope="col"><?= __('Project Id') ?></th>
                <th scope="col"><?= __('Project Name') ?></th>
                <th scope="col"><?= __('Account Id') ?></th>
                <th scope="col"><?= __('Account Pk') ?></th>
                <th scope="col"><?= __('Username') ?></th>
                <th scope="col"><?= __('Fullname') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('User Username') ?></th>
                <th scope="col"><?= __('User Name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($account->hates as $hates): ?>
            <tr>
                <td><?= h($hates->id) ?></td>
                <td><?= h($hates->created) ?></td>
                <td><?= h($hates->modified) ?></td>
                <td><?= h($hates->which) ?></td>
                <td><?= h($hates->active) ?></td>
                <td><?= h($hates->idol) ?></td>
                <td><?= h($hates->vip) ?></td>
                <td><?= h($hates->target_id) ?></td>
                <td><?= h($hates->target_pk) ?></td>
                <td><?= h($hates->target_username) ?></td>
                <td><?= h($hates->target_fullname) ?></td>
                <td><?= h($hates->project_id) ?></td>
                <td><?= h($hates->project_name) ?></td>
                <td><?= h($hates->account_id) ?></td>
                <td><?= h($hates->account_pk) ?></td>
                <td><?= h($hates->username) ?></td>
                <td><?= h($hates->fullname) ?></td>
                <td><?= h($hates->user_id) ?></td>
                <td><?= h($hates->email) ?></td>
                <td><?= h($hates->user_username) ?></td>
                <td><?= h($hates->user_name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Hates', 'action' => 'view', $hates->]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Hates', 'action' => 'edit', $hates->]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Hates', 'action' => 'delete', $hates->], ['confirm' => __('Are you sure you want to delete # {0}?', $hates->)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Henchmans') ?></h4>
        <?php if (!empty($account->henchmans)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Unfollow') ?></th>
                <th scope="col"><?= __('Who') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col"><?= __('Account Id') ?></th>
                <th scope="col"><?= __('Account Pk') ?></th>
                <th scope="col"><?= __('Username') ?></th>
                <th scope="col"><?= __('Fullname') ?></th>
                <th scope="col"><?= __('Target Id') ?></th>
                <th scope="col"><?= __('Target Pk') ?></th>
                <th scope="col"><?= __('Target Username') ?></th>
                <th scope="col"><?= __('Target Fullname') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($account->henchmans as $henchmans): ?>
            <tr>
                <td><?= h($henchmans->id) ?></td>
                <td><?= h($henchmans->created) ?></td>
                <td><?= h($henchmans->modified) ?></td>
                <td><?= h($henchmans->unfollow) ?></td>
                <td><?= h($henchmans->who) ?></td>
                <td><?= h($henchmans->active) ?></td>
                <td><?= h($henchmans->account_id) ?></td>
                <td><?= h($henchmans->account_pk) ?></td>
                <td><?= h($henchmans->username) ?></td>
                <td><?= h($henchmans->fullname) ?></td>
                <td><?= h($henchmans->target_id) ?></td>
                <td><?= h($henchmans->target_pk) ?></td>
                <td><?= h($henchmans->target_username) ?></td>
                <td><?= h($henchmans->target_fullname) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Henchmans', 'action' => 'view', $henchmans->]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Henchmans', 'action' => 'edit', $henchmans->]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Henchmans', 'action' => 'delete', $henchmans->], ['confirm' => __('Are you sure you want to delete # {0}?', $henchmans->)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Likes') ?></h4>
        <?php if (!empty($account->likes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Post Id') ?></th>
                <th scope="col"><?= __('Account Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Unlike') ?></th>
                <th scope="col"><?= __('Who') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($account->likes as $likes): ?>
            <tr>
                <td><?= h($likes->id) ?></td>
                <td><?= h($likes->post_id) ?></td>
                <td><?= h($likes->account_id) ?></td>
                <td><?= h($likes->created) ?></td>
                <td><?= h($likes->modified) ?></td>
                <td><?= h($likes->unlike) ?></td>
                <td><?= h($likes->who) ?></td>
                <td><?= h($likes->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Likes', 'action' => 'view', $likes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Likes', 'action' => 'edit', $likes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Likes', 'action' => 'delete', $likes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $likes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Loves') ?></h4>
        <?php if (!empty($account->loves)): ?>
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
            <?php foreach ($account->loves as $loves): ?>
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
    <div class="related">
        <h4><?= __('Related Messages') ?></h4>
        <?php if (!empty($account->messages)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Account Id') ?></th>
                <th scope="col"><?= __('Target Id') ?></th>
                <th scope="col"><?= __('Threadid') ?></th>
                <th scope="col"><?= __('Itemid') ?></th>
                <th scope="col"><?= __('Takenat') ?></th>
                <th scope="col"><?= __('Content') ?></th>
                <th scope="col"><?= __('Read') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col"><?= __('Cursornewest') ?></th>
                <th scope="col"><?= __('Cursoroldest') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($account->messages as $messages): ?>
            <tr>
                <td><?= h($messages->id) ?></td>
                <td><?= h($messages->account_id) ?></td>
                <td><?= h($messages->target_id) ?></td>
                <td><?= h($messages->threadid) ?></td>
                <td><?= h($messages->itemid) ?></td>
                <td><?= h($messages->takenat) ?></td>
                <td><?= h($messages->content) ?></td>
                <td><?= h($messages->read) ?></td>
                <td><?= h($messages->created) ?></td>
                <td><?= h($messages->modified) ?></td>
                <td><?= h($messages->active) ?></td>
                <td><?= h($messages->cursornewest) ?></td>
                <td><?= h($messages->cursoroldest) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Messages', 'action' => 'view', $messages->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Messages', 'action' => 'edit', $messages->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Messages', 'action' => 'delete', $messages->id], ['confirm' => __('Are you sure you want to delete # {0}?', $messages->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Posts') ?></h4>
        <?php if (!empty($account->posts)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Account Id') ?></th>
                <th scope="col"><?= __('Location Id') ?></th>
                <th scope="col"><?= __('Pk') ?></th>
                <th scope="col"><?= __('Lat') ?></th>
                <th scope="col"><?= __('Lng') ?></th>
                <th scope="col"><?= __('Likes') ?></th>
                <th scope="col"><?= __('Comments') ?></th>
                <th scope="col"><?= __('Takenat') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($account->posts as $posts): ?>
            <tr>
                <td><?= h($posts->id) ?></td>
                <td><?= h($posts->account_id) ?></td>
                <td><?= h($posts->location_id) ?></td>
                <td><?= h($posts->pk) ?></td>
                <td><?= h($posts->lat) ?></td>
                <td><?= h($posts->lng) ?></td>
                <td><?= h($posts->likes) ?></td>
                <td><?= h($posts->comments) ?></td>
                <td><?= h($posts->takenat) ?></td>
                <td><?= h($posts->created) ?></td>
                <td><?= h($posts->modified) ?></td>
                <td><?= h($posts->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Posts', 'action' => 'view', $posts->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Posts', 'action' => 'edit', $posts->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Posts', 'action' => 'delete', $posts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $posts->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Projects') ?></h4>
        <?php if (!empty($account->projects)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Account Id') ?></th>
                <th scope="col"><?= __('Plan Id') ?></th>
                <th scope="col"><?= __('Days') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Started') ?></th>
                <th scope="col"><?= __('Ended') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col"><?= __('Daystounfollow') ?></th>
                <th scope="col"><?= __('Unliketoban') ?></th>
                <th scope="col"><?= __('Followbyhashtag') ?></th>
                <th scope="col"><?= __('Followbyidol') ?></th>
                <th scope="col"><?= __('Likebyhashtag') ?></th>
                <th scope="col"><?= __('Likebyidol') ?></th>
                <th scope="col"><?= __('Maximumlike') ?></th>
                <th scope="col"><?= __('Maximumfollow') ?></th>
                <th scope="col"><?= __('Commentbyhashtag') ?></th>
                <th scope="col"><?= __('Commentbyidol') ?></th>
                <th scope="col"><?= __('Maximumcomment') ?></th>
                <th scope="col"><?= __('Proxy Id') ?></th>
                <th scope="col"><?= __('Followbycomment') ?></th>
                <th scope="col"><?= __('Likebycomment') ?></th>
                <th scope="col"><?= __('Telegramid') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($account->projects as $projects): ?>
            <tr>
                <td><?= h($projects->id) ?></td>
                <td><?= h($projects->user_id) ?></td>
                <td><?= h($projects->account_id) ?></td>
                <td><?= h($projects->plan_id) ?></td>
                <td><?= h($projects->days) ?></td>
                <td><?= h($projects->name) ?></td>
                <td><?= h($projects->started) ?></td>
                <td><?= h($projects->ended) ?></td>
                <td><?= h($projects->created) ?></td>
                <td><?= h($projects->modified) ?></td>
                <td><?= h($projects->status) ?></td>
                <td><?= h($projects->active) ?></td>
                <td><?= h($projects->daystounfollow) ?></td>
                <td><?= h($projects->unliketoban) ?></td>
                <td><?= h($projects->followbyhashtag) ?></td>
                <td><?= h($projects->followbyidol) ?></td>
                <td><?= h($projects->likebyhashtag) ?></td>
                <td><?= h($projects->likebyidol) ?></td>
                <td><?= h($projects->maximumlike) ?></td>
                <td><?= h($projects->maximumfollow) ?></td>
                <td><?= h($projects->commentbyhashtag) ?></td>
                <td><?= h($projects->commentbyidol) ?></td>
                <td><?= h($projects->maximumcomment) ?></td>
                <td><?= h($projects->proxy_id) ?></td>
                <td><?= h($projects->followbycomment) ?></td>
                <td><?= h($projects->likebycomment) ?></td>
                <td><?= h($projects->telegramid) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Projects', 'action' => 'view', $projects->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Projects', 'action' => 'edit', $projects->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Projects', 'action' => 'delete', $projects->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projects->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Proposals') ?></h4>
        <?php if (!empty($account->proposals)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Account Id') ?></th>
                <th scope="col"><?= __('Project Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Approved') ?></th>
                <th scope="col"><?= __('Verified') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col"><?= __('Appropriate') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($account->proposals as $proposals): ?>
            <tr>
                <td><?= h($proposals->id) ?></td>
                <td><?= h($proposals->account_id) ?></td>
                <td><?= h($proposals->project_id) ?></td>
                <td><?= h($proposals->created) ?></td>
                <td><?= h($proposals->modified) ?></td>
                <td><?= h($proposals->approved) ?></td>
                <td><?= h($proposals->verified) ?></td>
                <td><?= h($proposals->active) ?></td>
                <td><?= h($proposals->appropriate) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Proposals', 'action' => 'view', $proposals->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Proposals', 'action' => 'edit', $proposals->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Proposals', 'action' => 'delete', $proposals->id], ['confirm' => __('Are you sure you want to delete # {0}?', $proposals->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Vassals') ?></h4>
        <?php if (!empty($account->vassals)): ?>
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
            <?php foreach ($account->vassals as $vassals): ?>
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
