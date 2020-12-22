<!doctype html>
<html lang = "ru">
<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Форма регистрации</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="container mt-4">
    <?php
     if ($_COOKIE['user']==''):
      ?>
      <div class="row">
         <div class="col">
           <h1>Форма регистрации</h1>
           <form  action="php/check.php" method="post">

            <input type="text" class="form-control" name="name" id="name" placeholder="Введите ваше имя"><br>

            <input type="text" class="form-control" name="login" id="login" placeholder="Введите ваш логин"><br>             

             <input type="password" class="form-control" name="pass" id="pass" placeholder="Введите ваш пароль"><br>

             <button class="btn btn-success"  type ="submit" >Регистрация</button>
           </form>
         </div>


         <div class="col">
           <h1>Форма авторизации</h1>
           <form  action="php/auth.php" method="post">
             <input type="text" class="form-control" name="login" id="login" placeholder="Введите ваш логин"><br>

             <input type="password" class="form-control" name="pass" id="pass" placeholder="Введите ваш пароль"><br>

             <button class="btn btn-success"  type ="submit" >Авторизация</button>
           </form>
         </div>
           <?php else:?>
             <p>
               <?php $_COOKIE['user'] 
             ?>
             <a href="php/exit.php">Выйти</a> </p>
            <div class="col">
            <h1>Введите данные о заправке:</h1>
           <form  action="php/fuel.php" method="post">
             <input type="date" class="form-control" name="date" id="date" placeholder="Выберите дату"><br>
             <input type="text" class="form-control" name="odometr" id="odometr" placeholder="Текущий пробег"><br>
             <input type="number" step="0.01" min="0.01" class="form-control" name="volume" id="volume" placeholder="Объем топлива"><br>
             <input  type="number" step="0.01" min="0.01" class="form-control" name="sum" id="sum" placeholder="Стоимость топлива"><br>

             <button class="btn btn-success"  type ="submit" >Добавить</button>
           </form>

            </div>

            <div class="table">
<!-- как подключить этот код в отдельном файле? -->
            <?php
            error_reporting(E_ALL);
            ini_set('display_errors', 'on');

            $link = mysqli_connect('s18.thehost.com.ua','admin','Auto2124','auto');
            mysqli_query($link, "SET NAMES 'utf8'");

            $query ="SELECT `date`, `odometr`, `volume`, `sum`, (`sum`/`volume`) AS price FROM fuel_data";
            $result = mysqli_query($link, $query) or die(mysqli_error($link));
            for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);

          
            ?>
           <table>
             <td>Data</td>
             <td>Одометр</td>
             <td>Пробег</td>
             <td>Объем</td>
             <td>Сумма</td>
             <td>Цена</td>
             <?php
             foreach ($data as $fuel_data) {
               ?>
               <tr>
                 <td><?= $fuel_data['date'] ?></td>
                 <td><?= $fuel_data['odometr'] ?></td>
                 <td></td>
                 <td><?= $fuel_data['volume'] ?></td>
                 <td><?= $fuel_data['sum'] ?></td>
                 <td><?= $fuel_data['price'] ?></td>
               </tr>
               <?php
             }
?>  
</table>


            </div>

         <?php endif; ?>

      </div>
  </div>

</body>
</html>
