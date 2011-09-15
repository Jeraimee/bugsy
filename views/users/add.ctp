<?php $this->pageTitle = 'Create Account'?>
<div class="row">
  <div class="span4 columns">
    <h3>Creating Account</h3>
    <p>
      Creating an account will allow you to add issues to non-public projects as well as get email notifications from Bugsy.
    </p>
    <p>
      Fields in <span style="color: red">red</span> are required.
    </p>
  </div>
  <div class="span12 columns">
    <?php echo $this->Form->create('User', array('class' => 'form-stacked'));?>
      <fieldset>
      <?php echo $this->Form->input('username', array('div' => array('class' => 'clearfix')));
      echo $this->Form->input('password', array('div' => array('class' => 'clearfix')));
      echo $this->Form->input('password_confirm', array('type' => 'password', 'div' => array('class' => 'clearfix required')));
      echo $this->Form->input('email_address', array('div' => array('class' => 'clearfix')))?>
      </fieldset>
      <div class="actions">
        <?php echo $this->Form->button(__('Create Account', true), array('class' => 'btn primary'))?>
      </div>
      <?php echo $this->Form->end();?>
    </div>
  </div>
</div>
