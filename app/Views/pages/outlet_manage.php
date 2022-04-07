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
                        <iframe width="300" height="170" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=<?= $outlet->latitude ?>,<?= $outlet->longitude ?>&hl=es&z=14&amp;output=embed">
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
<div class="d-flex p-0 mb-4">
    
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
</div>
<div class="card shadow-sm">
    <div class="card-header">
        Logs
    </div>
    <div class="card-body">
        
    </div>
</div>
<?= $this->endSection() ?>
<?= $this->section("footer") ?>
<?= $this->endSection() ?>