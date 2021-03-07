<?php include_once APPROOT . '/views/includes/header.php'; ?>
<a href="<?php echo URLROOT; ?>/posts" class="btn btn-outline-primary mb-3"><i class="fas fa-chevron-left"></i> Back</a>
<br>
<h1><?php echo $data["post"]->title; ?></h1>
<div class="bg-secondary text-white p-2 mb-3">
    Written by <?php echo $data["user"]->name; ?> on <?php echo date("dS M Y h:i a", strtotime($data["post"]->created_at)); ?>
</div>
<p class="text-justify"><?php echo $data["post"]->body; ?></p>
<br>

<?php if ($data["post"]->user_id == $_SESSION["user_id"]) : ?>
    <a href="<?php echo URLROOT; ?>/posts/edit/<?php echo $data["post"]->id; ?>" class="btn btn-info">
        Edit
    </a>
    <form action="<?php echo URLROOT; ?>/posts/delete/<?php echo $data["post"]->id; ?>" method="post" class="float-right">
        <input type="submit" value="Delete" class="btn btn-danger">
    </form>
<?php endif ?>
<?php include_once APPROOT . '/views/includes/footer.php'; ?>