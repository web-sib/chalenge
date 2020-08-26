<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Upadate New user</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Upadate</h4>
                        <div class="text-right ml-auto">
                            <a href="<?= base_url('user/index') ?>" class="btn btn-warning btn-flat m-2"><i class="fas fa-arrow-left"></i>Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <form action="" method="post">
                                <input value="<?= $user->email ?>" type="hidden" name="email">
                                <input value="<?= $user->password ?>" type="hidden" name="password">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">user Name</label>
                                            <input value="<?= $this->input->post('name') ?? $user->name ?>" type="text" name="name" class="form-control <?= form_error('name') == true ? 'is-invalid' : null ?>">
                                            <?= form_error('name') ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                         <div class="form-group">
                                            <label for="address">address</label>
                                            <input value="<?= $this->input->post('address') ?? $user->address ?>" type="text" class="form-control <?= form_error('address') == true ? 'is-invalid' : null ?>" name="address">
                                            <?= form_error('address') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <button class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <nav class="d-inline-block">
                            <small>Add user for year <?= date('Y') ?></small>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>