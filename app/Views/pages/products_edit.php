<?= $this->extend("layout/main") ?>
<?= $this->section("content") ?>

<div class="card">
    <div class="card-header">
        Tambah produk
    </div>
    <div class="card-body">
        <form action="<?= base_url("/products/edit/".$id) ?>" method="POST">
            <div class="form-group">
                <label for="basicInput">Edit produk</label>
                <input type="text" name="nama" class="form-control" value="<?= $product->nama ?>" id="basicInput" placeholder="Nama produk">
            </div>
            <button class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
<?= $this->section("footer") ?>
<script>
</script>
<?= $this->endSection() ?>