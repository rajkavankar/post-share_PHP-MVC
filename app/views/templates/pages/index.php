<?php include_once APPROOT . '/views/includes/header.php'; ?>
<div class="jumbotron jumbotron-fluid text-center">
    <div class="container">
        <h1 class="display-3"><?php echo $data["title"]; ?></h1>
        <hr>
        <p class="lead"><?php echo $data["description"]; ?></p>
    </div>
</div>
<?php include_once APPROOT . '/views/includes/footer.php'; ?>