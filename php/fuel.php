<?php
$date = filter_var(trim($_POST['date']),FILTER_SANITIZE_STRING);
$odometr = filter_var(trim($_POST['odometr']),FILTER_SANITIZE_NUMBER_INT);
$volume = filter_var(trim($_POST['volume']),FILTER_SANITIZE_NUMBER_FLOAT);
$sum = filter_var(trim($_POST['sum']),FILTER_SANITIZE_NUMBER_FLOAT);

if (mb_strlen($date)<1 )
  {
  echo "Укажите дату";
  exit;
  }
else if (mb_strlen($odometr)<1 )
  {
  echo "Укажите показание одометра";
  exit;
  }
  else if (mb_strlen($volume)<1 )
    {
    echo "Укажите объем заправленного топлива";
    exit;
    }
  else if (mb_strlen($sum)<1 )
    {
    echo "Укажите сумму, грн.";
    exit;
    }


$mysql = new mysqli('s18.thehost.com.ua','admin','Auto2124','auto');

$mysql->query("INSERT INTO `fuel_data` ( `date`, `odometr`, `volume`, `sum`) VALUES ('$date', '$odometr', '$volume', '$sum')") ;


$mysql->close();
header('location: /' );

?>