<?php 
  require_once('../../private/initialize.php'); 

  // $members = [
  //   ['id' => '1', 'firstName' => 'Sarah', 'lastName' => 'Perkins', 'email' => 'sarahn@email.com'],
  //   ['id' => '2', 'firstName' => 'Bill', 'lastName' => 'Perkins', 'email' => 'billn@email.com'],
  //   ['id' => '3', 'firstName' => 'Daphne', 'lastName' => 'Cooper', 'email' => 'daphnec@email.com'],
  //   ['id' => '4', 'firstName' => 'Sean', 'lastName' => 'Bean', 'email' => 'boromir@email.com'],
  //   ['id' => '5', 'firstName' => 'Francis', 'lastName' => 'Moore', 'email' => 'francism@email.com']
  // ];

  $page_title = 'Members Area - Coffee Club';
  include(SHARED_PATH . '/header.php');
?>

<main>
  <div class="members">
    <h2>Members</h2>
    <a class="add" href="">Add new member</a>
  	<table class="list">
  	  <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
  	    <th>Email</th>
  	    <th colspan="3">Manage</th>
  	  </tr>

      <?php foreach($members as $member) { ?>
        <tr>
          <td><?= h($member['id']); ?></td>
          <td><?= h($member['firstName']); ?></td>
          <td><?= $member['lastName']; ?></td>
    	    <td><?= h($member['email']); ?></td>
          <td colspan="3">
            <a href="<?= url_for('members/show.php?id=' . h(u($member['id']))); ?>">View</a>
            <a href="">Edit</a>
            <a href="">Delete</a>
          </td>
    	  </tr>
      <?php } ?>
  	</table>
  </div>
</main>

<?php include(SHARED_PATH . '/footer.php'); ?>