<?php $this->pageTitle = 'Users'?>
<div class="row">
  <div class="span4 columns">
    <h3>Users</h3>

    <dl>
      <dt>Number of Users</dt>
      <dd><?php echo number_format($stats['number_of_users'])?></dd>
      <dt>Confirmed Users</dt>
      <dd><?php echo number_format($stats['number_of_confirmed_users'])?></dd>
      <dt>Issues Per User</dt>
      <dd><?php echo number_format($stats['avg_issues_per_user'])?></dd>
    </dl>

    <ul>
      <li><?php echo $this->Html->link('Add User', array('controller' => 'users', 'action' => 'add'))?></li>
    </ul>
  </div>
  <div class="span12 columns">

    <table class="zebra-striped">
      <thead>
        <tr>
          <th>
            Username
          </th>
          <th>
            Email Address
          </th>
          <th>
            Confirmed?
          </th>
          <th>
            Actions
          </th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($users as $user):?>
        <tr>
          <td>
            <?php echo $user['User']['username']?>
          </td>
          <td>
            <?php echo $this->Html->link($user['User']['email_address'], "mailto:{$user['User']['email_address']}")?>
          </td>
          <td>
            <span style="color: <?php echo ($user['User']['confirmed']) ? 'green;">Yes' : 'red;">No';?></span><!-- " -->
          </td>
          <td>
            <button class="btn primary" onclick="window.location.href='/admin/users/edit/<?php echo $user['User']['id']?>';">Edit</button>
            <button class="btn primary" onclick="window.location.href='/admin/users/view/<?php echo $user['User']['id']?>';">View</button>
          </td>
        </tr>
        <?php endforeach;?>
      </tbody>
    </table>

  </div>
</div>
