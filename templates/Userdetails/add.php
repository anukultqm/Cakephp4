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
            <?= $this->Html->link(__('List Userdetails'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="userdetails form content">
            <?= $this->Form->create($userdetail) ?>
            <fieldset>
                <legend><?= __('Add Userdetail') ?></legend>
                <?php
                    echo $this->Form->control('first_name',['required'=>false]);
                    echo $this->Form->control('last_name',['required'=>false]);
                    echo $this->Form->control('phone_number',['required'=>false]);
                    echo $this->Form->radio('Gender',['male'=>'male','female'=>'female'],['empty' => 'Gender',]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
