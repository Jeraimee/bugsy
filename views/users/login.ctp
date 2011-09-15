<?php $this->pageTitle = 'Login'?>
<div class="row">
  <div class="span4 columns">
    <h3>User Login</h3>
    <p>
      If you have forgotten your password <?php echo $this->Html->link('click here', '')?> to reset your password.
    </p>
    <p>
      Fields in <span style="color: red">red</span> are required.
    </p>
  </div>
  <div class="span12 columns">
    <?php echo $this->Form->create('User', array('action' => 'login', 'class' => 'form-stacked'));?>
      <fieldset>
      <?php echo $this->Form->input('username', array('div' => array('class' => 'clearfix')));
      echo $this->Form->input('password', array('div' => array('class' => 'clearfix')))?>
      </fieldset>
      <div class="actions">
        <?php echo $this->Form->button(__('Login', true), array('class' => 'btn primary'))?>
      </div>
      <?php echo $this->Form->end();?>
    </div>
  </div>
</div>
