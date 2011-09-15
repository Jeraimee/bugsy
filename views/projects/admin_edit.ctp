<?php $this->pageTitle = 'Edit Project'?>
<div class="row">
  <div class="span4 columns">
    <h3>Editing Project</h3>
    <p>
      <dl>
        <dt>Public View</dt>
        <dd>Project will be viewable by users not logged into Bugsy</dd>
        <dt>Public Add</dt>
        <dd>Project issues can be created by users not logged into Bugsy</dd>
      </dl>
    </p>
  </div>
  <div class="span12 columns">

    <?php echo $this->Form->create('Project', array('class' => 'form-stacked'));?>
    <fieldset>
      <?php
        echo $this->Form->input('id');
        echo $this->Form->input('name', array('div' => array('class' => 'clearfix')));
        echo $this->Form->input('description', array('div' => array('class' => 'clearfix')));
        echo $this->Form->input('public_view', array('div' => array('class' => 'clearfix')));
        echo $this->Form->input('public_add', array('div' => array('class' => 'clearfix')));
      ?>
    </fieldset>
    <div class="actions">
      <?php echo $this->Form->button(__('Save Project', true), array('class' => 'btn primary'))?>
    </div>
    <?php echo $this->Form->end();?>

  </div>
</div>
<script type="text/javascript">
document.observe('dom:loaded', function() {
  $('ProjectPublicAdd').observe('click', function(e) {
    if (Event.element(e).checked == true) {
      $('ProjectPublicView').checked = true;
    }
  });
  $('ProjectPublicView').observe('click', function(e) {
    if (Event.element(e).checked == false) {
      $('ProjectPublicAdd').checked = false;
    }
  });
});
</script>
