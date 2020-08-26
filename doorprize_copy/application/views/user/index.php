<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>List user</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?= $this->session->flashdata('message'); ?>
                <div class="card">
                    <div class="card-header">
                        <h4>List user</h4>
                        <div class="text-right ml-auto">
                            <a href="<?= base_url('user/create') ?>" class="btn btn-primary btn-flat m-2"><i class="fas fa-plus"></i>Create</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table1" class="table table-bordered table-md">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($results as $result) :  ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $result->name ?></td>
                                            <td><?= $result->email ?></td>
                                            <td><?= $result->address ?></td>
                                            <td>
                                                <a href="<?= base_url('user/show/' . $result->id) ?>" class="btn btn-secondary"><i class="fas fa-eye"></i> Detail</a>
                                                <a data-id="<?= $result->id ?>" class="text-white btn btn-danger delete_user"><i class="fas fa-trash"></i> Delete</a>
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
                            <small>List user for year <?= date('Y') ?></small>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>