<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Тестовый сайт</title>
	<link rel="stylesheet" href="css/style.css">
	<meta http-equiv="Cache-Control" content="private">
</head>
<?php
	include ('includes/LogIO.php');
	include("includes/DB.php");

	$access->checkNotAuth();

	$username = $access->getUserName();
?>
<body>
	<div class="nav">
	<ul id="nav1">Амбулатория
		<div id="hid1">
			<li>Прием</li>
			<li>Отчет</li>
			<li>Статистика</li>
		</div>
	</ul>
	<ul id="nav2">Стационар
		<div id="hid2">
			<li>Прием</li>
			<li>Отчет</li>
			<li>Статистика</li>
		</div>
	</ul>
	<ul id="nav3">Параметры
		<div id="hid3">
			<li>Интерфейс</li>
			<li>Услуги</li>
			<li>Персонал</li>
		</div>
	</ul>
	<ul id="nav4">Выход</ul>
	</div>
	<div class="main">
		<?php
			$username = $access->getUserName();
		?>
		<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam sint error quos odit, distinctio doloribus hic praesentium aliquid reprehenderit cumque animi maiores, quas sit, blanditiis reiciendis dolorem laudantium? Recusandae, assumenda!</div>
		<div>Vitae corporis corrupti quibusdam consequatur facilis est, autem voluptatibus alias deleniti ea, accusantium quas nobis culpa voluptatum? Sit rerum aliquid atque, fuga fugiat expedita, corporis ullam culpa voluptas sed quisquam.</div>
		<div>Officia nesciunt ab harum nulla consectetur, dolores repudiandae excepturi architecto sunt laboriosam. Maxime, obcaecati, ducimus. Nesciunt sapiente quos temporibus tempore deserunt placeat nihil repellendus ipsum eaque? Praesentium officiis, laudantium iure!</div>
		<div>Dolorum repellat laboriosam veritatis alias libero consequuntur velit obcaecati ipsum animi omnis incidunt, quia atque nisi cupiditate aspernatur, tempora quibusdam perferendis. Ducimus perspiciatis magni molestias, quidem, dolor neque quis placeat.</div>
		<div>Quod quibusdam debitis doloribus incidunt ratione fuga amet saepe impedit mollitia blanditiis at placeat ipsa tenetur, quos aliquam numquam aut corporis accusantium autem repellendus dignissimos vero sapiente totam ad error.</div>
		<div>Ut tempore sapiente reprehenderit sint tenetur veritatis nihil illo ratione magni recusandae! Ipsam repellat omnis, nemo perferendis repudiandae quisquam doloribus, architecto illo, porro ullam nesciunt cumque. Fugit illum veritatis repudiandae.</div>
		<div>Temporibus doloremque, nam sunt fugit modi esse sed eligendi reprehenderit corporis, porro quidem beatae blanditiis deserunt culpa expedita. Possimus voluptates eos maiores, tempora, necessitatibus dolore facere. Dicta harum, eos a.</div>
		<div>Cum, possimus magni quae ut quam doloremque reiciendis tempore quibusdam explicabo nemo nisi voluptas hic veritatis, eligendi et molestiae non fuga esse, laborum aspernatur dolores quis. Magnam, quia officia modi?</div>
		<div>Illo voluptatem molestiae expedita corporis eius distinctio possimus, placeat rem culpa repellendus consequatur, iusto, laboriosam rerum nesciunt temporibus atque minus, adipisci nihil quibusdam quod architecto nisi delectus quae dignissimos quisquam!</div>
		<div>Doloremque tempore dicta eos, laudantium optio in, illo, ut obcaecati, modi dolore libero dolores? Labore sequi veritatis, facilis, maxime quae eius, vero atque hic beatae id sapiente exercitationem soluta, repudiandae.</div>
		<div>Repellat provident ipsum illum, at nemo voluptatem distinctio magni ullam, placeat, sapiente iste dolores minus velit nobis fuga itaque ipsam consequuntur quae error nesciunt laboriosam molestias consectetur! Blanditiis, reprehenderit, ipsum!</div>
		<div>Sapiente est tenetur, nam corrupti ipsam inventore perspiciatis consequatur nostrum id. Repudiandae officia fugiat voluptates perspiciatis placeat, repellendus voluptatem nostrum eligendi beatae laborum itaque fuga suscipit quo aut quibusdam voluptatum!</div>
		<div>Voluptatibus libero modi eveniet dignissimos soluta eius harum saepe enim accusamus vel, sint! Necessitatibus dignissimos alias enim possimus eligendi molestiae iure totam consequatur soluta nisi harum sed accusantium, sit incidunt.</div>
		<div>Pariatur maxime, dolore odio asperiores deleniti exercitationem odit quaerat impedit non itaque. Quidem, quisquam, unde. Atque repellat esse culpa illo, optio dolor dolore aliquid odio, numquam. A sapiente, quis rerum.</div>
		<div>Tempore fugiat itaque ipsam quidem dicta maxime asperiores libero temporibus, debitis deserunt accusantium officiis beatae voluptas alias tenetur autem sequi eum dolorum, praesentium laboriosam animi unde veritatis quae? Voluptatum, temporibus!</div>
		<div>Esse eum, iusto ullam delectus quaerat id labore ab blanditiis consequuntur doloremque. Nisi dicta enim eveniet sed ab accusantium nobis sapiente aut, numquam veniam id voluptates reiciendis quisquam, ullam consequatur.</div>
		<div>Enim officia blanditiis culpa hic facilis, quae dolores ut, cupiditate minima labore laboriosam quaerat tempore recusandae nam aperiam obcaecati sequi quibusdam. Amet, quas deserunt, similique aliquid cupiditate ab rem consequatur.</div>
		<div>Inventore expedita, fuga rerum nostrum cumque eveniet fugit officiis eum quam iure possimus omnis assumenda quasi, vel distinctio blanditiis eos! Commodi tempore, officia ut odio eos est natus temporibus quas.</div>
		<div>Odit quas eos, eligendi ex accusantium assumenda rem expedita cum blanditiis similique, repellat repudiandae iure autem nulla doloremque officia unde inventore nesciunt, quasi eaque fuga dignissimos ipsa id sit doloribus.</div>
		<div>Laudantium maxime quia, error sequi molestias temporibus excepturi dolor. Doloribus itaque a, odit iusto sunt adipisci velit vel reiciendis. Et voluptatibus similique explicabo voluptas a exercitationem sunt doloremque ex voluptates.</div>
	</div>
	<script>
		var btn1 = document.getElementById("nav1");
		var btn2 = document.getElementById("nav2");
		var btn3 = document.getElementById("nav3");
		var btn4 = document.getElementById("nav4");

		var hid1 = document.getElementById("hid1");
		var hid2 = document.getElementById("hid2");
		var hid3 = document.getElementById("hid3");
		var hid4 = document.getElementById("hid4");

		btn1.onclick = function(event){
			if (hid1.style.display == "none"){
				hid1.style.display = "block";
				hid3.style.display = "none";
				hid2.style.display = "none";
			}
			else 
				(hid1.style.display = "none")
		}

		btn2.onclick = function(event){
			if (hid2.style.display == "none"){
				hid2.style.display = "block";
				hid1.style.display = "none";
				hid3.style.display = "none";
			}
			else 
				(hid2.style.display = "none")
		}

		btn3.onclick = function(){
			if (hid3.style.display == "none")
			{
				hid3.style.display = "block";
				hid1.style.display = "none";
				hid2.style.display = "none";
			}
			else 
				(hid3.style.display = "none")
		}
	</script>
</body>
</html>