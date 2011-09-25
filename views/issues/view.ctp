<?php $this->pageTitle = "Issue ID {$issue['Issue']['id']}"?>
<div class="row">
  <div class="span4 columns">
    <h3>Issue Actions</h3>
    <?php if (!empty($user)):?>
    <ul>
      <li><?php echo $this->Html->link('Add Comment', '#add_comment')?></li>
      <li><?php echo $this->Html->link('Edit Issue', array('action' => 'edit', $issue['Issue']['id']))?></li>
    </ul>
    <?php else:?>
    <p class="alert-message block-message info">
      You are not logged in. You will not be able to comment on or edit issues.
    </p>
    <?php endif;?>
  </div>
  <div class="span12 columns">
    <p>
      <dl>
        <dt>ID</dt>
        <dd><?php echo $issue['Issue']['id']?></dd>

        <dt>Subject</dt>
        <dd><?php echo $issue['Issue']['subject']?></dd>

        <dt>Description</dt>
        <dd><?php echo nl2br($issue['Issue']['description'])?></dd>

        <dt>URL</dt>
        <dd><?php echo ($issue['Issue']['url']) ? $this->Html->link($issue['Issue']['url'], $issue['Issue']['url'], array('rel' => 'nofollow')) : 'None';?>

        <dt>Status</dt>
        <dd><?php echo $issue['Issue']['status']?></dd>

        <dt>Priority</dt>
        <dd><?php echo $issue['Issue']['priority']?></dd>

        <dt>Created</dt>
        <dd><?php echo $this->Time->nice($issue['Issue']['created'])?></dd>

        <dt>Last Modified</dt>
        <dd><?php echo $this->Time->nice($issue['Issue']['modified'])?></dd>
      </dl>
    </p>

    <h3>Comments</h3>

    <table class="zebra-striped">
      <tbody>
        <?php foreach ($issue['Comment'] as $comment):?>
        <tr id="comment-<?php echo $comment['id']?>" name="comment-<?php echo $comment['id']?>">
          <td>
            <p style="font-size: .8em; float: right; padding: 0 0 .5em .5em; margin: -1em -.5em 0 0;">Posted <?php echo $this->Time->timeAgoInWords($comment['created'])?> by <?php echo $comment['User']['username']?></p>
            <?php echo $comment['comment']?>
          </td>
        </tr>
        <?php endforeach;?>
      </tbody>
    </table>

    <?php if (!empty($user)):?>
    <h3 id="add_comment" name="add_comment">Add Comment</h3>

    <?php echo $this->Form->create('Comment', array('action' => 'add', 'class' => 'form-stacked'))?>
    <fieldset>
    <?php
      echo $this->Form->input('issue_id', array('value' => $issue['Issue']['id'], 'type' => 'hidden'));
      echo $this->Form->input('comment', array('div' => array('class' => 'clearfix')));
    ?>
    </fieldset>
    <div class="actions">
      <?php echo $this->Form->button(__('Add Comment', true), array('class' => 'btn primary'))?>
    </div>
    <?php echo $this->Form->end();
    endif;?>

  </div>
</div>
