<?php
  // Подключение сторонних файлов и проверка на неавторизованность
	session_start();
  if(!$_SESSION['session_username'])
    header("Location:login.php");

?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Статистика</title>
	<link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/menu.css">
	<meta http-equiv="Cache-Control" content="private">
</head>
<?php
	include ('includes/LogIO.php');
	include("includes/DB.php");
  include("includes/Date.php");
?>
<body>
	<div class="wrapper">
    <div class="wrapper">
      <?php
        /* --- Подключение меню --- */
        include('includes/menu.php');
      ?>
        <div class="content">
      <?php
          // Текущая дата
          $dateNowO = $date->getDate();
          // Зануление переменных
          $allsum = $sumAm = $sumSt = $sumN = $sumB = 0;
          // Запрос
          $operationQuery = mysqli_query($connection, "SELECT * FROM operation WHERE date  LIKE '".$dateNowO."%'");
          // Если пусто - вывести сообщение
          if(mysqli_num_rows($operationQuery) == 0)
              $allsum = 'Нет данных в БД';
          // При наличие данных запустить счетчики
          else
            {
              // Цикл счетчика
              while($dataDB = mysqli_fetch_assoc($operationQuery))
              {
                // Вся сумма
                $allsum += $dataDB['sum'];

                if ($dataDB['type'] == 'Амбулатория')
                    // Сумма в амбулатории
                    $sumAm += $dataDB['sum'];
                  else
                    // Сумма в стационаре
                    $sumSt += $dataDB['sum'];

                if ($dataDB['typeSum'] == 'nal')
                  // Сумма наличными
                  $sumN += $dataDB['sum'];
                else
                  // Сумма безналичного платежа
                  $sumB += $dataDB['sum'];
              }
            }

            // Запросы к БД
            $query = mysqli_query($connection, "SELECT * FROM patient");
            $queryOpen = mysqli_query($connection, "SELECT * FROM patient WHERE status = '1'");
            $queryClose = mysqli_query($connection, "SELECT * FROM patient WHERE status = '0'");
            $countPacient = mysqli_num_rows($query);
            $countPacientOpen = mysqli_num_rows($queryOpen);
            $countPacientClose = mysqli_num_rows($queryClose);
            $queryA = mysqli_query($connection, "SELECT * FROM operation WHERE type = 'Амбулатория'");
            $queryS = mysqli_query($connection, "SELECT *  FROM operation WHERE type = 'Стационар'");
            $sumA = $sumS = 0;
            // Циклы подсчета сумм
            while ($row = mysqli_fetch_assoc($queryA)){
              $sumA += $row['sum'];
              }
            while ($row = mysqli_fetch_assoc($queryS)){
               $sumS += $row['sum'];
              }
            // Запрос к пользователям Врачам
            $docQuery = mysqli_query($connection, "SELECT * FROM usertbl WHERE dol = 'doc'");
            // Строковые перемнные
            $str = $str1 =''; 
            // Цикл получения строки для построения графиков
            while($dataServ = mysqli_fetch_assoc($docQuery)){
              $str .= "[' ".$dataServ['fio']." ', ".$dataServ['uslugi']." ],";
              $str1 .= "[' ".$dataServ['fio']." ', ".$dataServ['money']." ],";
              }
                      

        ?>
        <h1>Статистка</h1>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <!-- Скрипт вывода графика количества пациентов в амбулатории и стационаре -->
            <script type="text/javascript">
              google.charts.load('current', {'packages':['corechart']});
              google.charts.setOnLoadCallback(drawChart);

              function drawChart() {

                var data = google.visualization.arrayToDataTable([
                  ['Тип', 'Количество'],
                  ['Открытых',     <?php echo $countPacientOpen; ?>],
                  ['Закрытых',      <?php echo $countPacientClose; ?>],
                ]);

                var options = {
                  title: 'Количество открытых и закрытых пациентов (Всего: <?php echo $countPacient; ?>)'
                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                chart.draw(data, options);
              }
            </script>
            <!-- Скрипт графика прибыли по категориям -->
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
              google.charts.load('current', {'packages':['corechart']});
              google.charts.setOnLoadCallback(drawChart);

              function drawChart() {

                var data = google.visualization.arrayToDataTable([
                  ['Тип', 'Прибыль'],
                  ['Амбулаторя',     <?php echo $sumA; ?>],
                  ['Стационар',      <?php echo $sumS; ?>],
                ]);

                var options = {
                  title: 'Прибыльность амбулатории и стационара'
                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart1'));

                chart.draw(data, options);
              }
            </script>
            <!-- Скрипт графика вывода количества услуг по врачам -->
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
              google.charts.load('current', {'packages':['corechart']});
              google.charts.setOnLoadCallback(drawChart);

              function drawChart() {

                var data = google.visualization.arrayToDataTable([
                  ['ФИО', 'Количество услуг'],
                  <?php echo $str; ?>
                ]);

                var options = {
                  title: 'Услуг оказано'
                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart2'));

                chart.draw(data, options);
              }
            </script>
            <!-- Скрипт гафика зарплат врачей -->
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
              google.charts.load('current', {'packages':['corechart']});
              google.charts.setOnLoadCallback(drawChart);

              function drawChart() {

                var data = google.visualization.arrayToDataTable([
                  ['ФИО', 'РУБЛЕЙ'],
                  <?php echo $str1; ?>
                  
                ]);

                var options = {
                  title: 'Зарплата врачей'
                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart3'));

                chart.draw(data, options);
              }
            </script>
          </head>
          <style type="text/css">
            .wrap-gr{
                display: grid;
                grid-template-columns: 50% 50%;
                /*grid-template-rows: 50% 50%;*/
            }
            .piechart{
              border: 2px solid grey;
            }
          </style>
          <body>
            <div class="wrap-gr">
              <div id="piechart"></div>
              <div  id="piechart1"></div>
              <div id="piechart2"></div>
              <div  id="piechart3"></div>
            </div>
            <?php
            echo '
            <div class="stat">
                <h1 style="color: black;">Статистика операций за сегодня</h1>';
                if($allsum == 'Нет данных в БД')
                  echo '<h2>'.$allsum.'</h2>';
                else
                  echo'
                    <h2 style="color: black;">Общая сумма:'.$allsum.' рублей</h2>
                    <p style="float: right; color: black;" >Наличный расчет: '.$sumN.'рублей</p>
                    <p style="float: left; color: black;" >Безналичный расчет: '.$sumB.'рублей</p><br>
                    <p style="float: left; color: black;" >Поступления из амбулатории: '.$sumAm.'рублей</p>
                    <p style="float: right; color: black;" >Поступления из стационара: '.$sumSt.'рублей</p>';
            echo '</div>';
            // Вывод кнопки по типу записи
              $typeuser = $_SESSION['typeUser']; 
              $_SESSION['link'] = (isset($_SESSION['link'])) ? $_SESSION['link'] : 'main.php';
              if($typeuser != 'view') { echo '<a class="button" href="'.$_SESSION['link'].'">Вернуться</a>';} 
              else echo '<a class="button" href="logout.php">Выйти</a>';
            ?>
  </div>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>