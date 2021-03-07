<?php include_once APPROOT . '/views/includes/header.php'; ?>
<a href="<?php echo URLROOT; ?>/posts" class="btn btn-outline-primary mb-3"><i class="fas fa-chevron-left"></i> Back</a>
<div class="card bg-light">
    <div class="card-body">
        <h2 class="card-title">Add post</h2>
        <form action="<?php echo URLROOT; ?>/posts/add" method="post">
            <div class="form-group">
                <label for="title">Enter title <sup class="text-danger">*</sup></label>
                <input type="text" id="title" name="title" class="form-control <?php echo (!empty($data["title_err"])) ? "is-invalid" : ""; ?>" value="<?php echo $data["title"]; ?>">
                <div class="invalid-feedback"><?php echo $data["title_err"]; ?></div>
            </div>
            <div class="form-group">
                <label for="body">Enter body <sup class="text-danger">*</sup></label>
                <textarea id="body" name="body" class="form-control <?php echo (!empty($data["body_err"])) ? "is-invalid" : ""; ?>" value="<?php echo $data["body"]; ?>"></textarea>
                <div class="invalid-feedback"><?php echo $data["body_err"]; ?></div>
            </div>
            <input type="submit" value="Submit" class="btn btn-success">
        </form>
    </div>
</div>

<?php include_once APPROOT . '/views/includes/footer.php'; ?>