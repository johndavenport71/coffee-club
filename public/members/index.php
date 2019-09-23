<?php 
  require_once('../../private/initialize.php'); 

  // $members = [
  //   ['id' => '1', 'firstName' => 'Sarah', 'lastName' => 'Perkins', 'email' => 'sarahn@email.com'],
  //   ['id' => '2', 'firstName' => 'Bill', 'lastName' => 'Perkins', 'email' => 'billn@email.com'],
  //   ['id' => '3', 'firstName' => 'Daphne', 'lastName' => 'Cooper', 'email' => 'daphnec@email.com'],
  //   ['id' => '4', 'firstName' => 'Sean', 'lastName' => 'Bean', 'email' => 'boromir@email.com'],
  //   ['id' => '5', 'firstName' => 'Francis', 'lastName' => 'Moore', 'email' => 'francism@email.com']
  // ];

  $sql = "SELECT * FROM members;";
  $results = $conn->query($sql);


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
          <td><?= $row['ID']; ?></td>
          <td><?= $row['first_name']; ?></td>
          <td><?= $row['last_name']; ?></td>
    	    <td><?= $row['email']; ?></td>
          <td colspan="3">
            <a href="<?= url_for(
              'members/show.php?id=' . u($row['ID']) . '&fname=' . u($row['first_name']) . 
              '&lname=' . u($row['last_name']) . '&email=' . u($row['email'])
              ); ?>">View</a>
            <a href="<?= url_for(
              'members/edit.php?id=' . u($row['ID']) . '&fname=' . u($row['first_name']) . 
              '&lname=' . u($row['last_name']) . '&email=' . u($row['email'])
              ); ?>">Edit</a>
            <a href="">Delete</a>
          </td>
    	  </tr>
      <?php } ?>
  	</table>
  </div>
</main>

<?php include(SHARED_PATH . '/footer.php'); ?>