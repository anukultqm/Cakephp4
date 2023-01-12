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
            <?= $this->Html->link(__('Edit Userdetail'), ['action' => 'edit', $userdetail->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Userdetail'), ['action' => 'delete', $userdetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userdetail->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Userdetails'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Userdetail'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="userdetails view content">
            <h3><?= h($userdetail->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('First Name') ?></th>
                    <td><?= h($userdetail->first_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Last Name') ?></th>
                    <td><?= h($userdetail->last_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Phone Number') ?></th>
                    <td><?= h($userdetail->phone_number) ?></td>
                </tr>
                <tr>
                    <th><?= __('Gender') ?></th>
                    <td><?= h($userdetail->Gender) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($userdetail->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
