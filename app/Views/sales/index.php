<?= $this->extend("layout/main") ?>
<?= $this->section("content") ?>
<div class="">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Outlets
                </div>
                <div class="card-body">
                    <a href="<?= base_url("/outlets/new") ?>" class="btn btn-primary mb-4">Tambah Outlet</a>
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>Nama Outlet</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($outlets as $k=>$v) {
                                ?>
                                <tr>
                                    <td><?= $v->nama ?></td>
                                    <td><?= $v->alamat ?></td>
                                    <td>
                                        <button id="delete_<?= $v->id ?>" class="btn btn-danger">Delete</button>
                                        <a href="<?= base_url("/outlets/modify/".$v->id) ?>"class="btn btn-warning">Edit</a>
                                        <a href="<?= base_url("/outlets/manage/".$v->id) ?>"class="btn btn-primary">Kelola</a>
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
<?= $this->endSection() ?>
<?= $this->section("footer") ?>
<script>
    let table1 = document.querySelector('#table1');
    let dataTable = new simpleDatatables.DataTable(table1);
    <?php
    foreach ($outlets as $k => $v) {
    ?>
        document.getElementById("delete_<?= $v->id ?>").addEventListener("click", async () => {
            let result = await Swal.fire({
                title: 'Hapus outlet <?= $v->nama ?>?',
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
                window.location.href = "<?= base_url("/outlets/delete/".$v->id) ?>"
            }
        })
    <?php
    }
    ?>
</script>
<?= $this->endSection() ?>