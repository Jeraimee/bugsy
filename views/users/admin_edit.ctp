<?php $this->pageTitle = "Editing {$user['User']['username']}"?>
<div class="row">
  <div class="span4 columns">
    <h3>Editing A User</h3>
    <p class="alert-message block-message error">
      <strong>WARNING!</strong> Changing a users username or email address could render their account unusable. Please, edit users with care.
    </p>
    <ul>
      <li><?php echo $this->Html->link('View', array('controller' => 'users', 'action' => 'view', $this->data['User']['id'], 'admin' => true))?>
    </ul>
    <ul>
      <li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('User.id')), null, "Are you sure you want to delete user {$this->Form->value('User.id')}?"); ?></li>
    </ul>
    <p>
      Fields in <span style="color: red">red</span> are required.
    </p>
  </div>
  <div class="span12 columns">

  <?php echo $this->Form->create('User', array('class' => 'form-stacked'));?>
  <fieldset>
  <?php
    echo $this->Form->input('id');
    echo $this->Form->input('username', array('div' => array('class' => 'clearfix')));
    echo $this->Form->input('email_address', array('div' => array('class' => 'clearfix')));
    echo $this->Form->input('confirmed', array('div' => array('class' => 'clearfix')));
  ?>
  </fieldset>
  <div class="actions">
    <?php echo $this->Form->button(__('Save User', true), array('class' => 'btn primary'))?>
  </div>
  <?php echo $this->Form->end();?>
  </div>
</div>
