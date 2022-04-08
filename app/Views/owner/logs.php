<?= $this->extend("layout/main") ?>
<?= $this->section("content") ?>
<div class="card">
    <div class="card-header">
        Logs
    </div>
    <div class="card-body">
        <table class="table table-striped" id="table1">
            <thead>
                <tr>
                    <th>Jam</th>
                    <th>Nama Outlet</th>
                    <th>Stok Keluar</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>
<?= $this->section("footer") ?>
<script>
    
    let table1 = document.querySelector('#table1');
    let dataTable = new simpleDatatables.DataTable(table1);
    
</script>
<?= $this->endSection() ?>