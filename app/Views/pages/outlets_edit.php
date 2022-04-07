<?= $this->extend("layout/main") ?>
<?= $this->section("content") ?>
<div class="card">
    <div class="card-header">
        Edit Outlet
    </div>
    <div class="card-body">
        <form action="<?= base_url("/outlets/edit/".$outlet->id) ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="basicInput">Nama</label>
                <input type="text" name="nama" value="<?= $outlet->nama ?>" class="form-control" id="basicInput" placeholder="Nama">
            </div>
            <div class="form-group">
                <label for="basicInput">Alamat</label>
                <input type="text" name="alamat" value="<?= $outlet->alamat ?>" class="form-control" id="basicInput" placeholder="Alamat">
            </div>
            <div class="form-group">
                <label for="basicInput">Latitude</label>
                <input id="lat" type="text" name="latitude" value="<?= $outlet->latitude ?>" class="form-control" id="basicInput" placeholder="Latitude">
            </div>
            <div class="form-group">
                <label for="basicInput">Longitude</label>
                <input id="long" type="text" name="longitude" value="<?= $outlet->longitude ?>" class="form-control" id="basicInput" placeholder="Longitude">
            </div>
            <div class="form-group">
                <div class="mb-3">
                    <label for="formFile" class="form-label">Foto</label>
                    <input class="form-control" name="photo" type="file" id="formFile">
                </div>
            </div>
            <div class="form-group">
                <div class="mb-3" >
                    <img style="max-width:300px;" src="<?= base_url("/uploads/".$outlet->photo) ?>">
                </div>
            </div>
            <button class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
<?= $this->section("footer") ?>
<?= $this->endSection() ?>