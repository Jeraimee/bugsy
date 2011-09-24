<?php $this->pageTitle = 'My Bugsy'?>
<div class="row">
  <div class="span4 columns">
    <h3>My Bugsy</h3>
    <ul>

    </ul>
    <?php if (!$user['User']['confirmed']):?>
    <ul>
      <li>Send Confirmation Email</li>
    </ul>
    <?php endif;?>
  </div>
  <div class="span12 columns">
    <h3>Account Details</h3>
    <dl>
      <dt>Created</dt>
      <dd><?php echo $this->Time->nice($user['User']['created'])?></dd>

      <dt>Last Modified</dt>
      <dd><?php echo $this->Time->nice($user['User']['modified'])?></dd>

      <dt>Username</dt>
      <dd><?php echo $user['User']['username']?></dd>

      <dt>Email Address</dt>
      <dd><?php echo $user['User']['email_address']?></dd>

      <dt>Confirmed?</dt>
      <dd><span style="color: <?php echo ($user['User']['confirmed']) ? 'green;">Yes' : 'red;">No';?></span><!-- " --></dd>

    </dl>

    <h3>Your Issues</h3>

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

  </div>
</div>
