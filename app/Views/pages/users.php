<?= $this->extend("layout/main") ?>
<?= $this->section("content") ?>
<div class="card">
    <div class="card-header">
        Tambah User
    </div>
    <div class="card-body">
        <form action="<?= base_url("/users/add") ?>" method="POST">
            <div class="form-group">
                <label for="basicInput">Nama</label>
                <input type="text" name="username" class="form-control" id="basicInput" placeholder="Nama User">
            </div>
            <div class="form-group">
                <label for="basicInput2">Password</label>
                <input type="password" name="password" class="form-control" id="basicInput2" placeholder="Password">
            </div>
            <fieldset class="form-group">
                <label for="basicSelect">Role</label>
                <select name="role" class="form-select" id="basicSelect">
                    <option value="sales">Sales</option>
                    <option value="admin">Admin</option>
                    <option value="owner">Owner</option>
                </select>
            </fieldset>
            <button class="btn btn-primary">Tambah</button>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-header">
        Daftar User
    </div>
    <div class="card-body">
        <table class="table table-striped" id="table1">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($users as $k=>$v) {
                    ?>
                    <tr>
                        <td><?= $v->username ?></td>
                        <td><?= $v->role ?></td>
                        <td>
                            <button id="delete_<?= $v->id ?>" class="btn btn-danger">Delete</button>
                            <a href="<?= base_url("/users/modify/".$v->id) ?>" class="btn btn-warning">Edit</a>
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
    let table1 = document.querySelector('#table1');
    let dataTable = new simpleDatatables.DataTable(table1);
    <?php
    foreach ($users as $k => $v) {
    ?>
        document.getElementById("delete_<?= $v->id ?>").addEventListener("click", async () => {
            let result = await Swal.fire({
                title: 'Hapus user <?= $v->username ?>?',
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
                window.location.href = "<?= base_url("/users/delete/".$v->id) ?>"
            }
        })
    <?php
    }
    ?>
</script>
<?= $this->endSection() ?>