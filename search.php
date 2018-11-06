<?php
// Подключение сторонних файлов и проверка на неавторизованность
	session_start();
  if(!$_SESSION['session_username'])
    header("Location:login.php");
  
	include("includes/DB.php");
  include("includes/Date.php");
  include('includes/DBOper.php');
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Поиск</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/menu.css">
  <meta http-equiv="Cache-Control" content="private">
</head>
<body>
  <div class="wrapper">
    <?php
      // Подключение меню
      include('includes/menu.php');
    ?>
  <div class="content">
    <!-- Переопределение фона секции -->
    <style>
      .add{
        background: white;
      }
    </style>
    <section class="add">
      <?php 
      // Получение переменной из запроса
        $search = $_GET['search'];
        // Поиск по запрросу в таблице пациентов
        $searchQuery = mysqli_query($connection, "SELECT * FROM patient WHERE fio LIKE '%".$search."%'");
        // При отсутствие выполнить другой запрос
        if(mysqli_num_rows($searchQuery) == 0)
        {
          // Поиск по ИД
          $searchQuery = mysqli_query($connection, "SELECT * FROM patient WHERE id LIKE '%".$search."%'");
          // При отсуттствии вывод сообщения
          if(mysqli_num_rows($searchQuery) == 0)
          {
            echo '<img style="width: 40%; margin-left: 30%;" src="img/ops.jpg" alt="">';
            echo '<h1>Поиск не дал результатов</h1>';
          }
          // Вывод результатов в таблице
          else
          {
            echo '<table>
            <thead>
              <tr>
                <th rowspan="2">#</th>
                  <th rowspan="2">ФИО</th>
                  <th rowspan="2">Дата рождения</th>
                  <th rowspan="2">Телефон</th>
                  <th rowspan="2">Услуги</th>
                  <th rowspan="2">Стоимость</th>
                  <th rowspan="2">Лечащий доктор</th>
                  <th rowspan="2">Внесенная сумма</th>
                  <th rowspan="2">Заметки</th>
                  <th rowspan="2">Дата поступления</th>';
                  echo'<th rowspan="2">Койко место</th>';
                  echo'<th rowspan="2">Тип</th>
                  <th rowspan="2">Карта открыта</th>
                </tr>
              </thead>
            <tbody>';
                  while($data = mysqli_fetch_assoc($searchQuery)) {
                    echo '<tr>';
                    echo '<td>'.$data['id'].'</td>'; 
                      echo '<td>'.$data['fio'].'</td>'; 
                      echo '<td>'.$data['datebirthday'].'</td>'; 
                      echo '<td>'.$data['tel'].'</td>'; 
                      echo '<td><a href="edit.php?id='.$data['id'].'&flagedit=3"><img class = "icon" src="img/list.png" alt="Посмотреть"></a></td>';
                      echo '<td>'.$data['all_sum'].'</td>';
                      if  ($data['doctor'] == 'no')
                        echo '<td style = "background: rgba(200,10,10,0.3);">Доктор не назначен</td>';
                      else
                        echo '<td style = "background: rgba(10,200,10,0.3);">'.$data['doctor'].'</td>';
                      if  (empty($data['sum']))
                        echo '<td style = "background: rgba(200,10,10,0.3);">Сумма не внесена</td>';
                      else
                        echo '<td style = "background: rgba(10,200,10,0.3);">'.$data['sum'].'</td>';
                      if  (empty($data['dist']))
                        echo '<td style = "background: rgba(200,10,10,0.3);">Заметок нет</td>';
                      else
                        echo '<td>'.$data['dist'].'</td>';
                      echo '<td>'.$data['dateIn'].'</td>';
                      if($data['mest'] == 'NULL')
                        echo '<td>Амбулатория</td>';
                      else
                        echo '<td>'.$data['mest'].'</td>'; 
                      echo '<td>'.$data['type'].'</td>';
                      if($data['status'] == '1')
                        echo '<td style = "background: rgba(10,200,10,0.3);">ДА</td>';
                      else
                        echo '<td style = "background: rgba(200,10,10,0.3);">НЕТ</td>'; 
                      echo '</tr>';
                      }
              echo '</tbody>
              </table>';
          }       
        }
        else
        {
          echo '<table>
          <thead>
            <tr>
              <th rowspan="2">#</th>
                <th rowspan="2">ФИО</th>
                <th rowspan="2">Дата рождения</th>
                <th rowspan="2">Телефон</th>
                <th rowspan="2">Услуги</th>
                <th rowspan="2">Стоимость</th>
                <th rowspan="2">Лечащий доктор</th>
                <th rowspan="2">Внесенная сумма</th>
                <th rowspan="2">Заметки</th>
                <th rowspan="2">Дата поступления</th>';
                echo'<th rowspan="2">Койко место</th>';
                echo'<th rowspan="2">Тип</th>
                <th rowspan="2">Карта открыта</th>
              </tr>
            </thead>
          <tbody>';
                while($data = mysqli_fetch_assoc($searchQuery)) {
                  echo '<tr>';
                  echo '<td>'.$data['id'].'</td>'; 
                    echo '<td>'.$data['fio'].'</td>'; 
                    echo '<td>'.$data['datebirthday'].'</td>'; 
                    echo '<td>'.$data['tel'].'</td>'; 
                    echo '<td><a href="edit.php?id='.$data['id'].'&flagedit=3"><img class = "icon" src="img/list.png" alt="Посмотреть"></a></td>';
                    echo '<td>'.$data['all_sum'].'</td>';
                    if  ($data['doctor'] == 'no')
                      echo '<td style = "background: rgba(200,10,10,0.3);">Доктор не назначен</td>';
                    else
                      echo '<td style = "background: rgba(10,200,10,0.3);">'.$data['doctor'].'</td>';
                    if  (empty($data['sum']))
                      echo '<td style = "background: rgba(200,10,10,0.3);">Сумма не внесена</td>';
                    else
                      echo '<td style = "background: rgba(10,200,10,0.3);">'.$data['sum'].'</td>';
                    if  (empty($data['dist']))
                      echo '<td style = "background: rgba(200,10,10,0.3);">Заметок нет</td>';
                    else
                      echo '<td>'.$data['dist'].'</td>';
                    echo '<td>'.$data['dateIn'].'</td>';
                    if($data['mest'] == 'NULL')
                      echo '<td>Амбулатория</td>';
                    else
                      echo '<td>'.$data['mest'].'</td>'; 
                    echo '<td>'.$data['type'].'</td>';
                    if($data['status'] == '1')
                      echo '<td style = "background: rgba(10,200,10,0.3);">ДА</td>';
                    else
                      echo '<td style = "background: rgba(200,10,10,0.3);">НЕТ</td>'; 
                    echo '</tr>';
                    }
            echo '</tbody>
            </table>';
        }
       ?>
    </section>
  </div>
  </div>
<script src="js/script.js"></script>
</script>
</body>
</html>