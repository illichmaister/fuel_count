<?php
            error_reporting(E_ALL);
            ini_set('display_errors', 'on');

            $link = mysqli_connect('s18.thehost.com.ua','admin','Auto2124','auto');
            mysqli_query($link, "SET NAMES 'utf8'");

            $query ="SELECT `date`, `odometr`, `volume`, `sum`, (`sum`/`volume`) AS price FROM fuel_data";
            $result = mysqli_query($link, $query) or die(mysqli_error($link));
            for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);

          
            ?>