<?php
	require_once 'LogIO.php';
	$username = $access->getUserName();
	$typeuser = $_SESSION['typeUser'];
	echo '
	  	<div class="menu">
			<nav id="menu-list-st" class="menu-list-st">
				<div class="groupBtn">
					<figure>';
						if (($typeuser == 'doc') or ($typeuser == 'su'))
							echo '<a href="add.php?flagadd=5&stac=1"><img src="img/addCl.png" alt="Add" class="icon"></a>';
						if($typeuser == 'doc')
							echo '<a href="input.php?flaginput=2"><img src="img/report.png" style="width:10%;"></a>';
						if (($typeuser == 'admin') or ($typeuser == 'su'))
							echo '<a href="add.php?flagadd=6&stac=1"><img src="img/cost.png" alt="" class="icon"></a>';
						if($typeuser == 'su')
							echo '<a href="input.php?flaginput=9"><img src="img/set.png" alt="" class="icon"></a>';
					echo '</figure>
				</div>

			    <figure id = "menu-btn"><span>Стационар</span></figure>
				<div class="menu-items">';
					$query = "SELECT * FROM patient WHERE type = 'Стационар' AND status = '1'";
					$result = mysqli_query($connection, $query);
					if (mysqli_num_rows($result) == 0)
						echo 'Пациентов нет';
					else
						echo '<ol>';
							while ($data = mysqli_fetch_assoc($result))
								echo "<li><a href=\"input.php?flaginput=3&id=".$data['id']."\">".$data['fio']."</a></li>";
						echo '</ol>';
				echo '</div>
			    <figure id = "bot-date">
				    <form class="form-search" action="search.php">
						<input type="text" placeholder="Нажмите Enter">
				    </form>	
					<a href="#"><img src="img/exit.png" alt="" class="icon"></a>
			  	 </figure>
			</nav>

			<nav id="menu-list-am" class="menu-list-am">
				<div class="groupBtn">
					<figure>';
						if (($typeuser == 'admin') or ($typeuser == 'su'))
							echo '<a href="add.php?flagadd=5&stac=0"><img src="img/addCl.png" alt="Add" class="icon"></a>';
						if($typeuser == 'doc')
							echo '<a href="input.php?flaginput=2"><img src="img/report.png" style="width:10%;"></a>';
						if (($typeuser == 'admin') or ($typeuser == 'su'))
							echo '<a href="add.php?flagadd=6&stac=0"><img src="img/cost.png" alt="" class="icon"></a>';
						if($typeuser == 'su')
							echo '<a href="input.php?flaginput=9"><img src="img/set.png" alt="" class="icon"></a>';
					echo '</figure>
				</div>

			    <figure id = "menu-btn-am"><span>Амбулатория</span></figure>
				<div class="menu-items">';
					$query = "SELECT * FROM patient WHERE type = 'Амбулатория' AND status = '1'";
					$result = mysqli_query($connection, $query);
					if (mysqli_num_rows($result) == 0)
						echo 'Пациентов нет';
					else
						echo '<ol>';
							while ($data = mysqli_fetch_assoc($result))
								echo "<li><a href=\"input.php?flaginput=3&id=".$data['id']."\">".$data['fio']."</a></li>";
						echo '</ol>';
				echo '</div>
			    <figure id = "bot-date">
				    <form class="form-search" action="search.php">
						<input type="text" placeholder="Нажмите Enter">
				    </form>	
					<a href="#"><img src="img/exit.png" alt="" class="icon"></a>
			  	 </figure>
			</nav>
		</div>';
?>