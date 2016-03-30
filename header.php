<div class="header">
    <div class="containerNoTop">
		<div class="logo">
			<h1> <a href='homepage.php'>Queen's BnB</a></h1>
		</div>
        <?php if(isset($_SESSION['login_user'])){ ?>
		<div class="nav">
			<ul>
				<li> <a href='profile_page.php'>Profile</a></li>
				<?php
					$userType=1;

					if ($_SESSION['login_type']==0) {
					echo	"<li> <a href='my_properties.php'>My Properties</a></li>
						<li> <a href='#'>My Trips</a></li>";
					} else {
					echo	"<li> <a href='#'>Manage Members</a></li>
						<li> <a href='#'>View Bookings</a></li>";
					}
                ?>
                <li> <a href='logout.php'>Logout</a></li>
			</ul>
		</div>
        <?php } ?>
    </div>
</div>
