<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Create New Doorprize</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Create</h4>
                        <div class="text-right ml-auto">
                            <a href="<?= base_url('doorprize/index') ?>" class="btn btn-warning btn-flat m-2"><i class="fas fa-arrow-left"></i>Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <form action="" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Doorprize Name</label>
                                            <input value="<?= set_value('name') ?>" type="text" name="name" class="form-control <?= form_error('name') == true ? 'is-invalid' : null ?>">
                                            <?= form_error('name') ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="point">Point</label>
                                            <input value="<?= set_value('point') ?>" type="text" class="form-control <?= form_error('point') == true ? 'is-invalid' : null ?>" name="point">
                                            <?= form_error('point') ?>
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
                            <small>List product for year 2020</small>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>