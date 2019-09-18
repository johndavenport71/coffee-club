<?php

include_once('../../private/initialize.php');
include(SHARED_PATH . '/header.php');

?>
<body>
    <div class="error">
        <h1>404 Error</h1>

        <p>The page you are looking wasn't found</p>

        <p>Click <a href="<?= url_for('/index.php'); ?>" title="Home">here</a> to go back to the home page</p>
    </div>
</body>
<?php include(SHARED_PATH . '/footer.php'); ?>