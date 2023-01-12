<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\User> $users
 */

 echo $this->element('breadcrumb');
//  echo $this->request->session()->read('Auth.users.email');


?>
 <?php
//   echo $session = $this->request->getSession();
//     echo $session->read('email');
?>
<?= $this->fetch('css') ?>

<div class="users index content">
   
    <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'button']) ?>
    <?= $this->Html->link(__('Logout'), ['action' => 'logout'], ['class' => 'button']) ?>  

    <?php echo $this->Form->create(null,['type'=>'get']);?>
          <?php echo $this->Form->control('key',['label'=>'Search','value'=>$this->request->getQuery('key')]);?>
          <?php echo $this->Form->submit();?>
          <?php echo $this->Form->end();?>
    <h3><?= __('Users') ?></h3>
    <div class="table-responsive">
        <?= $this->Form->create(null,['url'=>['action'=>'deleteAll']]) ?>
        <button>Delete All</button>
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('#') ?></th>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('fname') ?></th>
                    <th><?= $this->Paginator->sort('lname') ?></th>
                    <th><?= $this->Paginator->sort('phone') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('password') ?></th>
                    <th><?= $this->Paginator->sort('gender') ?></th>
                    <th><?= $this->Paginator->sort('created_date') ?></th>             
                    <th><?= $this->Paginator->sort('image') ?></th>             
                  
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $users): ?>
                <tr>
                    <td><?= $this->Form->checkbox('id[]',['value'=>$users->id])?></td>
                    <td><?= $this->Number->format($users->id) ?></td>
                    <td><?= h($users->fname) ?></td>
                    <td><?= h($users->lname) ?></td>
                    <td><?= h($users->phone) ?></td>
                    <td><?= h($users->email) ?></td>
                    <td><?= h($users->password) ?></td>
                    <td><?= h($users->gender) ?></td>
                    <td><?= h($users->created_date) ?></td>            
                    <td><?= $this->Html->image($users->image)?></td>            
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $users->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $users->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?= $this->Form->end() ?>
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
