<?= $this->extend("layout/main") ?>
<?= $this->section("content") ?>
<div class="card">
    <div class="card-header">
        Edit User
    </div>
    <div class="card-body">
        <form action="<?= base_url("/users/edit/".$user->id) ?>" method="POST">
            <div class="form-group">
                <label for="basicInput">Nama</label>
                <input type="text" value="<?= $user->username ?>" name="username" class="form-control" id="basicInput" placeholder="Nama User">
            </div>
            <div class="form-group">
                <label for="basicInput2">Ubah Password</label>
                <input type="password" name="password" class="form-control" id="basicInput2" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="basicInput3">Konfirmasi Password</label>
                <input type="password" name="confirmation_password" class="form-control" id="basicInput3" placeholder="Konfirmasi Password">
            </div>
            <fieldset class="form-group">
                <label for="basicSelect">Role</label>
                <select name="role" class="form-select" id="basicSelect" <?= ($session->get("user_id") == $user->id) ? "disabled":"" ?>>
                    <option value="sales" <?= ($user->role == "sales") ? "selected":"" ?>>Sales</option>
                    <option value="admin" <?= ($user->role == "admin") ? "selected":"" ?>>Admin</option>
                    <option value="owner" <?= ($user->role == "owner") ? "selected":"" ?>>Owner</option>
                </select>
            </fieldset>
            <button class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
<?= $this->section("footer") ?>
<?= $this->endSection() ?>