
<style>
</style>
<nav id="sidebar" class='mx-lt-5 bg-dark' >
		
		<div class="sidebar-list">

				<a href="index.php?page=home" class="nav-item nav-home"><span class='icon-field'><i class="fa fa-home"></i></span> Trang chủ</a>
				<a href="index.php?page=orders" class="nav-item nav-orders"><span class='icon-field'><i class="fa fa-list"></i></span> Đơn hàng</a>
				<a href="index.php?page=menu" class="nav-item nav-menu"><span class='icon-field'><i class="fa fa-list"></i></span> Sản phẩm</a>
				<a href="index.php?page=categories" class="nav-item nav-categories"><span class='icon-field'><i class="fa fa-list"></i></span>Danh mục sản phẩm</a>
				
				<?php if($_SESSION['login_type'] == 1): ?>
				<a href="index.php?page=users" class="nav-item nav-users"><span class='icon-field'><i class="fa fa-users"></i></span> NGười dùng</a>
				<a href="index.php?page=site_settings" class="nav-item nav-site_settings"><span class='icon-field'><i class="fa fa-cogs"></i></span> Site Settings</a>
			<?php endif; ?>
		</div>

</nav>
<script>
	$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>