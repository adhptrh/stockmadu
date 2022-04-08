<?= $this->extend("layout/main") ?>
<?= $this->section("content") ?>
<div class="card shadow-sm">
    <div class="card-header">
        Kelola Outlet
    </div>
    <div class="card-body">
        <div class="mb-3">
            <div class="row">
                <div class="col-8">
                    <div class="form-group">
                        <label for="basicInput">Nama</label>
                        <input type="text" name="nama" value="<?= $outlet->nama ?>" class="form-control" id="basicInput" placeholder="Nama" disabled>
                    </div>
                    <div class="form-group">
                        <label for="basicInput">Alamat</label>
                        <input type="text" name="alamat" value="<?= $outlet->alamat ?>" class="form-control" id="basicInput" placeholder="Alamat" disabled>
                    </div>
                    <div class="form-group">
                        <label for="basicInput">Latitude</label>
                        <input id="lat" type="text" name="latitude" value="<?= $outlet->latitude ?>" class="form-control" id="basicInput" placeholder="Latitude" disabled>
                    </div>
                    <div class="form-group">
                        <label for="basicInput">Longitude</label>
                        <input id="long" type="text" name="longitude" value="<?= $outlet->longitude ?>" class="form-control" id="basicInput" placeholder="Longitude" disabled>
                    </div>
                    <div class="form-group">
                        <iframe width="300" height="170" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=<?= $outlet->latitude ?>,<?= $outlet->longitude ?>&hl=id&z=15&amp;output=embed">
                        </iframe>
                    </div>
                    <a href="<?= base_url("/outlets/modify/" . $outlet->id) ?>" class="btn btn-primary">Edit</a>
                </div>
                <div class="col">
                    <img class="w-100 rounded shadow-md" src="<?= base_url("/uploads/" . $outlet->photo) ?>">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <div class="d-flex p-0 mb-4">
    
    <div class="bg-white rounded-3 shadow-sm border-start border-5 border-primary p-4 me-5" style="width:200px";>
        <div class="fw-bold">
            Stock madu1
        </div>
        <div>
            100
        </div>
    </div>
    
    <div class="bg-white rounded-3 shadow-sm border-start border-5 border-primary p-4 me-5" style="width:200px";>
        <div class="fw-bold">
            Stock madu2
        </div>
        <div>
            50
        </div>
    </div>
</div> -->
<div class="card shadow-sm">
    <div class="card-header">
        Stock
    </div>
    <div class="card-body">
        <table class="table table-striped" id="table1">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Jumlah Stok</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($productStocks as $k=>$v) {
                    ?>
                    <tr>
                        <td><?= $v["nama"] ?></td>
                        <td><?= $v["stock"] ?></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-header">
        Tambah Transaksi
    </div>
    <div class="card-body">
        <form action="<?= base_url("/transactions/add/".$outlet->id) ?>" method="POST">
            <div class="form-group">
                <div class="mb-4">
                    <label for="basicInput">Product</label>
                    <select name="product_id" class="form-select" id="basicSelect"> 
                        <?php
                        foreach ($products as $k=>$v) {
                            ?>
                            <option value="<?= $v->id ?>"><?= $v->nama ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="mb-4">
                    <label for="basicInput">Jumlah Stok Keluar</label>
                    <input type="number" name="count" class="form-control" id="basicInput" min="1" value="1">
                </div>
            </div>
            <button  class="btn btn-primary">Tambah Transaksi</button>
        </form>
    </div>
</div>
<div class="card shadow-sm">
    <div class="card-header">
        Transaksi
    </div>
    <div class="card-body">
        <table class="table table-striped" id="table2">
            <thead>
                <tr>
                    <th>Jam</th>
                    <th>Nama Produk</th>
                    <th>Stock Keluar</th>
                </tr>
            </thead>
            <tbody>
                
            <?php
                foreach ($transactions as $k=>$v) {
                    ?>
                    <tr>
                        <td><?= $v->created_at ?></td>
                        <td><?= $v->nama ?></td>
                        <td><?= abs($v->count) ?></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
</div>
<?= $this->endSection() ?>
<?= $this->section("footer") ?>
<script>
    let table1 = document.querySelector('#table1');
    let dataTable = new simpleDatatables.DataTable(table1);
    let dataTable2 = new simpleDatatables.DataTable(document.querySelector('#table2'));
</script>
<?= $this->endSection() ?>