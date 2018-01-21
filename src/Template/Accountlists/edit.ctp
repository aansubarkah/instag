<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Accountlist $accountlist
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $accountlist->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $accountlist->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Accountlists'), ['action' => 'index']) ?></li>
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
<div class="accountlists form large-9 medium-8 columns content">
    <?= $this->Form->create($accountlist) ?>
    <fieldset>
        <legend><?= __('Edit Accountlist') ?></legend>
        <?php
            echo $this->Form->control('account_id', ['options' => $accounts, 'empty' => true]);
            echo $this->Form->control('project_id', ['options' => $projects, 'empty' => true]);
            echo $this->Form->control('which');
            echo $this->Form->control('active');
            echo $this->Form->control('idol');
            echo $this->Form->control('vip');
            echo $this->Form->control('nextmaxid');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
