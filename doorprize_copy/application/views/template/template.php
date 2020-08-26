<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>General Dashboard &mdash; Stisla</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?= base_url('') ?>assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('') ?>assets/modules/fontawesome/css/all.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?= base_url('') ?>assets/modules/jqvmap/dist/jqvmap.min.css">
    <link rel="stylesheet" href="<?= base_url('') ?>assets/modules/weather-icon/css/weather-icons.min.css">
    <link rel="stylesheet" href="<?= base_url('') ?>assets/modules/weather-icon/css/weather-icons-wind.min.css">
    <link rel="stylesheet" href="<?= base_url('') ?>assets/modules/summernote/summernote-bs4.css">

    <!-- data table -->
    <link rel="stylesheet" href="<?= base_url('') ?>assets/DataTables/datatables.min.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url('') ?>assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url('') ?>assets/css/components.css">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
    <style>
        .main-sidebar .sidebar-menu li.active a {
            color: #b12587;
        }

        body:not(.sidebar-mini) .sidebar-style-2 .sidebar-menu>li.active>a:before {
            background-color: #b12587;
        }
    </style>
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div style="background-color: #b12587;" class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                    </ul>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="<?= base_url('') ?>assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">Hi, <?= $this->data_session->get_session()->name; ?></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                          <!--   <a href="features-profile.html" class="dropdown-item has-icon">
                                <i class="far fa-user"></i> Profile
                            </a>
                            <a href="features-settings.html" class="dropdown-item has-icon">
                                <i class="fas fa-cog"></i> Settings
                            </a> -->
                            <div class="dropdown-divider"></div>
                            <a href="<?= base_url('admin/logout') ?>" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="index.html">ShopDoor</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="index.html">SD</a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Dashboard</li>
                        <li class="<?= $this->uri->segment(1) === "admin" || $this->uri->segment(1) === null ? 'active' : null ?>"><a class="nav-link" href="<?= base_url('') ?>"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
                        <li class="menu-header">Management</li>
                        <li class="<?= $this->uri->segment(1) === "product" ? 'active' : null ?>"><a class="nav-link" href="<?= base_url('') ?>product"><i class="fas fa-archive"></i> <span>Product</span></a></li>
                        <li class="<?= $this->uri->segment(1) === "doorprize" ? 'active' : null ?>"><a class="nav-link" href="<?= base_url('') ?>doorprize"><i class="fas fa-gift"></i> <span>Doorprize</span></a></li>
                        <li class="menu-header">Doorprize</li>
                        <li class="<?= $this->uri->segment(1) === "gift" ? 'active' : null ?>"><a href="<?= base_url('') ?>gift" class="nav-link"><i class="fas fa-box-open"></i> <span>Customer gift</span></a></li>
                        <li class="menu-header">Users</li>
                        <li class="<?= $this->uri->segment(2) === "user" ? 'active' : null?>"><a class="nav-link" href="<?= base_url('') ?>user/index"><i class="fas fa-users"></i> <span>Users</span></a></li>
                        <li class="menu-header">Transaction</li>
                        <li class="<?= $this->uri->segment(2) === "create" && $this->uri->segment(1) === "transaction" ? 'active' : null ?>"><a class="nav-link" href="<?= base_url('') ?>transaction/create"><i class="fas fa-shopping-cart"></i> <span>Add transaction</span></a></li>
                        <li class="<?= $this->uri->segment(2) === "history" && $this->uri->segment(1) === "transaction" ? 'active' : null ?>"><a class="nav-link" href="<?= base_url('') ?>transaction/history"><i class="fas fa-history"></i> <span>History Transaction</span></a></li>
                    </ul>
                </aside>
            </div>
            <?= $contents; ?>
            <footer class="main-footer">
                <!-- <div class="footer-left">
                    Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
                </div> -->
                <div class="footer-right">

                </div>
            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="<?= base_url('') ?>assets/modules/jquery.min.js"></script>
    <script src="<?= base_url('') ?>assets/modules/popper.js"></script>
    <script src="<?= base_url('') ?>assets/modules/tooltip.js"></script>
    <script src="<?= base_url('') ?>assets/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url('') ?>assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="<?= base_url('') ?>assets/modules/moment.min.js"></script>
    <script src="<?= base_url('') ?>assets/js/stisla.js"></script>

    <!-- JS Libraies -->
    <script src="<?= base_url('') ?>assets/modules/simple-weather/jquery.simpleWeather.min.js"></script>
    <script src="<?= base_url('') ?>assets/modules/chart.min.js"></script>
    <script src="<?= base_url('') ?>assets/modules/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="<?= base_url('') ?>assets/modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="<?= base_url('') ?>assets/modules/summernote/summernote-bs4.js"></script>
    <script src="<?= base_url('') ?>assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

    <!-- data table -->
    <script src="<?= base_url('') ?>assets/DataTables/datatables.min.js"></script>

    <!-- Page Specific JS File -->
    <script src="<?= base_url('') ?>assets/js/page/index-0.js"></script>

    <!-- Template JS File -->
    <script src="<?= base_url('') ?>assets/js/scripts.js"></script>
    <script src="<?= base_url('') ?>assets/js/custom.js"></script>
    <!-- sweetalert -->
    <script src="<?= base_url('') ?>assets/sweetalert/dist/sweetalert2.all.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#table1').DataTable();

            // delete product
            $(document).on('click', '.delete_product', function() {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You will delete this data!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete!'
                }).then((result) => {
                    if (result.value) {
                        var id = $(this).data('id');
                        $.ajax({
                            url: "<?= base_url('product/delete') ?>",
                            type: "post",
                            data: {
                                id: id
                            },
                            success: function(data) {
                                if (data > 0) {
                                    Swal.fire(
                                        'Success',
                                        'Data deleted',
                                        'success'
                                    ).then((result) => {
                                        if (result.value) {
                                            window.location = "<?= base_url('product/index') ?>"
                                        } else {
                                            window.location = "<?= base_url('product/index') ?>"
                                        }
                                    });
                                } else {
                                    Swal.fire(
                                        'Failed',
                                        'Data Failed to deleted',
                                        'error'
                                    ).then((result) => {
                                        if (result.value) {
                                            window.location = "<?= base_url('product/index') ?>"
                                        } else {
                                            window.location = "<?= base_url('product/index') ?>"
                                        }
                                    });
                                }
                            }
                        })
                    }
                });
            });
            // end delete product
            // delete doorprize
            $(document).on('click', '.delete_doorprize', function() {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You will delete this data!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete!'
                }).then((result) => {
                    if (result.value) {
                        var id = $(this).data('id');
                        $.ajax({
                            url: "<?= base_url('doorprize/delete') ?>",
                            type: "post",
                            data: {
                                id: id
                            },
                            success: function(data) {
                                if (data > 0) {
                                    Swal.fire(
                                        'Success',
                                        'Data deleted',
                                        'success'
                                    ).then((result) => {
                                        if (result.value) {
                                            window.location = "<?= base_url('doorprize/index') ?>"
                                        } else {
                                            window.location = "<?= base_url('doorprize/index') ?>"
                                        }
                                    });
                                } else {
                                    Swal.fire(
                                        'Failed',
                                        'Data Failed to deleted',
                                        'error'
                                    ).then((result) => {
                                        if (result.value) {
                                            window.location = "<?= base_url('doorprize/index') ?>"
                                        } else {
                                            window.location = "<?= base_url('doorprize/index') ?>"
                                        }
                                    });
                                }
                            }
                        })
                    }
                });
            });
            // end delete doorprize
            // delete user
               $(document).on('click', '.delete_user', function() {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You will delete this data!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete!'
                }).then((result) => {
                    if (result.value) {
                        var id = $(this).data('id');
                        $.ajax({
                            url: "<?= base_url('user/delete') ?>",
                            type: "post",
                            data: {
                                id: id
                            },
                            success: function(data) {
                                if (data > 0) {
                                    Swal.fire(
                                        'Success',
                                        'Data deleted',
                                        'success'
                                    ).then((result) => {
                                        if (result.value) {
                                            window.location = "<?= base_url('user/index') ?>"
                                        } else {
                                            window.location = "<?= base_url('user/index') ?>"
                                        }
                                    });
                                } else {
                                    Swal.fire(
                                        'Failed',
                                        'Data Failed to deleted',
                                        'error'
                                    ).then((result) => {
                                        if (result.value) {
                                            window.location = "<?= base_url('user/index') ?>"
                                        } else {
                                            window.location = "<?= base_url('user/index') ?>"
                                        }
                                    });
                                }
                            }
                        })
                    }
                });
            });
            // end delete
            // delete gift
            $(document).on('click', '.delete_gift', function() {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You will delete this data!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete!'
                }).then((result) => {
                    if (result.value) {
                        var id = $(this).data('id');
                        $.ajax({
                            url: "<?= base_url('gift/delete') ?>",
                            type: "post",
                            data: {
                                id: id
                            },
                            success: function(data) {
                                if (data > 0) {
                                    Swal.fire(
                                        'Success',
                                        'Data deleted',
                                        'success'
                                    ).then((result) => {
                                        if (result.value) {
                                            window.location = "<?= base_url('gift/index') ?>"
                                        } else {
                                            window.location = "<?= base_url('gift/index') ?>"
                                        }
                                    });
                                } else {
                                    Swal.fire(
                                        'Failed',
                                        'Data Failed to deleted',
                                        'error'
                                    ).then((result) => {
                                        if (result.value) {
                                            window.location = "<?= base_url('gift/index') ?>"
                                        } else {
                                            window.location = "<?= base_url('gift/index') ?>"
                                        }
                                    });
                                }
                            }
                        })
                    }
                });
            });
            // end delete gift
            // delete transaction
            $(document).on('click', '.delete_transaction', function() {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You will delete this data!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete!'
                }).then((result) => {
                    if (result.value) {
                        var id = $(this).data('id');
                        $.ajax({
                            url: "<?= base_url('transaction/delete') ?>",
                            type: "post",
                            data: {
                                id: id
                            },
                            success: function(data) {
                                if (data > 0) {
                                    Swal.fire(
                                        'Success',
                                        'Data deleted',
                                        'success'
                                    ).then((result) => {
                                        if (result.value) {
                                            window.location = "<?= base_url('transaction/history') ?>"
                                        } else {
                                            window.location = "<?= base_url('transaction/history') ?>"
                                        }
                                    });
                                } else {
                                    Swal.fire(
                                        'Failed',
                                        'Data Failed to deleted',
                                        'error'
                                    ).then((result) => {
                                        if (result.value) {
                                            window.location = "<?= base_url('transaction/history') ?>"
                                        } else {
                                            window.location = "<?= base_url('transaction/history') ?>"
                                        }
                                    });
                                }
                            }
                        })
                    }
                });
            });
            // end delete transaction

            // select the product in modal box
            $('.select').on('click', function() {
                const price = $(this).data('price');
                const id = $(this).data('id');
                const name = $(this).data('name');
                const stock = $(this).data('stock');
                const discount = $(this).data('discount');

                $('#id').val(id);
                $('#price').val(price);
                $('#discount').val(discount);
                $('#name').val(name);
                $('#stock').val(stock);
            });
            // end select product

            // add product to cart
            $('#addProduct').on('click', function() {
                $('#error_name').text('');
                $('#error_qty').text('');
                const id = $('#id').val();

                var price = $('#price').val();
                const stock = $('#stock').val();
                const qty = $('#qty').val();
                const discount = $('#discount').val();
                if (qty == '') {
                    $('#error_qty').text('Qty masih kosong');
                } else {
                    if (stock == '0') {
                        $('#error_name').text('Maaf stock kosong');
                    } else {
                        var MyProduct = id + '_Mystock';
                        var MyProduct2 = document.getElementById(MyProduct).innerHTML;
                        var hasil = MyProduct2 - qty;
                        if (hasil < 0) {
                            $('#qty').val('');
                            $('#error_qty').text('Stock tidak mencukupi');
                            document.getElementById(MyProduct).innerHTML = MyProduct2;
                            return;
                        }
                        document.getElementById(MyProduct).innerHTML = hasil;

                        if (discount != 0) {
                            var hitung_discount = discount * price / 100;
                        } else {
                            var hitung_discount = 0;
                        }

                        if ($('#total_while').text() == '0') {
                            var price_baru = Number(qty) * (price - hitung_discount);
                            price_baru = rubah(price_baru);
                            $('#allQty').val(qty);
                            $('#total_fee').val(price_baru);
                            $('#total_while').text(price_baru);
                        } else {
                            const char = String(id) + "_sp";
                            const allQty = Number($('#allQty').val()) + Number(qty);
                            $('#allQty').val(allQty);
                            if (document.getElementById(char) != null) {
                                var char_ = document.getElementById(char).innerHTML;
                                char_ = replace_angka(char_);
                                const total = Number(qty) * (Number(price) - hitung_discount);
                                var total_ = total + Number(char_);
                                total_ = rubah(total_);

                                document.getElementById(char).innerHTML = total_;
                            }

                            var total_fee = replace_angka($('#total_fee').val());
                            var total_while = replace_angka($('#total_while').text());

                            // replace
                            total_fee = Number(total_fee) - hitung_discount;
                            total_while = Number(total_while) - hitung_discount;

                            // hitung price kali qty
                            const kali = Number(qty) * Number(price);
                            // setelah di jumlah
                            var total_fee_ = total_fee + Number(kali);
                            var total_while_ = total_while + Number(kali);


                            // rubah
                            total_fee_ = rubah(total_fee_);
                            total_while_ = rubah(total_while_);

                            $('#total_fee').val(total_fee_);
                            $('#total_while').text(total_while_);


                        }

                        // there is data in the table
                        $.ajax({
                            url: "<?= base_url('transaction/contents/'); ?>",
                            dataType: 'json',
                            type: 'get',
                            data: {
                                id: id
                            },
                            success: function(data) {
                                const id_ = document.getElementById(data.id);
                                if (id_ != null) {
                                    var value = id_.innerHTML;
                                    const isi = Number(value);
                                    const isi2 = Number(qty);
                                    const val = isi + isi2
                                    document.getElementById(data.id).innerHTML = val;
                                } else {
                                    let str = price;
                                    let outStr = str.replace(/[^\w\s]/gi, '');
                                    var total_rupiah = Number(qty) * (Number(outStr) - hitung_discount);

                                    $('.tabel').append(
                                        '<tr class="items" data-bar="' + data.id + '" data-name="' + name + '" id="' + data.id + '_tr"><td>' + data.name + '</><td id="' + data.id + '_price">' + rubah(data.price) + '</td><td id=' + data.id + '>' + qty + '</td><td id="' + data.id + '_discount">' + data.discount + ' <span>%</span></td><td id="' + data.id + '_sp">' + rubah(total_rupiah) + '</td><td><a class="delete_data text-light mr-2 btn btn-danger btn-sm" data-id="' + data.id + '" data-id_trash="' + data.id + '_tr"><i class="fas fa-trash"></i> Delete</a></td></tr>'
                                    );
                                }
                            }

                        });
                        $('#id').val('');
                        $('#price').val('');
                        $('#stock').val('');
                        $('#name').val('');
                        $('#qty').val('');
                        $('#discount').val('');
                    }
                }
            });
            // end add
            // delete data in table
            $('.tabel').on('click', '.delete_data', function() {
                const confrm = confirm('Are you sure?');

                if (confrm == false) {
                    return;
                }

                var total = $(this).data('id');
                var qtyDelete = document.getElementById(total).innerHTML;
                var id = document.getElementById(total + "_tr").innerHTML;
                var cek = Number(document.getElementById(total).innerHTML);
                var allQty = $('#allQty').val();
                allQty = Number(allQty) - Number(document.getElementById(total).innerHTML);
                if (allQty == 0) {
                    allQty = '';
                }


                // restore stock
                var MyProduct = total + '_Mystock';
                var MyProduct2 = document.getElementById(MyProduct).innerHTML;
                var stockLama = document.getElementById(total).innerHTML
                document.getElementById(MyProduct).innerHTML = Number(MyProduct2) + Number(stockLama);

                $('#allQty').val(allQty);
                total = total + "_sp";

                var total_awal = document.getElementById(total).innerHTML;
                total_awal = Number(replace_angka(total_awal));

                var total_fee = Number(replace_angka($('#total_fee').val()));
                var total_while = Number(replace_angka($('#total_while').text()));

                total_while = total_while - total_awal;
                total_fee = total_fee - total_awal;

                $('#total_while').text(rubah(total_while));
                $('#total_fee').val(rubah(total_fee));

                const tr = $(this).data('id_trash');
                document.getElementById(tr).remove();
            });

            // end delete
            // cash on keyup
            $('#cash').focusout(function() {
                if ($(this).val() == '') {
                    $(this).val('0');
                }
            });
            $('#cash').focusin(function() {
                if ($(this).val() == 0) {
                    $(this).val('');
                }
            });
            $('#cash').keyup(function() {
                if ($(this).val() == 0) {
                    $(this).val('');
                }
                $('#message').text('');
                const rupiah = formatRupiah($(this).val());
                $(this).val(rupiah);
                var cash = Number(replace_angka($(this).val()));
                var total = Number(replace_angka($('#total_fee').val()));

                if (cash != 0) {
                    var remaining = total - cash;

                    if (remaining == 0) {
                        remaining = remaining * -1;
                        const message = $('#message').text('');
                    } else if (remaining > 0) {
                        remaining = 0;
                        const message = $('#message').text('less money');
                    } else {
                        remaining = remaining * -1;
                    }

                    remaining = rubah(remaining);

                    $('#remaining').val(remaining);
                } else {
                    $('#remaining').val('0');
                }
            });

            // end cash
            // pay bills
            $('#pay').on('click', function() {
                var officer = $('#officer').val();
                // var discountCek = $('#discount').val();
                var totalCek = $('#total_fee').val();
                var uangCek = $('#cash').val();
                var dateCek = $('#date').val();
                var classCek = document.getElementsByClassName('items')[0];
                var customer = $('#customer').val();
                // untuk mengambil jumlah stock
                var iniclass = document.querySelectorAll('.items');
                var i;
                var array = [];
                // var array1 = [];
                var array2 = [];
                // var array3 = [];
                for (i = 0; i < iniclass.length; i++) {
                    array.push(iniclass[i].getAttribute('data-bar'));
                    // array1.push(iniclass[i].getAttribute('data-item'));
                }
                for (i = 0; i < array.length; i++) {
                    array2.push(document.getElementById(array[i]).innerHTML);
                }
                // end

                if (officer == '' || totalCek == '' || uangCek == '0' || dateCek == '' || classCek == null || customer == '') {
                    if (classCek == null) {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Oops...',
                            text: 'Please choose an items!',
                            showConfirmButton: true,
                        }).then((result) => {
                            if (result.value) {
                                return;
                            } else {
                                return;
                            }
                        });
                    } else if (uangCek == '0') {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Oops...',
                            text: 'Please insert money!',
                            showConfirmButton: true,
                        }).then((result) => {
                            if (result.value) {
                                return;
                            } else {
                                return;
                            }
                        });
                    } else if (customer == '') {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Oops...',
                            text: 'Please choose customer!',
                            showConfirmButton: true,

                        }).then((result) => {
                            if (result.value) {
                                return;
                            } else {
                                return;
                            }
                        });
                    } else {
                        Swal.fire({
                            icon: 'warnig',
                            title: 'Oops...',
                            text: 'Please complete form!',
                            showConfirmButton: true,
                        }).then((result) => {
                            if (result.value) {
                                return;
                            } else {
                                return;
                            }
                        })
                    }
                } else {
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You will make a transaction!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Go transaction!'
                    }).then((result) => {
                        if (result.value) {
                            $.ajax({
                                url: "<?= base_url('transaction/minStock') ?>",
                                type: "GET",
                                data: {
                                    id: array,
                                    qty: array2
                                },
                                success: function(minus) {
                                    $.ajax({
                                        url: "<?= base_url('transaction/store') ?>",
                                        dataType: "text",
                                        type: "GET",
                                        data: {
                                            invoice: $('#invoice').text(),
                                            customer_id: $('#customer').val(),
                                            officer_id: $('#officer').val(),
                                            total: $('#total_fee').val(),
                                            money: $('#cash').val(),
                                            remaining: $('#remaining').val(),
                                            date: $('#date').val(),
                                            total_product: $('#allQty').val()
                                        },
                                        success: function(data) {
                                            Swal.fire({
                                                position: 'top-end',
                                                icon: 'success',
                                                title: 'Successfull transaction',
                                                showConfirmButton: true,
                                            }).then((result) => {
                                                if (result.value) {
                                                    window.location.href = "<?= base_url('transaction/create') ?>";
                                                    // window.location = "http://localhost/sib-pos/sale/cetakStruk/" + $('#invoice').text() + "/" + $('#customer').val();
                                                    $('#customer').val('');
                                                    $('#cash').val('0');
                                                    $('#total_fee').val('0');
                                                } else {
                                                    window.location.href = "<?= base_url('transaction/create') ?>";
                                                    // window.location = "http://localhost/sib-pos/sale/cetakStruk/" + $('#invoice').text() + "/" + $('#customer').val();
                                                    $('#customer').val('');
                                                    $('#cash').val('0');
                                                    $('#total_fee').val('0');
                                                }
                                            });
                                        }
                                    });
                                }
                            });
                        }
                    })
                }
            });
            // end pay
            // manipulasi string
            function formatRupiah(angka, prefix) {
                var number_string = angka.replace(/[^,\d]/g, '').toString(),
                    split = number_string.split(','),
                    sisa = split[0].length % 3,
                    rupiah = split[0].substr(0, sisa),
                    ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                // tambahkan titik jika yang di input sudah menjadi angka satuan ribuan
                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }

                rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
            }

            function rubah(angka) {
                var number_string = angka.toString(),
                    sisa = number_string.length % 3,
                    rupiah = number_string.substr(0, sisa),
                    ribuan = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                return rupiah;
            }

            function replace_angka(angka) {
                let str = angka;
                let outStr = str.replace(/[^\w\s]/gi, '');

                return outStr;
            }

            /* Fungsi formatRupiah */
            function formatRupiah(angka, prefix) {
                var number_string = angka.replace(/[^,\d]/g, '').toString(),
                    split = number_string.split(','),
                    sisa = split[0].length % 3,
                    rupiah = split[0].substr(0, sisa),
                    ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                // tambahkan titik jika yang di input sudah menjadi angka ribuan
                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }

                rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
            }
            // end manipulasi
        })
    </script>
</body>

</html>