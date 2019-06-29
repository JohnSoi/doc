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
  <script src="js/jquery.min.js"></script>
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
      <style>
        .content{
          padding: 10px;
          background: white;
          margin-left: 22%;
          width: 76%;
          height: 90vh; 
          position: relative;
        }
        .tab{
          background: #05AEF9FF;
          height: 5%;
          width: 100%;
          position: absolute;
          top: 0;
          left: 0;
          overflow: hidden;
        }
        .tab ul{
          height: 100%;
          display: -webkit-flex;
          display: -moz-flex;
          display: -ms-flex;
          display: -o-flex;
          display: flex;
          justify-content: space-around;
          -ms-align-items: center;
          align-items: center;
          list-style-type: none;
        }
        .tab ul li{
          width: 100%;
          height: 100%;
          display: -webkit-flex;
          display: -moz-flex;
          display: -ms-flex;
          display: -o-flex;
          display: flex;
          -ms-align-items: center;
          align-items: center;
          justify-content: center;
          border-bottom: 3px solid #4052BEFF;
          cursor: pointer;
          -webkit-transition: 0.3s;
          -o-transition: 0.3s;
          transition: 0.3s;
          font-weight: 700;
        }
        .tab ul li:hover{
          font-size: 120%;
          border-left: 3px solid #4052BEFF;
          border-right: 3px solid #4052BEFF;
        }
        .tab .active{
          background: #4264BCFF;
          box-shadow: 1px 1px 2px black;
          color: white;
        }
        .ads,.disp,.mon,.items{
          margin-top: 5% ;
        }
        .ads,.disp,.mon{
          display: grid;
          width: 100%;
          height: 94%;
          grid-template-columns: 33% 33% 33%;
          grid-template-rows: 50% 50%;
        }
        iframe{
          width: 100%;
          height: 80%;
        }
        .content input{
          height: 10%;
          width: 100%;
        }
      </style>
      <div class="content">
        <div class="tab">
          <ul>
            <li id="ads" class="active">Реклама</li>
            <li id="disp">Диспечеры</li>
            <li id="mon">Прибыльность</li>
            <li id="items">Услуги</li>
            <li id="day">Койко-дни</li>
          </ul>
        </div>
        <!-- Вывод статистики по рекламе -->
        <div class="ads">
          <div><iframe id="date1" src="stat/ads.php" frameborder="0"></iframe>
            <input id="date" class="date1" type="text" placeholder="Введите дату" autocomplete="off"></div>
          <div><iframe id="date2" src="stat/ads.php?type=1" frameborder="0"></iframe>
            <input id="date01" class="date2" type="text" placeholder="Введите дату" autocomplete="off"></div>
          <div><iframe id="date3" src="stat/ads.php?type=2" frameborder="0"></iframe>
            <input id="date02" class="date3" type="text" placeholder="Введите дату" autocomplete="off"></div>
          <div><iframe id="date4" src="stat/ads.php?type=3" frameborder="0"></iframe>
            <input id="date03" class="date4" type="text" placeholder="Введите дату" autocomplete="off"></div>
          <div><iframe id="date5" src="stat/ads.php?type=4" frameborder="0"></iframe>
            <input id="date04" class="date5" type="text" placeholder="Введите дату" autocomplete="off"></div>
          <div><iframe id="date6" src="stat/ads.php?type=6" frameborder="0"></iframe>
            <input id="date05" class="date6" type="text" placeholder="Введите дату" autocomplete="off"></div>
        </div>
        <!-- Вывод статистики по диспечерам -->
        <div class="disp">
          <div><iframe id="date21" src="stat/disp.php" frameborder="0"></iframe>
            <input id="date20" class="date21" type="text" placeholder="Введите дату" autocomplete="off"></div>
          <div><iframe id="date22" src="stat/disp.php?type=1" frameborder="0"></iframe>
            <input id="date201" class="date22" type="text" placeholder="Введите дату" autocomplete="off"></div>
          <div><iframe id="date23" src="stat/disp.php?type=2" frameborder="0"></iframe>
            <input id="date202" class="date23" type="text" placeholder="Введите дату" autocomplete="off"></div>
          <div><iframe id="date24" src="stat/disp.php?type=3" frameborder="0"></iframe>
            <input id="date203" class="date24" type="text" placeholder="Введите дату" autocomplete="off"></div>
          <div><iframe id="date25" src="stat/disp.php?type=4" frameborder="0"></iframe>
            <input id="date204" class="date25" type="text" placeholder="Введите дату" autocomplete="off"></div>
          <div><iframe id="date26" src="stat/disp.php?type=6" frameborder="0"></iframe>
            <input id="date205" class="date26" type="text" placeholder="Введите дату" autocomplete="off"></div>
        </div>
        <!-- Вывод статистики по прибыльности -->
        <div class="mon">
          <div><iframe id="date321" src="stat/money.php" frameborder="0"></iframe>
            <input id="date320" class="date321" type="text" placeholder="Введите дату" autocomplete="off"></div>
          <div><iframe id="date322" src="stat/money.php?type=1" frameborder="0"></iframe>
            <input id="date3201" class="date322" type="text" placeholder="Введите дату" autocomplete="off"></div>
          <div><iframe id="date323" src="stat/money.php?type=2" frameborder="0"></iframe>
            <input id="date3202" class="date323" type="text" placeholder="Введите дату" autocomplete="off"></div>
          <div><iframe id="date324" src="stat/money.php?type=3" frameborder="0"></iframe>
            <input id="date3203" class="date324" type="text" placeholder="Введите дату" autocomplete="off"></div>
          <div><iframe id="date325" src="stat/money.php?type=4" frameborder="0"></iframe>
            <input id="date3204" class="date325" type="text" placeholder="Введите дату" autocomplete="off"></div>
          <div><iframe id="date326" src="stat/money.php?type=6" frameborder="0"></iframe>
            <input id="date3205" class="date326" type="text" placeholder="Введите дату" autocomplete="off"></div>
        </div>
        <!-- Вывод статистики по услугам -->
        <div class="items">
          <style>
            .items .wrap-p{
              display: -webkit-flex;
              display: -moz-flex;
              display: -ms-flex;
              display: -o-flex;
              display: flex;
              width: 100%%;
              height: 4vh;
            }
            .items .wrap-p input{
              height: 100%;
            }
            .items iframe{
              width: 100%;
              height: 75vh;
              background: #D6D6D6FF;
            }
          </style>
          <iframe id="itemsF" src="stat/items.php" frameborder="0"></iframe>
          <div class="wrap-p"><input id="ItemsD1" class="ItemsD1" type="text" placeholder="Введите дату №1" autocomplete="off">
          <input id="ItemsD2" class="ItemsD1" type="text" placeholder="Введите дату №2" autocomplete="off">
          <input id="ItemsD3" class="ItemsD1" type="text" placeholder="Введите дату №3" autocomplete="off"></div>
        </div>
        <div class="day">
          <style>
            .day .wrap-p{
              display: -webkit-flex;
              display: -moz-flex;
              display: -ms-flex;
              display: -o-flex;
              display: flex;
              width: 100%%;
              height: 4vh;
            }
            .day .wrap-p input{
              height: 100%;
            }
            .day iframe{
              width: 100%;
              height: 75vh;
              background: #D6D6D6FF;
              margin-top: 5%;
            }
          </style>
          <iframe id="dayF" src="stat/day.php" frameborder="0"></iframe>
          <div class="wrap-p"><input id="dayD1" class="dayD1" type="text" placeholder="Введите дату №1" autocomplete="off">
          <input id="dayD2" class="dayD1" type="text" placeholder="Введите дату №2" autocomplete="off">
          <input id="dayD3" class="dayD1" type="text" placeholder="Введите дату №3" autocomplete="off"></div>
        </div>
      </div>
    </div>
  </div>
