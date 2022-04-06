
<li class="sidebar-title">Menu</li>

<li class="sidebar-item <?= (current_url() == base_url("/index.php")."/") ? "active":""; ?> ">
    <a href="<?= base_url("/") ?>" class='sidebar-link'>
        <i class="bi bi-grid-fill"></i>
        <span>Dashboard</span>
    </a>
</li>

<li class="sidebar-item <?= (current_url() == base_url("/index.php")."/users") ? "active":""; ?>">
    <a href="<?= base_url("/users") ?>" class='sidebar-link'>
        <i class="bi bi-people"></i>
        <span>Users</span>
    </a>
</li>

<li class="sidebar-item <?= (current_url() == base_url("/index.php")."/products") ? "active":""; ?>">
    <a href="<?= base_url("/products") ?>" class='sidebar-link'>
        <i class="bi bi-people"></i>
        <span>Products</span>
    </a>
</li>

<li class="sidebar-item <?= (current_url() == base_url("/index.php")."/users/modify/".session()->get("user_id")) ? "active":""; ?>">
    <a href="<?= base_url("/users/modify/".session()->get("user_id")) ?>" class='sidebar-link'>
        <i class="bi bi-people"></i>
        <span>Ubah Password</span>
    </a>
</li>

<li class="sidebar-item">
    <a href="<?= base_url("/auth/logout") ?>" class='sidebar-link bg-danger text-white'>
        <i class="bi bi-box-arrow-in-left text-white"></i>
        <span>Log Out</span>
    </a>
</li>