<?php include_once APPROOT . '/views/includes/header.php'; ?>
<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card bg-light">
            <div class="card-body">
                <h3 class="card-title">Create account</h3>
                <form action="<?php echo URLROOT; ?>/users/register" method="post">
                    <div class="form-group">
                        <label for="name">Enter name <sup class="text-danger">*</sup></label>
                        <input type="text" id="name" name="name" class="form-control <?php echo (!empty($data["name_err"])) ? "is-invalid" : ""; ?>" value="<?php echo $data["name"]; ?>">
                        <div class="invalid-feedback"><?php echo $data["name_err"]; ?></div>
                    </div>
                    <div class="form-group">
                        <label for="email">Enter email <sup class="text-danger">*</sup></label>
                        <input type="email" id="email" name="email" class="form-control <?php echo (!empty($data["email_err"])) ? "is-invalid" : ""; ?>" value="<?php echo $data["email"]; ?>">
                        <div class="invalid-feedback"><?php echo $data["email_err"]; ?></div>
                    </div>
                    <div class="form-group">
                        <label for="password">Enter password <sup class="text-danger">*</sup></label>
                        <input type="password" id="password" name="password" class="form-control <?php echo (!empty($data["password_err"])) ? "is-invalid" : ""; ?>" value="<?php echo $data["password"]; ?>">
                        <div class="invalid-feedback"><?php echo $data["password_err"]; ?></div>
                    </div>
                    <div class="form-group">
                        <label for="cnf_password">Confirm password <sup class="text-danger">*</sup></label>
                        <input type="password" id="cnf_password" name="confirm_password" class="form-control <?php echo (!empty($data["confirm_password_err"])) ? "is-invalid" : ""; ?>" value="<?php echo $data["confirm_password"]; ?>">
                        <div class="invalid-feedback"><?php echo $data["confirm_password_err"]; ?></div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="submit" value="Resgister" class="btn btn-success btn-block">
                        </div>
                        <div class="col">
                            <a href="<?php echo URLROOT; ?>/users/login" class="btn btn-link btn-block"> login here</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include_once APPROOT . '/views/includes/footer.php'; ?>