</div>
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
<script src="js/script.js"></script>
<script>
  var d1 = d2 = d3 = 0;
  // Обработка услуг
  $("#ItemsD1").change(function() {
      d1 = $("#ItemsD1").val();
      if (d2 != 0 && d3 != 0)
        $("#itemsF").attr('src', 'stat/items.php?date2=' + d2 + '&date3=' + d3 + '&date1=' + $(".ItemsD1").val())
      else
        if(d2 != 0)
          $("#itemsF").attr('src', 'stat/items.php?date2=' + d2 + '&date1=' + $(".ItemsD1").val())
        else
          if(d3 != 0)
            $("#itemsF").attr('src', 'stat/items.php?date3=' + d3 + '&date1=' + $(".ItemsD1").val())
          else
            $("#itemsF").attr('src', 'stat/items.php?date1=' + $(".ItemsD1").val())
  })
  $("#ItemsD2").change(function() {
        d2 = $("#ItemsD2").val();
        if (d1 != 0 && d3 != 0)
        $("#itemsF").attr('src', 'stat/items.php?date1=' + d1 + '&date3=' + d3 + '&date2=' + $("#ItemsD2").val())
      else
        if(d1 != 0)
          $("#itemsF").attr('src', 'stat/items.php?date1=' + d1 + '&date2=' + $("#ItemsD2").val())
        else
          if(d3 != 0)
            $("#itemsF").attr('src', 'stat/items.php?date3=' + d3 + '&date2=' + $("#ItemsD2").val())
          else
            $("#itemsF").attr('src', 'stat/items.php?date2=' + $("#ItemsD2").val())
  })
  $("#ItemsD3").change(function() {
        d3 = $("#ItemsD3").val();
        if (d2 != 0 && d1 != 0)
          $("#itemsF").attr('src', 'stat/items.php?date2=' + d2 + '&date1=' + d1 + '&date3=' + $("#ItemsD3").val())
        else
          if(d2 != 0)
            $("#itemsF").attr('src', 'stat/items.php?date2=' + d2 + '&date3=' + $("#ItemsD3").val())
          else
            if(d1 != 0)
              $("#itemsF").attr('src', 'stat/items.php?date1=' + d1 + '&date3=' + $("#ItemsD3").val())
            else
              $("#itemsF").attr('src', 'stat/items.php?date3=' + $("#ItemsD3").val())
  })
  var dD1 = dD2 = dD3 = 0;
  // Обработка койко дней
  $("#dayD1").change(function() {
      dD1 = $("#dayD1").val();
      if (dD2 != 0 && dD3 != 0)
        $("#dayF").attr('src', 'stat/day.php?date2=' + dD2 + '&date3=' + dD3 + '&date1=' + $(".dayD1").val())
      else
        if(dD2 != 0)
          $("#dayF").attr('src', 'stat/day.php?date2=' + dD2 + '&date1=' + $(".dayD1").val())
        else
          if(dD3 != 0)
            $("#dayF").attr('src', 'stat/day.php?date3=' + dD3 + '&date1=' + $(".dayD1").val())
          else
            $("#dayF").attr('src', 'stat/day.php?date1=' + $(".dayD1").val())
  })
  $("#dayD2").change(function() {
        dD2 = $("#dayD2").val();
        if (dD1 != 0 && dD3 != 0)
        $("#dayF").attr('src', 'stat/day.php?date1=' + dD1 + '&date3=' + dD3 + '&date2=' + $("#dayD2").val())
      else
        if(dD1 != 0)
          $("#dayF").attr('src', 'stat/day.php?date1=' + dD1 + '&date2=' + $("#dayD2").val())
        else
          if(dD3 != 0)
            $("#dayF").attr('src', 'stat/day.php?date3=' + dD3 + '&date2=' + $("#dayD2").val())
          else
            $("#dayF").attr('src', 'stat/day.php?date2=' + $("#dayD2").val())
  })
  $("#dayD3").change(function() {
        dD3 = $("#dayD3").val();
        if (dD2 != 0 && dD1 != 0)
          $("#dayF").attr('src', 'stat/day.php?date2=' + dD2 + '&date1=' + dD1 + '&date3=' + $("#dayD3").val())
        else
          if(dD2 != 0)
            $("#dayF").attr('src', 'stat/day.php?date2=' + dD2 + '&date3=' + $("#dayD3").val())
          else
            if(dD1 != 0)
              $("#dayF").attr('src', 'stat/day.php?date1=' + dD1 + '&date3=' + $("#dayD3").val())
            else
              $("#dayF").attr('src', 'stat/day.php?date3=' + $("#dayD3").val())
  })
  // Обработка рекламы
  $(".date1").change(function() {
        $("#date1").attr('src', 'stat/ads.php?date=' + $(".date1").val())
  })
  $(".date2").change(function() {
        $("#date2").attr('src', 'stat/ads.php?date=' + $(".date2").val())
  })
  $(".date3").change(function() {
        $("#date3").attr('src', 'stat/ads.php?date=' + $(".date3").val())
  })
  $(".date4").change(function() {
        $("#date4").attr('src', 'stat/ads.php?date=' + $(".date4").val())
  })
  $(".date5").change(function() {
        $("#date5").attr('src', 'stat/ads.php?date=' + $(".date5").val())
  })
  $(".date6").change(function() {
        $("#date6").attr('src', 'stat/ads.php?date=' + $(".date6").val())
  })
   // Обработка диспечеров
  $(".date21").change(function() {
        $("#date21").attr('src', 'stat/disp.php?date=' + $(".date21").val())
  })
  $(".date22").change(function() {
        $("#date22").attr('src', 'stat/disp.php?date=' + $(".date22").val())
  })
  $(".date23").change(function() {
        $("#date23").attr('src', 'stat/disp.php?date=' + $(".date23").val())
  })
  $(".date24").change(function() {
        $("#date24").attr('src', 'stat/disp.php?date=' + $(".date24").val())
  })
  $(".date25").change(function() {
        $("#date25").attr('src', 'stat/disp.php?date=' + $(".date25").val())
  })
  $(".date26").change(function() {
        $("#date26").attr('src', 'stat/disp.php?date=' + $(".date26").val())
  })
  // Обработка прибыли
  $(".date321").change(function() {
        $("#date321").attr('src', 'stat/money.php?date=' + $(".date321").val())
  })
  $(".date322").change(function() {
        $("#date322").attr('src', 'stat/money.php?date=' + $(".date322").val())
  })
  $(".date323").change(function() {
        $("#date323").attr('src', 'stat/money.php?date=' + $(".date323").val())
  });
  $(".date324").change(function() {
        $("#date324").attr('src', 'stat/money.php?date=' + $(".date324").val())
  })
  $(".date325").change(function() {
        $("#date325").attr('src', 'stat/money.php?date=' + $(".date325").val())
  })
  $(".date326").change(function() {
        $("#date326").attr('src', 'stat/money.php?date=' + $(".date326").val())
  });
  $('.disp').css('display', 'none')
  $('.mon').css('display', 'none')
  $('.items').css('display', 'none')
  $('.day').css('display', 'none')
  $('#disp').click(function() {
    $('.active').removeClass()
    $('#disp').addClass('active')
    $('.ads').css('display', 'none')
    $('.disp').css('display', 'grid')
    $('.mon').css('display', 'none')
    $('.items').css('display', 'none')
    $('.day').css('display', 'none')
  })
  $('#ads').click(function() {
    $('.active').removeClass()
    $('#ads').addClass('active')
    $('.ads').css('display', 'grid')
    $('.disp').css('display', 'none')
    $('.mon').css('display', 'none')
    $('.items').css('display', 'none')
    $('.day').css('display', 'none')
  })
  $('#mon').click(function() {
    $('.active').removeClass()
    $('#mon').addClass('active')
    $('.ads').css('display', 'none')
    $('.disp').css('display', 'none')
    $('.mon').css('display', 'grid')
    $('.items').css('display', 'none')
    $('.day').css('display', 'none')
  })
  $('#items').click(function() {
    $('.active').removeClass()
    $('#items').addClass('active')
    $('.ads').css('display', 'none')
    $('.disp').css('display', 'none')
    $('.mon').css('display', 'none')
    $('.items').css('display', 'grid')
    $('.day').css('display', 'none')
  })
  $('#day').click(function() {
    $('.active').removeClass()
    $('#day').addClass('active')
    $('.ads').css('display', 'none')
    $('.disp').css('display', 'none')
    $('.mon').css('display', 'none')
    $('.items').css('display', 'none')
    $('.day').css('display', 'grid')
  })
 
