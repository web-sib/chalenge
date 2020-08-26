<html>

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?= base_url('') ?>asset/css/style.css">
    <link rel="stylesheet" href="<?= base_url('') ?>asset/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="<?= base_url('') ?>asset/auth/css/themify-icons.css">
    <link rel="stylesheet" href="<?= base_url('') ?>asset/auth/css/style.css">
</head>

<body>
    <div class="container">
        <div class="row justify-content-md-center margin-top">
            <div class="col-sm-8">
                <div style="background-color: white" class="row border-box shadow">
                    <div class="col-sm-6 p-0">
                        <img src="<?= base_url('') ?>asset/img/login.png" class="img-fluid">
                    </div>
                    <div class="col-sm-6 p-0">
                        <div class="card">
                            <div class="card-header">
                                <div class="sub-title">
                                    Doorprize Point
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="" method="post">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ti-email"></i></span>
                                        </div>
                                        <input name="email" type="text" class="form-control input-login <?= form_error('email') == true ? 'is-invalid' : null ?>" placeholder="Your Email">
                                        <?= form_error('email') ?>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ti-lock"></i></span>
                                        </div>
                                        <input name="password" type="password" class="form-control input-login <?= form_error('password') == true ? 'is-invalid' : null ?>" placeholder="Password">
                                        <?= form_error('password') ?>
                                    </div>
                                    <button type="submit" class="btn btn-primary float-right">Login</button>
                                </form>
                                <!-- <div class="form-group">
                                    <label><a href="">New member?</a></label>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-4 text-center">
                    <small>Login Doorprize point exchange</small>
                </div>
            </div>

        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <!-- swiper js -->
    <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
</body>

</html>