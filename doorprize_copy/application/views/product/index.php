<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>List Product</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?= $this->session->flashdata('message'); ?>
                <div class="card">
                    <div class="card-header">
                        <h4>List Product</h4>
                        <div class="text-right ml-auto">
                            <a href="<?= base_url('product/create') ?>" class="btn btn-primary btn-flat m-2"><i class="fas fa-plus"></i>Create</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table1" class="table table-bordered table-md">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Stock</th>
                                        <th>Price</th>
                                        <th>Purchase price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($results as $result) :  ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $result->name ?></td>
                                            <td><?= $result->stock ?></td>
                                            <td><?= rupiah($result->price) ?></td>
                                            <td><?= $result->purchase_price ?></td>
                                            <td>
                                                <a href="<?= base_url('product/show/' . $result->id) ?>" class="btn btn-secondary"><i class="fas fa-eye"></i> Detail</a>
                                                <a data-id="<?= $result->id ?>" class="text-white btn btn-danger delete_product"><i class="fas fa-trash"></i> Delete</a>
                                            </td>
                                        </tr>
                                        <?php $no++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
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