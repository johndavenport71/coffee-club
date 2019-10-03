<?php 
  require_once('../../private/initialize.php'); 
  
  $results = getMembers($conn);

  $page_title = 'Members Area - Coffee Club';
  include(SHARED_PATH . '/header.php');

?>

<main>
  <div class="members">
    <h2>Members</h2>
    <a class="add" href="<?= url_for('/sign-up.php'); ?>">Add new member</a>
  	<table class="list">
  	  <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
  	    <th>Email</th>
  	    <th colspan="3">Manage</th>
  	  </tr>

      <?php while($row = $results->fetch()) { ?>
        <tr>
          <td><?= $row['member_ID']; ?></td>
          <td><?= $row['first_name']; ?></td>
          <td><?= $row['last_name']; ?></td>
    	    <td><?= $row['email']; ?></td>
          <td colspan="3">
            <a href="<?= url_for('members/show.php?id=' . u($row['member_ID'])); ?>">View</a>
            <a href="<?= url_for('members/edit.php?id=' . u($row['member_ID'])); ?>">Edit</a>
            <a href="<?= url_for('members/delete.php?id=' . u($row['member_ID'])); ?>">Delete</a>
          </td>
    	  </tr>
      <?php } ?>
  	</table>
  </div>
</main>

<?php include(SHARED_PATH . '/footer.php'); ?>