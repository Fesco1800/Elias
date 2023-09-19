
<?php if (isset($_SESSION['auth'])) { ?>

	<nav class="sidebar">

		<div class="logo_details">
			<img src="../assets/images/eliaslogo.png" id="eliasLogo" alt="" width="50" height="50" class="mr-3" style="display: none;">		
			<div class="logo_name">E l i a s</div>
			<i class="bx bx-menu" id="btn"></i>
		</div>
		<ul class="nav-list">
			<li style="display: none;">
				<i class="bx bx-search"></i>
				<input type="text" placeholder="Search...">
				<span class="tooltip">Search</span>
			</li>
			<li>
	            <a href="../home">
	            	<i class='bx bx-home' ></i>
	            	<span class="link_name">Home</span>
	            </a>
	        </li>
			<li>
				<a href="../dashboard">
					<i class="bx bx-user"></i>
					<span class="link_name">Admin</span>
				</a>
				<span class="tooltip">Admin</span>
			</li>
			<li>
				<a href="../client/">
					<i class='bx bxs-user-account'></i>
					<span class="link_name">Client</span>
				</a>
				<span class="tooltip">Client</span>
			</li>
			<li>
				<a href="#">
					<i class='bx bx-log-in-circle'></i>
					<span class="link_name">Logins</span>
				</a>
				<span class="tooltip">Logins</span>
			</li>
			<li>
				<a href="../contact">
					<i class='bx bx-phone' ></i>
					<span class="link_name">Contact Us</span>
				</a>
				<span class="tooltip">Contact Us</span>
			</li>
			

		</ul>
</nav>


<!-- Scripts -->
<script src="../assets/js/sidebar.js"></script>

<?php } ?>

