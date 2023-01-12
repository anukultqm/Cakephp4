<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Userdetail> $userdetails
 */
//  echo $session = $this->request->session();
//  echo $session->write($users);
?>
<div class="userdetails index content">
    <?= $this->Html->link(__('New Userdetail'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Userdetails') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('first_name') ?></th>
                    <th><?= $this->Paginator->sort('last_name') ?></th>
                    <th><?= $this->Paginator->sort('phone_number') ?></th>
                    <th><?= $this->Paginator->sort('Gender') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($userdetails as $userdetail): ?>
                <tr>
                    <td><?= $this->Number->format($userdetail->id) ?></td>
                    <td><?= h($userdetail->first_name) ?></td>
                    <td><?= h($userdetail->last_name) ?></td>
                    <td><?= h($userdetail->phone_number) ?></td>
                    <td><?= h($userdetail->Gender) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $userdetail->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $userdetail->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $userdetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userdetail->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
