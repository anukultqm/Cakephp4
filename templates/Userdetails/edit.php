<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Userdetail $userdetail
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $userdetail->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $userdetail->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Userdetails'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="userdetails form content">
            <?= $this->Form->create($userdetail) ?>
            <fieldset>
                <legend><?= __('Edit Userdetail') ?></legend>
                <?php
                    echo $this->Form->control('first_name');
                    echo $this->Form->control('last_name');
                    echo $this->Form->control('phone_number');
                    echo $this->Form->control('Gender');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
