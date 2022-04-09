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
                    <th>Keterangan</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($transactions as $k=>$v) {
                    ?>
                    <tr>
                        <td><?= $v->created_at ?></td>
                        <td><?= $v->nama_outlet ?></td>
                        <td><?= ($v->count < 0) ? "<span class=\"badge bg-danger\">STOK KELUAR</span>":"<span class=\"badge bg-success\">STOK MASUK</span>" ?></span></td>
                        <td><?= $v->count ?></td>
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
    
</script>
<?= $this->endSection() ?>