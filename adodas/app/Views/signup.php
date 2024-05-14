<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Codeigniter Auth User Registration Example</title>
    <style>
        body, html {
            height: 100%;
        }
        .container {
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .card {
            width: 100%;
            max-width: 500px;
            padding: 20px;
            box-shadow: 0 0 15px rgba(0,0,0,0.2);
        }
        .title {
        font-size: 2rem;
        font-weight: 700;
        text-align: center;
        margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <h2 class="title">Register User</h2>
            <?php if(isset($validation)):?>
                <div class="alert alert-warning">
                    <?= $validation->listErrors() ?>
                </div>
            <?php endif;?>
            <form action="<?php echo base_url(); ?>/SignupController/store" method="post">
                <div class="form-group mb-3">
                    <input type="text" name="firstName" placeholder="First Name" value="<?= set_value('firstName') ?>" class="form-control" >
                </div>
                <div class="form-group mb-3">
                    <input type="text" name="middleName" placeholder="Middle Name" value="<?= set_value('middleName') ?>" class="form-control" >
                </div>
                <div class="form-group mb-3">
                    <input type="text" name="lastName" placeholder="Last Name" value="<?= set_value('lastName') ?>" class="form-control" >
                </div>
                <div class="form-group mb-3">
                    <input type="text" name="username" placeholder="Username" value="<?= set_value('username') ?>" class="form-control" >
                </div>
                <div class="form-group mb-3">
                    <input type="email" name="email" placeholder="Email" value="<?= set_value('email') ?>" class="form-control" >
                </div>
                <div class="form-group mb-3">
                    <input type="password" name="password" placeholder="Password" class="form-control" >
                </div>
                <div class="form-group mb-3">
                    <input type="password" name="confirmpassword" placeholder="Confirm Password" class="form-control" >
                </div>
                <div class="d-grid mb-3">
                    <button type="submit" class="btn btn-dark">Signup</button>
                </div>
                <div class="text-center">
                    <small>Already have an account? <a href="/signin">Sign In</a></small>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
