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
                                <i class="iconly-boldShow"></i>
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
                                Tahun 2022
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">2022</a>
                                <a class="dropdown-item" href="#">2021</a>
                                <a class="dropdown-item" href="#">2020</a>
                            </div>
                        </div>
                    </div>
                    <div id="chart-profile-visit"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-xl-4">
            <div class="card">
                <div class="card-header">
                    <h4>Profile Visit</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <svg class="bi text-primary" width="32" height="32" fill="blue" style="width:10px">
                                    <use xlink:href="assets/vendors/bootstrap-icons/bootstrap-icons.svg#circle-fill" />
                                </svg>
                                <h5 class="mb-0 ms-3">Europe</h5>
                            </div>
                        </div>
                        <div class="col-6">
                            <h5 class="mb-0">862</h5>
                        </div>
                        <div class="col-12">
                            <div id="chart-europe"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <svg class="bi text-success" width="32" height="32" fill="blue" style="width:10px">
                                    <use xlink:href="assets/vendors/bootstrap-icons/bootstrap-icons.svg#circle-fill" />
                                </svg>
                                <h5 class="mb-0 ms-3">America</h5>
                            </div>
                        </div>
                        <div class="col-6">
                            <h5 class="mb-0">375</h5>
                        </div>
                        <div class="col-12">
                            <div id="chart-america"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <svg class="bi text-danger" width="32" height="32" fill="blue" style="width:10px">
                                    <use xlink:href="assets/vendors/bootstrap-icons/bootstrap-icons.svg#circle-fill" />
                                </svg>
                                <h5 class="mb-0 ms-3">Indonesia</h5>
                            </div>
                        </div>
                        <div class="col-6">
                            <h5 class="mb-0">1025</h5>
                        </div>
                        <div class="col-12">
                            <div id="chart-indonesia"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-8">
            <div class="card">
                <div class="card-header">
                    <h4>Latest Comments</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-lg">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Comment</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="col-3">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-md">
                                                <img src="assets/images/faces/5.jpg">
                                            </div>
                                            <p class="font-bold ms-3 mb-0">Si Cantik</p>
                                        </div>
                                    </td>
                                    <td class="col-auto">
                                        <p class=" mb-0">Congratulations on your graduation!</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-3">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-md">
                                                <img src="assets/images/faces/2.jpg">
                                            </div>
                                            <p class="font-bold ms-3 mb-0">Si Ganteng</p>
                                        </div>
                                    </td>
                                    <td class="col-auto">
                                        <p class=" mb-0">Wow amazing design! Can you make another tutorial for
                                            this design?</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
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