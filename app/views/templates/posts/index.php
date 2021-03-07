<?php include_once APPROOT . '/views/includes/header.php'; ?>
<?php flash("post_message"); ?>
<div class="row mb-3">
    <div class="col-md-6">
        <h1>Posts</h1>
    </div>
    <div class="col-md-6">
        <a href="<?php echo URLROOT; ?>/posts/add" class="btn btn-primary float-right">
            <i class="fas fa-pencil-alt"></i> Add post
        </a>
    </div>
</div>

<?php foreach ($data["posts"] as $post) : ?>
    <div class="card mb-3">
        <div class="card-body">
            <h4 class="card-title"><?php echo $post->title ?></h4>
            <div class="bg-light p-2 mb-3">
                Written by <?php echo $post->name; ?> on <?php echo date("dS M Y h:i a", strtotime($post->postCreated)); ?>
            </div>
            <p class="card-text"><?php echo $post->body; ?></p>
            <a href="<?php echo URLROOT ?>/posts/show/<?php echo $post->postId; ?>" class="btn btn-dark">
                More
            </a>
        </div>
    </div>
<?php endforeach ?>
<?php include_once APPROOT . '/views/includes/footer.php'; ?>