<?php 
    require_once('../private/initialize.php');
    include(SHARED_PATH . '/main-header.php');
?>

<main>
  <div class="flex">
    <div class="tile">
      <h2>Coffee Beans</h2>
      <p>We sell coffee beans and you can buy them!</p>
      <p>Light, medium, or dark roast, we even sell espresso beans.</p>
      <img src="images/tile-1.jpg" alt="Coffee beans in a burlap bag" width=250px height=200px>
    </div>
    <div class="tile">
      <h2>Special Deals</h2>
      <p>We offer weekly specials and seasonal items that are not available year round.</p>
      <p>Visit us in person or <a href="<?= url_for('/members/index.php'); ?>">Log in</a> to view our deals.</p>
      <img src="images/tile-2.jpg" alt="Three mugs of coffee held together" width=250px height=200px>
    </div>
    <div class="tile">
      <h2>Locally Owned</h2>
      <p>We are locally owned and source our beans from local farms.</p>
      <p>Contact us for partnership opportunities.</p>
      <img src="images/tile-3.jpg" alt="A customer ordering at a coffee shop" width=250px height=200px>
    </div>
    <div class="tile large">
      <h2>Sign Up Now and Start Ordering</h2>
      <p>Experience our excellent customer service and world class products!</p>
      <a href="<?= url_for('/sign-up.php'); ?>" class="cta">Sign Up!</a>
    </div>
  </div>
  
</main>

<?php include(SHARED_PATH . '/footer.php'); ?>
