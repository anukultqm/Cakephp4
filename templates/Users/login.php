<!-- in /templates/Users/login.php -->

<div class="users form">
    <?= $this->Flash->render() ?>

    <?= $this->Html->link(__('Add User'), ['action' => 'add'], ['class' => 'button']) ?>
    <h3>Login</h3>
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Please enter your email and password') ?></legend>
        <?= $this->Form->control('email', ['required' => true]) ?>
        <?= $this->Form->control('password', ['required' => true]) ?>
    </fieldset>
    <?= $this->Form->submit(__('Login')); ?>
    <?= $this->Form->end() ?>   
</div>

