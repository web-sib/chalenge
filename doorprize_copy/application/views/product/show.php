<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Create New Product</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Create</h4>
                        <div class="text-right ml-auto">
                            <a href="<?= base_url('product/index') ?>" class="btn btn-warning btn-flat m-2"><i class="fas fa-arrow-left"></i>Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <form action="" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Product Name</label>
                                            <input type="text" value="<?= $this->input->post('name') ?? $product->name ?>" name="name" class="form-control <?= form_error('name') == true ? 'is-invalid' : null ?>">
                                            <?= form_error('name') ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="stock">Stock</label>
                                            <input type="text" value="<?= $this->input->post('stock') ?? $product->stock ?>" class="form-control <?= form_error('stock') == true ? 'is-invalid' : null ?>" name="stock">
                                            <?= form_error('stock') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Price</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        Rp
                                                    </div>
                                                </div>
                                                <input value="<?= $this->input->post('price') ?? $product->price ?>" type="number" name="price" class="form-control currency <?= form_error('price') == true ? 'is-invalid' : null ?>">
                                                <?= form_error('price') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Purchase Price</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        Rp
                                                    </div>
                                                </div>
                                                <input value="<?= $this->input->post('purchase') ?? $product->purchase_price ?>" type="number" name="purchase" class="form-control currency <?= form_error('purchase') == true ? 'is-invalid' : null ?>">
                                                <?= form_error('purchase') ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 ml-auto">
                                        <div class="form-group">
                                            <label>Discount</label>
                                            <div class="input-group colorpickerinput">
                                                <input name="discount" value="<?= $this->input->post('discount') ?? $product->discount ?>" type="text" class="form-control">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        %
                                                    </div>
                                                </div>
                                            </div>
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
                            <small>Upgrade your product</small>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>