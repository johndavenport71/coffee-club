<?php 
  require_once('../../private/initialize.php'); 
  
  $results = getMembers($conn);

  $page_title = 'Members Area - Coffee Club';
  include(SHARED_PATH . '/header.php');

?>

<main role="main" class="members">
  
  <h2>Members</h2>
  <a class="add" href="<?= url_for('/sign-up.php'); ?>">Add new member</a>
  <div class="members">
    <?php while($row = $results->fetch()) { ?>
        <div class="member-tile">
          <div>
            Member ID: <?= $row['member_ID']; ?>
          </div>
          <div>
            <?= $row['first_name']; ?>&nbsp;<?= $row['last_name']; ?>
          </div>
          <div>
            <?= $row['email']; ?>
          </div>
          <div>
            <span class="more"><i class="material-icons">more_horiz</i></span>
            <div class="pop-up">
              <a href="<?= url_for('members/show.php?id=' . u($row['member_ID'])); ?>">View</a>
              <a href="<?= url_for('members/edit.php?id=' . u($row['member_ID'])); ?>">Edit</a>
              <a href="<?= url_for('members/delete.php?id=' . u($row['member_ID'])); ?>">Delete</a>
            </div>
          </div>
        </div>

    <?php } ?>


  </div>
</main>

<?php include(SHARED_PATH . '/footer.php'); ?>