<li class="sidebar-title">Menu</li>

<li class="sidebar-item <?= (current_url() == base_url("/index.php") . "/") ? "active" : ""; ?> ">
    <a href="<?= base_url("/") ?>" class='sidebar-link'>
        <i class="bi bi-grid-fill"></i>
        <span>Dashboard</span>
    </a>
</li>

<?php
if ($user->role != "sales") {
?>
    <li class="sidebar-item <?= (current_url() == base_url("/index.php") . "/users") ? "active" : ""; ?>">
        <a href="<?= base_url("/users") ?>" class='sidebar-link'>
            <i class="bi bi-people"></i>
            <span>Users</span>
        </a>
    </li>

    <li class="sidebar-item <?= (current_url() == base_url("/index.php") . "/products") ? "active" : ""; ?>">
        <a href="<?= base_url("/products") ?>" class='sidebar-link'>
            <i class="bi bi-people"></i>
            <span>Products</span>
        </a>
    </li>

<?php
}
?>

<?php
if ($user->role == "owner" || $user->role == "admin" ) {
?>
<li class="sidebar-item <?= (current_url() == base_url("/index.php") . "/logs") ? "active" : ""; ?>">
    <a href="<?= base_url("/logs") ?>" class='sidebar-link'>
        <i class="bi bi-people"></i>
        <span>Logs</span>
    </a>
</li>

<?php
}
?>
<li class="sidebar-item <?= (current_url() == base_url("/index.php") . "/users/modify/" . session()->get("user_id")) ? "active" : ""; ?>">
    <a href="<?= base_url("/users/modify/" . session()->get("user_id")) ?>" class='sidebar-link'>
        <i class="bi bi-people"></i>
        <span>Setting Akun</span>
    </a>
</li>

<li class="sidebar-item">
    <a href="<?= base_url("/auth/logout") ?>" class='sidebar-link bg-danger text-white'>
        <i class="bi bi-box-arrow-in-left text-white"></i>
        <span>Log Out</span>
    </a>
</li>