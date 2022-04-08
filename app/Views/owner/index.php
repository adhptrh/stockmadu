<?= $this->extend("layout/main") ?>
<?= $this->section("content") ?>
<div class="">
    <div class="row">
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-3 py-4-5">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="stats-icon purple">
                                <i class="mb-3 me-2 bi bi-shop-window"></i>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h6 class="text-muted font-semibold">Total Outlet</h6>
                            <h6 class="font-extrabold mb-0"><?= $outletCount ?></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-3 py-4-5">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="stats-icon blue">
                                <i class="iconly-boldProfile"></i>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h6 class="text-muted font-semibold">Total Sales</h6>
                            <h6 class="font-extrabold mb-0"><?= $salesCount ?></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-3 py-4-5">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="stats-icon blue">
                                <i class="mb-2 me-2 bi bi-minecart-loaded"></i>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h6 class="text-muted font-semibold">Total Product</h6>
                            <h6 class="font-extrabold mb-0"><?= $productCount ?></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon green">
                                        <i class="iconly-boldAdd-User"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Following</h6>
                                    <h6 class="font-extrabold mb-0">80.000</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon red">
                                        <i class="iconly-boldBookmark"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Saved Post</h6>
                                    <h6 class="font-extrabold mb-0">112</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="btn-group mb-4">
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle me-1" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Tahun <?= $year ?>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <?php
                                for ($i = date("Y"); $i > 2020; $i--) {
                                ?>
                                    <a class="dropdown-item" href="?year=<?= $i ?>"><?= $i ?></a>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div id="chart-profile-visit"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Data Jual Outlet Keseluruhan
                </div>
                <div class="card-body">
                    <small class="fst-italic text-danger">Tekan nama kolom untuk merubah urutan</small>
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>Nama Outlet</th>
                                <th>Nama Sales</th>
                                <?php 
                                foreach ($products as $k=>$v) {
                                    echo "<th>".$v->nama."</th>";
                                }
                                ?>
                                <th>Total Terjual</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($outletsData as $k=>$v) {
                                ?>
                                <tr>
                                    <td><?= $v["nama_outlet"] ?></td>
                                    <td><?= $v["nama_user"] ?></td>
                                    <?php
                                    foreach ($outletsData[$k]["products"] as $kk=>$vv) {
                                        ?>
                                        <td><?= $vv["total"] ?></td>
                                        <?php
                                    }
                                    ?>
                                    <td><?= $v["total"] ?></td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Stock Outlet
                </div>
                <div class="card-body">
                    <small class="fst-italic text-danger">Tekan nama kolom untuk merubah urutan</small>
                    <table class="table table-striped" id="table2">
                        <thead>
                            <tr>
                                <th>Nama Outlet</th>
                                <?php 
                                foreach ($products as $k=>$v) {
                                    echo "<th>Stock ".$v->nama."</th>";
                                }
                                ?>
                                <th>Total Stock</th>
                                <th style="min-width:150px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($outletsData as $k=>$v) {
                                ?>
                                <tr>
                                    <td><?= $v["nama_outlet"] ?></td>
                                    <?php
                                    foreach ($outletsData[$k]["stocks"] as $kk=>$vv) {
                                        ?>
                                        <td><?= $vv["total"] ?></td>
                                        <?php
                                    }
                                    ?>
                                    <td><?= $v["total_stocks"] ?></td>
                                    <td>
                                        <a href="<?= base_url("/outlets/manage/".$v["id"]) ?>" class="btn btn-primary">Kelola Outlet</a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <div class="col-12 col-lg-3">
            <div class="card">
                <div class="card-body py-4 px-5">
                    <div class="d-flex align-items-center">
                        <div class="avatar avatar-xl">
                            <img src="assets/images/faces/1.jpg" alt="Face 1">
                        </div>
                        <div class="ms-3 name">
                            <h5 class="font-bold">John Duck</h5>
                            <h6 class="text-muted mb-0">@johnducky</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4>Recent Messages</h4>
                </div>
                <div class="card-content pb-4">
                    <div class="recent-message d-flex px-4 py-3">
                        <div class="avatar avatar-lg">
                            <img src="assets/images/faces/4.jpg">
                        </div>
                        <div class="name ms-4">
                            <h5 class="mb-1">Hank Schrader</h5>
                            <h6 class="text-muted mb-0">@johnducky</h6>
                        </div>
                    </div>
                    <div class="recent-message d-flex px-4 py-3">
                        <div class="avatar avatar-lg">
                            <img src="assets/images/faces/5.jpg">
                        </div>
                        <div class="name ms-4">
                            <h5 class="mb-1">Dean Winchester</h5>
                            <h6 class="text-muted mb-0">@imdean</h6>
                        </div>
                    </div>
                    <div class="recent-message d-flex px-4 py-3">
                        <div class="avatar avatar-lg">
                            <img src="assets/images/faces/1.jpg">
                        </div>
                        <div class="name ms-4">
                            <h5 class="mb-1">John Dodol</h5>
                            <h6 class="text-muted mb-0">@dodoljohn</h6>
                        </div>
                    </div>
                    <div class="px-4">
                        <button class='btn btn-block btn-xl btn-light-primary font-bold mt-3'>Start
                            Conversation</button>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4>Visitors Profile</h4>
                </div>
                <div class="card-body">
                    <div id="chart-visitors-profile"></div>
                </div>
            </div>
        </div> -->

<?= $this->endSection() ?>
<?= $this->section("footer") ?>
<script>
    let table1 = document.querySelector('#table1');
    let dataTable = new simpleDatatables.DataTable(table1);
    let dataTable2 = new simpleDatatables.DataTable(document.querySelector('#table2'));

    function getColumnIndexByName(dt, name) {
        for (i=0;i<dt.headings.length;i++) {
            if (dt.headings[i].innerText.toLowerCase() == name.toLowerCase()) {
                return i
            }
        }
        return -1
    }

    dataTable.columns().sort(getColumnIndexByName(dataTable,"total terjual"),"desc")
    dataTable2.columns().sort(getColumnIndexByName(dataTable2,"total stock"),"desc")

    var optionswsw = {
        series: [<?php
                    foreach ($transactionData as $k => $v) {

                        echo '{
                            "name":"' . $v["product_name"] . '",
                            "data":[
                                ' . $v["transaction"]["jan"]["total_sales"] . ',
                                ' . $v["transaction"]["feb"]["total_sales"] . ',
                                ' . $v["transaction"]["mar"]["total_sales"] . ',
                                ' . $v["transaction"]["apr"]["total_sales"] . ',
                                ' . $v["transaction"]["may"]["total_sales"] . ',
                                ' . $v["transaction"]["jun"]["total_sales"] . ',
                                ' . $v["transaction"]["jul"]["total_sales"] . ',
                                ' . $v["transaction"]["aug"]["total_sales"] . ',
                                ' . $v["transaction"]["sep"]["total_sales"] . ',
                                ' . $v["transaction"]["oct"]["total_sales"] . ',
                                ' . $v["transaction"]["nov"]["total_sales"] . ',
                                ' . $v["transaction"]["dec"]["total_sales"] . ']
                        },';
                    }
                    ?>],
        chart: {
            height: 350,
            type: 'line',
            zoom: {
                enabled: false
            }
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'straight'
        },
        title: {
            text: 'Product Terjual per Bulan',
            align: 'left'
        },
        grid: {
            row: {
                colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                opacity: 0.5
            },
        },
        xaxis: {
            categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        },
        yaxis: [{
            labels: {
                formatter: function(val) {
                    return val.toFixed(0);
                }
            }
        }]
    };
    var chartProfileVisit = new ApexCharts(document.querySelector("#chart-profile-visit"), optionswsw);
    chartProfileVisit.render()
</script>
<?= $this->endSection() ?>