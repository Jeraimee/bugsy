<div class="row">

  <div class="span5 columns">
    <h3>Recent Projects</h3>
    <table class="zebra-striped">
      <?php foreach ($projects as $project):?>
      <tr>
        <td>
          <?php echo $this->Html->link($project['Project']['name'], array('controller' => 'projects', 'action' => 'view', $project['Project']['id']))?>
        </td>
      </tr>
      <?php endforeach;?>
    </table>
  </div>

  <div class="span5 columns">
    <h3>Recent Issues</h3>
    <table class="zebra-striped">
      <?php foreach ($issues as $issue):?>
      <tr>
        <td>
          <?php echo $this->Html->link($issue['Issue']['subject'], array('controller' => 'issues', 'action' => 'view', $issue['Issue']['id']))?>
        </td>
      </tr>
      <?php endforeach;?>
    </table>
  </div>

  <div class="span5 columns">
    <h3>Recent Comments</h3>
    <table class="zebra-striped">
      <?php foreach ($comments as $comment):?>
      <tr>
        <td>
          <?php echo $this->Html->link($this->Text->truncate($comment['Comment']['comment'], 25), array('controller' => 'issues', 'action' => 'view', $comment['Comment']['issue_id']))?>
        </td>
      </tr>
      <?php endforeach;?>
    </table>
  </div>

</div>
