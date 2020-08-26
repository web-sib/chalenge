<div id="content">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button type="button" id="sidebarCollapse" class="btn btn-info">
                <i class="fas fa-align-left"></i>
                <span>Toggle sidebar</span>
            </button>
        </div>
    </nav>
    <br><br>
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Invoice</th>
                            <th scope="col">Total product</th>
                            <th scope="col">Total pay</th>
                            <th scope="col">Money</th>
                            <th scope="col">Remaining</th>
                            <th scope="col">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($transactions as $transaction) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $transaction['invoice'] ?></td>
                                <td><?= $transaction['total_product'] ?></td>
                                <td><?= $transaction['total_pay'] ?></td>
                                <td><?= $transaction['money'] ?></td>
                                <td><?= $transaction['remaining_money'] ?></td>
                                <td><?= $transaction['created_at'] ?></td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>