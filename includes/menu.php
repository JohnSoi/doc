<?php
	/* --- Класс вывода меню с определенными требованиями --- */
	require_once 'LogIO.php';
	$username = $access->getUserName();
	$typeuser = $_SESSION['typeUser'];
	echo '
	  	<div class="menu">
			<nav id="menu-list-st" class="menu-list-st">';
			if ($typeuser != 'view') {
                echo '<div class="groupBtn">
					<figure style="height: 100%">';
                if (($typeuser == 'doc') || ($typeuser == 'su') || ($typeuser == 'ddoc') || $typeuser == 'psi')
                    echo '<a href="add.php?flagadd=5&stac=1"><img src="img/addCl.png" alt="Add" style="width:20%;"></a>';
                if (($typeuser == 'doc') || ($typeuser == 'su'))
                    echo '<a href="input.php?flaginput=2&st=1"><img src="img/report.png" style="width:20%;"></a>';
                if (($typeuser == 'admin') || ($typeuser == 'su'))
                    echo '<a href="add.php?flagadd=6&stac=1"><img src="img/cost.png" alt="" style="width:20%;"></a>';
                if ($typeuser == 'su') {
                    echo '<a href="input.php?flaginput=9"><img src="img/set.png" alt="" style="width:20%;"></a>';
                    echo '<a href="input.php?flaginput=17"><img src="img/stat.png" alt="" style="width:15%;"></a>';
                }
                echo '</figure>
				</div>';
            }
                echo '
			    <figure id = "menu-btn"><span>Стационар</span></figure>
				<div class="menu-items">';
                $query = "SELECT * FROM patient WHERE type = 'Стационар' AND status = '1'";
                $result = mysqli_query($connection, $query);
                if (mysqli_num_rows($result) == 0)
                    echo 'Пациентов нет';
                else
                    echo '<ol>';
                while ($data = mysqli_fetch_assoc($result))
                    echo "<li><a href=\"input.php?flaginput=3&id=" . $data['id'] . "\">" . $data['fio'] . "</a></li>";
                echo '</ol>';
                echo '</div>';
				if ($typeuser == 'view')
					echo '<figure><a href="stat.php">Статистика</a></figure>';
				echo'
			    <figure id = "bot-date">
				    <form class="form-search" action="search.php" method="GET">
						<input name="search" type="text" placeholder="Нажмите Enter">
				    </form>	
					<a href="logout.php"><img src="img/exit.png" alt="" class="icon"></a>
			  	 </figure>
			</nav>

			<nav id="menu-list-am" class="menu-list-am">';
			if ($typeuser != 'view')
			{
				echo '
				<div class="groupBtn">
					<figure style="height: 100%">';
						if (($typeuser == 'doc') || ($typeuser == 'su') || ($typeuser == 'ddoc') || $typeuser == 'psi')
							echo '<a href="add.php?flagadd=5&stac=0"><img src="img/addCl.png" alt="Add" style="width:20%;"></a>';
						if(($typeuser == 'doc')|| ($typeuser == 'su'))
							echo '<a href="input.php?flaginput=2&st=0"><img src="img/report.png" style="width:10%;"></a>';
						if (($typeuser == 'admin') || ($typeuser == 'su'))
							echo '<a href="add.php?flagadd=6&stac=0"><img src="img/cost.png" alt="" style="width:20%;"></a>';
						if($typeuser == 'su') {
                            echo '<a href="input.php?flaginput=9"><img src="img/set.png" alt="" style="width:20%;"></a>';
                            echo '<a href="input.php?flaginput=17"><img src="img/stat.png" alt="" style="width:15%;"></a>';
                        }
					echo '</figure>
				</div>';}
				echo '
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
				echo '</div>';
				if ($typeuser == 'view')
					echo '<figure><a href="stat.php">Статистика</a></figure>';
				echo'
			    <figure id = "bot-date">
				    <form class="form-search" action="search.php" method="GET">
						<input name="search" type="text" placeholder="Нажмите Enter">
				    </form>	
					<a href="logout.php"><img src="img/exit.png" alt="" class="icon"></a>
			  	 </figure>
			</nav>
		</div>';
?>