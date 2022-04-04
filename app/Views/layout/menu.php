
<li class="sidebar-title">Menu</li>

<li class="sidebar-item <?= (current_url() == base_url("/index.php")."/") ? "active":""; ?> ">
    <a href="<?= base_url("/") ?>" class='sidebar-link'>
        <i class="bi bi-grid-fill"></i>
        <span>Dashboard</span>
    </a>
</li>

<li class="sidebar-item <?= (current_url() == base_url("/index.php")."/sales") ? "active":""; ?>">
    <a href="<?= base_url("/sales") ?>" class='sidebar-link'>
        <i class="bi bi-people"></i>
        <span>Sales</span>
    </a>
</li>