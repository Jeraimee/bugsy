<?php $this->pageTitle = "{$user['User']['username']}"?>
<div class="row">
  <div class="span4 columns">
    <h3>User</h3>
    <ul>
      <li><?php echo $this->Html->link('Issues', '#issues')?></li>
      <li><?php echo $this->Html->link('Comments', '#comments')?></li>
      <li><?php echo $this->Html->link('Edit', array('controller' => 'users', 'action' => 'edit', $user['User']['id'], 'admin' => true))?>
    </ul>
    <ul>
      <li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('User.id')), null, "Are you sure you want to delete user {$user['User']['id']}?"); ?></li>
    </ul>
  </div>
  <div class="span12 columns">
    <p>
      <dl>
        <dt>ID</dt>
        <dd><?php echo $user['User']['id']?></dd>

        <dt>Created</dt>
        <dd><?php echo $this->Time->nice($user['User']['created'])?> (<?php echo $this->Time->timeAgoInWords($user['User']['created'])?>)</dd>

        <dt>Last Modified</dt>
        <dd><?php echo $this->Time->nice($user['User']['modified'])?> (<?php echo $this->Time->timeAgoInWords($user['User']['modified'])?>)</dd>

        <dt>Username</dt>
        <dd><?php echo $user['User']['username']?></dd>

        <dt>Email Address</dt>
        <dd><?php echo $this->Html->link($user['User']['email_address'], "mailto:{$user['User']['email_address']}")?></dd>

        <dt>Confirmed?</dt>
        <dd><span style="color: <?php echo ($user['User']['confirmed']) ? 'green;">Yes' : 'red;">No';?></span><!-- " --></dd>
      </dl>
    </p>

    <h3 name="issues">Issues</h3>

    <table class="zebra-striped">
      <thead>
        <tr>
          <th>
            ID
          </th>
          <th>
            Subject
          </th>
          <th>
            Status
          </th>
          <th>
            Priority
          </th>
          <th>
            Actions
          </th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($user['Issue'] as $issue):?>
        <tr>
          <td>
            <?php echo $issue['id']?>
          </td>
          <td>
            <?php echo $this->Text->truncate($issue['subject'], 50)?>
          </td>
          <td>
            <?php echo $issue['status']?>
          </td>
          <td>
            <?php echo $issue['priority']?>
          </td>
          <td>
            <?php if (!empty($user)):?>
            <button class="btn primary" onclick="window.location.href='/issues/edit/<?php echo $issue['id']?>';">Edit</button>
            <?php endif;?>
            <button class="btn primary" onclick="window.location.href='/issues/view/<?php echo $issue['id']?>';">View</button>
          </td>
        </tr>
        <?php endforeach;?>
      </tbody>
    </table>

    <h3 name="comments">Comments</h3>

    <table class="zebra-striped">
      <tbody>
        <?php foreach ($user['Comment'] as $comment):?>
        <tr id="comment-<?php echo $comment['id']?>" name="comment-<?php echo $comment['id']?>">
          <td>
            <p style="font-size: .8em; float: right; padding: 0 0 .5em .5em; margin: -1em -.5em 0 0;">Posted <?php echo $this->Time->timeAgoInWords($comment['created'])?> on <?php echo $this->Html->link("Issue {$comment['Issue']['id']}", array('controller' => 'issues', 'action' => 'view', $comment['Issue']['id'], 'admin' => false))?></p>
            <?php echo $comment['comment']?>
          </td>
        </tr>
        <?php endforeach;?>
      </tbody>
    </table>

  </div>
</div>
