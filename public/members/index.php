<?php require_once('../../private/initialize.php'); ?>

<?php
  $members = [
    ['id' => '1', 'firstName' => 'Sarah', 'lastName' => 'Perkins', 'email' => 'sarahn@email.com'],
    ['id' => '2', 'firstName' => 'Bill', 'lastName' => 'Perkins', 'email' => 'billn@email.com'],
    ['id' => '3', 'firstName' => 'Daphne', 'lastName' => 'Cooper', 'email' => 'daphnec@email.com'],
    ['id' => '4', 'firstName' => 'Francis', 'lastName' => 'Moore', 'email' => 'francism@email.com']
  ];
?>

<?php $page_title = 'Members Area - Coffee Club'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="content">
  <div class="members listing">
    <h1>Members</h1>

    <div class="actions">
      <a class="action" href="">Add new member</a>
    </div>

  	<table class="list">
  	  <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
  	    <th>Email</th>
  	    <th>&nbsp;</th>
  	    <th>&nbsp;</th>
        <th>&nbsp;</th>
  	  </tr>

      <?php foreach($members as $member) { ?>
        <tr>
          <td><?php echo h($member['id']); ?></td>
          <td><?php echo h($member['firstName']); ?></td>
          <td><?php echo $member['lastName'] == 1 ? 'true' : 'false'; ?></td>
    	    <td><?php echo h($member['email']); ?></td>
          <td><a class="action" href="<?php echo url_for('members/show.php?id=' . h(u($member['id']))); ?>">View</a></td>
          <td><a class="action" href="">Edit</a></td>
          <td><a class="action" href="">Delete</a></td>
    	  </tr>
      <?php } ?>
  	</table>

  </div>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
