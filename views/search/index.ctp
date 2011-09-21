<?php $this->pageTitle = 'Search Results'?>
<div class="row">
  <div class="span4 columns">
    <h3>Search Results</h3>
    <dl>
      <dt>Search Query</dt>
      <dd><?php echo $q?></dd>
      <dt>Result Count</dt>
      <dd><?php echo number_format(count($issues))?></dd>
    </dl>
  </div>
  <div class="span12 columns">

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
        <?php foreach ($issues as $issue):?>
        <tr>
          <td>
            <?php echo $issue['Issue']['id']?>
          </td>
          <td>
            <?php echo $this->Text->truncate($issue['Issue']['subject'], 50)?>
          </td>
          <td>
            <?php echo $issue['Issue']['status']?>
          </td>
          <td>
            <?php echo $issue['Issue']['priority']?>
          </td>
          <td>
            <?php if (!empty($user)):?>
            <button class="btn primary" onclick="window.location.href='/issues/edit/<?php echo $issue['Issue']['id']?>';">Edit</button>
            <?php endif;?>
            <button class="btn primary" onclick="window.location.href='/issues/view/<?php echo $issue['Issue']['id']?>';">View</button>
          </td>
        </tr>
        <?php endforeach;?>
      </tbody>
    </table>

  </div>
</div>
