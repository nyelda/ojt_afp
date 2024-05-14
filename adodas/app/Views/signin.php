<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Codeigniter Login with Email/Password Example</title>
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
      .brand-title {
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
        <div class="brand-title">ADODAS</div>
        <?php if(session()->getFlashdata('msg')):?>
          <div class="alert alert-warning">
            <?= session()->getFlashdata('msg') ?>
          </div>
        <?php endif;?>
        <form action="<?php echo base_url(); ?>/SigninController/loginAuth" method="post">
          <div class="form-group mb-3">
            <input type="email" name="email" placeholder="Email" value="<?= set_value('email') ?>" class="form-control">
          </div>
          <div class="form-group mb-3">
            <input type="password" name="password" placeholder="Password" class="form-control">
          </div>
          <div class="d-grid">
            <button type="submit" class="btn btn-success">Log In</button>
          </div>
        </form>
        <div class="row justify-content-md-center mt-3">
          <small>New to ADODAS? Create an account <a href="/signup">here</a>.</small>
        </div>
      </div>
    </div>
  </body>
</html>