</script>
    <script src="js/jquery.maskedinput.min.js"></script>
    <script type="text/javascript">
        /* --- Маска для телефона --- */
        $(function() {
            $.mask.definitions['~'] = "[+-]";
            $("#date").mask("99.2099");
            $("#date01").mask("99.2099");
            $("#date02").mask("99.2099");
            $("#date03").mask("99.2099");
            $("#date04").mask("99.2099");
            $("#date05").mask("99.2099");
            $("#date20").mask("99.2099");
            $("#date201").mask("99.2099");
            $("#date202").mask("99.2099");
            $("#date203").mask("99.2099");
            $("#date204").mask("99.2099");
            $("#date205").mask("99.2099");
            $("#date320").mask("99.2099");
            $("#date3201").mask("99.2099");
            $("#date3202").mask("99.2099");
            $("#date3203").mask("99.2099");
            $("#date3204").mask("99.2099");
            $("#date3205").mask("99.2099");
            $("#ItemsD1").mask("99.2099");
            $("#ItemsD2").mask("99.2099");
            $("#ItemsD3").mask("99.2099");
            $("#dayD1").mask("99.2099");
            $("#dayD2").mask("99.2099");
            $("#dayD3").mask("99.2099");

            // $("input").blur(function() {
            //     $("#info").html("Unmasked value: " + $(this).mask());
            // }).dblclick(function() {
            //     $(this).unmask();
            // });
        });
    </script>
</body>
</html>