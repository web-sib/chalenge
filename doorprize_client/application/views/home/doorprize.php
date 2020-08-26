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
            <h3 class="text-center">Your Doorprize</h3>
            <hr style="border: 1px solid black; width: 10%">
        </div>
    </div>
    <div class="row">
        <?php foreach ($my_gift as $gift) : ?>
            <div class="col-md-4 col-12 mb-4">
                <div class="shadow-sm card">
                    <div class="card-header bg-success text-white font-weight-bold">Requires <?= point($gift['point']) ?> Point</div>
                    <div class="card-body">
                        <h3 class="text-center"><?= $gift['doorprize_name'] ?></h3>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</div>
</div>