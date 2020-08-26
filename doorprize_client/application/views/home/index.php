<!-- header -->
<header>
  <nav class="navbar text-white bg-nav navbar-expand-lg navbar-light">
    <div class="container">
      <a class="navbar-brand" href="#">Door<b>Shoop</b></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('home/doorprize') ?>">Other menu</a>
          </li>
        </ul>
        <a href="<?= base_url('home/logout') ?>" class="btn btn-outline-danger rounded-pill btn-sm"><i class="fas fa-sign-out-alt"></i> Logout</a>
        <!--             <form class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form> -->
      </div>
    </div>
  </nav>
</header>
<!-- end header -->

<!-- jumbotron -->
<section class="jumbotron-section">
  <div class="jumbotron text-white jumbotron-color">
    <div class="container">
      <h1 class="display-4">Wellcome!</h1>
      <p class="lead text-white">This is a place to exchange points that you get at <b>DoorShop</b></p>
      <a class="btn btn-danger btn-learn" href="#" role="button">Learn more</a>
    </div>
  </div>
</section>
<!-- end jumbotron -->

<!-- main content -->
<div class="main-content">
  <div class="container">
    <!-- your point -->
    <div class="row justify-content-center">
      <div class="col-5 content-point">
        <img class="avatar" src="<?= base_url('asset/img/avatar.png') ?>" alt="avatar">
        <div class="row text-center mt-3">
          <div class="col-12">
            <h5>YOUR POINT</h5>
          </div>
        </div>
        <div class="row text-center">
          <div class="col-12">
            <h1 class="font-weight-bold"><?= $point['point'] ?></h1>
          </div>
        </div>
      </div>
    </div>
    <!-- end your point -->
    <div class="row mt-5">
      <div class="col-12">
        <h4 class="text-center">Exchange Points</h4>
        <hr style="border: 1px solid black; width: 10%">
      </div>
    </div>
    <!-- doorprize -->
    <div class="row mt-2">
      <!-- Slider main container -->
      <div class="swiper-container">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
          <!-- Slides -->
          <?php foreach ($doorprizes as $doorprize) : ?>
            <div class="swiper-slide col-lg-3 col-6 ml-0 mr-0">
              <div class="card shadow-sm">
                <!-- <img src="<?= base_url('') ?>asset/img/doodle.jpg" class="card-img-top" alt="doorprize"> -->
                <div class="card-body">
                  <h5 class="card-title font-weight-bold"><a href="<?= base_url('home/exchange/' . $doorprize['id']) ?>"><?= $doorprize['name'] ?></a></h5>
                  <span class="card-text">Requires <b><?= point($doorprize['point']); ?></b> Points</span>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
        <!-- If we need pagination -->
        <div class="swiper-pagination"></div>
      </div>
    </div>
    <!-- end doorprize -->
  </div>
</div>
<!-- end main content -->


<div class="row mt-5">
  <div class="col-12">
    <!-- tampil di selain android -->
    <div class="jumbotron jumbotron-fluid grant-prize text-white d-none d-xl-block d-lg-block d-md-block d-sm-block jumbotron-grant">
      <div class="container">
        <h2 class="text-center font-weight-bold mb-3">Grand prize</h2>
        <hr style="border: 1px solid white; width: 10%">
        <div class="row">
          <div class="col-3">
            <img class="img-grant" id="rotasi" width="200pt" src="<?= base_url('asset/img/grant_prize.png') ?>" alt="gp">
          </div>
          <div class="col-9">
            <div class="row">
              <div class="col-12">
                <p class="lead  text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos ea voluptates itaque saepe dolore nisi! Quis magni repellendus facere cupiditate modi laudantium, quos, ipsa, doloribus dolorem beatae omnis molestiae vitae.</p>
              </div>
            </div>
            <div class="row">
              <div class="col-12 g-link">
                <samll><a href="<?= base_url('home/exchange/' . $doorprizeGrand[0]['id']) ?>">Get</a></samll>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="text-dark pt-3 pb-3">
                  <button class="btn btn-success">Requires <?= point($doorprizeGrand[0]['max_point']) ?> Point</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end selain android -->
    <!-- tampil di android -->
    <div class="jumbotron jumbotron-fluid grant-prize text-white d-block d-sm-none">
      <div class="container">
        <h2 class="text-center font-weight-bold mb-3">Grand prize</h2>
        <hr style="border: 1px solid white; width: 10%">
        <div class="row">
          <div class="col-3">
            <img id="rotasi" width="200pt" src="<?= base_url('asset/img/grant_prize.png') ?>" alt="gp">
          </div>
          <div class="col-9 text-description">
            <div class="row">
              <div class="col-12">
                <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos ea voluptates itaque saepe dolore nisi! Quis magni repellendus facere cupiditate modi laudantium, quos, ipsa, doloribus dolorem beatae omnis molestiae vitae.</p>
              </div>
            </div>
            <div class="row">
              <div class="col-12 g-link">
                <samll><a href="">Get</a> | <a href="">Cek</a></samll>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="text-dark pt-3 pb-3">
                  <a href="" class="btn btn-success">Requires 10000 Point</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end android -->
  </div>
</div>
<div class="row">
  <div class="col-12">
    <div class="jumbotron jumbotron-fluid brand-product bg-white">
      <div class="container">
        <h2 class="text-center font-weight-bold mb-3">Product</h2>
        <hr style="border: 1px solid black; width: 10%">
        <div class="row">
          <div class="col-md-7 mb-4">
            <img width="100%" class="image-fluid" src="<?= base_url('asset/img/sauce.jpg') ?>" alt="sauce">
          </div>
          <div class="col-md-5">
            <div class="row">
              <div class="col-12 mb-4">
                <img width="100%" class="image-fluid" src="<?= base_url('asset/img/smartphone.png') ?>" alt="smartphone">
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <img width="100%" class="image-fluid" src="<?= base_url('asset/img/water.jpg') ?>" alt="water">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- footer -->
<footer>
  <div class="text-dark text-center pt-3 pb-3">
    Copyright @2020 Doorshop
  </div>
</footer>
<!-- endfooter -->