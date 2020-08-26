<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Update Transaction</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Update</h4>
                        <div class="text-right ml-auto">
                            <a href="<?= base_url('transaction/history') ?>" class="btn btn-warning btn-flat m-2"><i class="fas fa-arrow-left"></i>Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <form action="" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <select name="name" id="name" class="form-control <?= form_error('name') == true ? 'is-invalid' : null ?>">
                                                <?php foreach ($users as $user) : ?>
                                                    <option <?= $transaction->user_id == $user->id ? 'selected' : null ?> value="<?= $this->input->post('name') ?? $user->id ?>"><?= $user->name ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <?= form_error('name') ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="officer">Officer</label>
                                            <select name="officer" id="officer" class="form-control <?= form_error('officer') == true ? 'is-invalid' : null ?>">
                                                <?php foreach ($officers as $officer) : ?>
                                                    <option <?= $transaction->officer_id == $officer->id ? 'selected' : null ?> value="<?= $this->input->post('officer') ?? $officer->id ?>"><?= $officer->name ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <?= form_error('officer') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Total pay</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        Rp
                                                    </div>
                                                </div>
                                                <input value="<?= $this->input->post('total_pay') ?? $transaction->total_pay ?>" type="number" name="total_pay" class="form-control currency <?= form_error('total_pay') == true ? 'is-invalid' : null ?>">
                                                <?= form_error('total_pay') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Remaining</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        Rp
                                                    </div>
                                                </div>
                                                <input value="<?= $this->input->post('remaining') ?? $transaction->remaining_money ?>" type="number" name="remaining" class="form-control currency <?= form_error('remaining') == true ? 'is-invalid' : null ?>">
                                                <?= form_error('remaining') ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 ml-auto">
                                        <div class="form-group">
                                            <label>Qty</label>
                                            <input name="qty" value="<?= $this->input->post('qty') ?? $transaction->total_product ?>" type="text" class="form-control">
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
                            <small>Upgrade your transaction</small>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>