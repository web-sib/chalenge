<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Create Transaction</h1>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="row p-0">
                            <div class="col-md-4 border">
                                <div class="form-group">
                                    <label for="date">Date</label>
                                    <input type="date" readonly value="<?= date('Y-m-d') ?>" id="date" name="date" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="officer">Officer</label>
                                    <input id="officer" readonly value="1" name="officer" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="customer">Customer</label>
                                    <select name="customer" id="customer" class="form-control">
                                        <option value="">--Pilih--</option>
                                        <?php foreach ($customers as $customer => $data) : ?>
                                            <option value="<?= $data->id ?>"><?= $data->name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 border">
                                <input type="hidden" id="id" name="id">
                                <input type="hidden" id="price" name="price">
                                <input type="hidden" id="stock" name="stock">
                                <input type="hidden" name="discount" id="discount">
                                <div class="form-group">
                                    <div class="col">
                                        <label for="name" class="detail">Name</label>
                                        <div class="input-group">
                                            <input type="text" readonly name="name" class="form-control" id="name" required>
                                            <div class="input-group-prepend">
                                                <span data-toggle="modal" data-target="#selectname" class="input-group-text" id="search"><i class="text-primary fas fa-search"></i></span>
                                            </div>
                                        </div>
                                        <span class="text-red text-monospace" id="error_name"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col">
                                        <label for="qty">Qty</label>
                                        <input id="qty" name="qty" type="number" class="form-control">
                                        <span class="text-red text-monospace" id="error_qty"></span>
                                    </div>
                                </div>
                                <input id="allQty" name="allQty" type="hidden" class="form-control">
                                <div class="form-group text-right">
                                    <div class="col">
                                        <span id="addProduct" class="btn btn-success btn-sm"><i class="fas fa-shopping-cart"></i> Add</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 border">
                                <div class="text-right">
                                    <h4>Invoice<b><span id="invoice"><?= $invoice ?></span></b></h4>
                                    <h1><b><span id="total_while" style="font-size: 30pt">0</span></b></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="row p-0">
                            <div class="table-responsive">
                                <table class="table table-bordered m-0 tabel">
                                    <tr>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Qty</th>
                                        <th>Discount Item</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <form action="">
                                    <div class="form-group row">
                                        <label for="total_bayar" class="col-md-4 col-form-label" style="font-size: 10pt">Total fee</label>
                                        <div class="col-md-8">
                                            <input readonly type="text" class="form-control" name="total_fee" id="total_fee">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="cash" class="col-md-5 col-form-label" style="font-size: 10pt">Uang</label>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" value="0" name="cash" id="cash">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="remaining" class="col-md-5 col-form-label" style="font-size: 10pt">
                                        Remaining pay</label>
                                    <div class="col-md-7">
                                        <input readonly type="text" value="0" class="form-control" name="remaining" id="remaining">
                                        <span style="font-size:10pt" class="text-red text-monospace" id="message"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col mb-3">
                <div class="text-right">
                    <button id="cancel" class="btn btn-warning btn-sm"><i class="fas fa-reply-all"></i> Cancel</button>
                    <button id="pay" class="btn btn-success btn-sm"><i class="fas fa-credit-card"></i> Pay</button>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Modal -->
<div class="modal fade" id="selectname" tabindex="-1" role="dialog" aria-labelledby="selectBarcodeTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="selectBarcodeTitle">product item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Discount</th>
                            <th>Purchase price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $product => $data) :  ?>
                            <tr>
                                <td><?= $data->id; ?></td>
                                <td><?= $data->name; ?></td>
                                <td><?= $data->price; ?></td>
                                <td id="<?= $data->id ?>_Mystock"><?= $data->stock ?></td>
                                <td><?= $data->discount ?></td>
                                <td><?= $data->purchase_price; ?></td>
                                <td>
                                    <button data-discount="<?= $data->discount ?>" data-name="<?= $data->name ?>" data-id="<?= $data->id ?>" data-stock="<?= $data->stock ?>" data-price="<?= $data->price ?>" data-dismiss="modal" class="btn btn-primary btn-xs select"><i class="fas fa-check"></i> select</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>