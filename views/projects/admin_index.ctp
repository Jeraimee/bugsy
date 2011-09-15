<?php $this->pageTitle = 'Projects Admin'?>
<div class="row">
  <div class="span4 columns">
    <h3>Projects Admin</h3>
    <ul>
      <li><?php echo $this->Html->link('New Project', array('action' => 'add'))?></li>
    </ul>
  </div>
  <div class="span12 columns">

    <table class="zebra-striped">
      <thead>
        <tr>
          <th>
            Project Name
          </th>
          <th>
            Issue Count
          </th>
          <th>
            Actions
          </th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($projects as $project):?>
        <td>
          <?php echo $project['Project']['name']?>
        </td>
        <td>
          <?php echo number_format($project['Project']['issue_count'])?>
        </td>
        <td>
          <button class="btn primary" onclick="window.location.href='/admin/projects/edit/<?php echo $project['Project']['id']?>';">Edit</button>
          <button class="btn primary" onclick="window.location.href='/admin/projects/view/<?php echo $project['Project']['id']?>';">View</button>
          <button class="btn danger" onclick="goOnConfirm('/admin/projects/delete/<?php echo $project['Project']['id']?>', 'Are you sure you want to delete <?php echo $project['Project']['name']?>?\n\nThis will delete all issues related to this project as well!');">Delete</button>
        </td>
        <?php endforeach;?>
      </tbody>
    </table>

  </div>
</div>
