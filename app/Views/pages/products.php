<?= $this->extend("layout/main") ?>
<?= $this->section("content") ?>

<div class="card">
    <div class="card-header">
        Tambah produk
    </div>
    <div class="card-body">
        <form action="<?= base_url("/products/add") ?>" method="POST">
            <div class="form-group">
                <label for="basicInput">Nama produk</label>
                <input type="text" name="nama" class="form-control" id="basicInput" placeholder="Nama produk">
            </div>
            <button class="btn btn-primary">Tambah</button>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-header">
        Daftar Produk
    </div>
    <div class="card-body">
        <table class="table table-striped" id="table1">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($products as $k => $v) {
                ?>
                    <tr>
                        <td><?= $v->nama ?></td>
                        <td>
                            <button id="delete_<?= $v->id ?>" href="<?= base_url("/products/delete/" . $v->id) ?>" class="btn btn-danger">Delete</button>
                            <a href="<?= base_url("/products/modify/".$v->id) ?>" class="btn btn-warning">Edit</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>
<?= $this->section("footer") ?>
<script>
    <?php
    foreach ($products as $k => $v) {
    ?>
        document.getElementById("delete_<?= $v->id ?>").addEventListener("click", async () => {
            let result = await Swal.fire({
                title: 'Hapus produk <?= $v->nama ?>?',
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: 'Yes',
                denyButtonText: 'No',
                customClass: {
                    actions: 'my-actions',
                    cancelButton: 'order-1 right-gap',
                    confirmButton: 'order-2',
                    denyButton: 'order-3',
                }
            })
            if (result.isConfirmed) {
                window.location.href = "<?= base_url("/products/delete/".$v->id) ?>"
            }
        })
    <?php
    }
    ?>
</script>
<?= $this->endSection() ?>