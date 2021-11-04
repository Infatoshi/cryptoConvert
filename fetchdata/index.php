<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>




  <!-- trying to enter any usd or cad amount and convert to btc or eth -->



  <?php

  $url = "https://bitpay.com/api/rates";

  $json = file_get_contents($url);
  $data = json_decode($json, TRUE);


  $BTCrate = $data[0]["rate"];
  $ETHrate = $data[13]["rate"];
  // fix rates based on bitpay
  

// if USD 1.00 then CAD 1.25

  if (isset($_POST['submitConv'])) {

    $cadPrice = 1;     # Let cost be 1$
    $CAD_to_BTC_price = round($cadPrice / $BTCrate, 8);
    $CAD_to_ETH_price = round($cadPrice / $ETHrate, 8);
    $USD_to_BTC_price = round(($cadPrice * 0.8) / $BTCrate, 8);
    $USD_to_ETH_price = round(($cadPrice * 0.8) / $ETHrate, 8);
    // eth is at [13]



    $currOption = $_POST["currencyOptions"];
    $cryptoOption = $_POST['cryptoOptions'];

    if ($currOption == "typeCAD" && $cryptoOption == 'typeBTC') {

      
    } elseif ($currOption == "typeCAD" && $cryptoOption == 'typeETH') {

      
    } else if ($currOption == "typeUSD" && $cryptoOption == 'typeBTC') {

      
    } else if ($currOption == "typeUSD" && $cryptoOption == 'typeETH') {

      
    } else {

      echo 'Error with selection. Please try again.';
    }
  }


  ?>

  <ul>
    <li>Price: $<?= number_format($cadPrice, 2) ?> / <?= number_format($CAD_to_BTC_price, 8) ?> BTC
  </ul>

  <form method="POST">
    <select name="currencyOptions">
      <option value="typeCAD">Canadian Dollar</option>
      <option value="typeUSD">United States Dollar</option>
    </select>
    <br>
    <br>
    <select name="cryptoOptions">
      <option value="typeBTC">Bitcoin</option>
      <option value="typeETH">Ethereum</option>

    </select>
    <p><input type="submit" name="submitConv" value="Convert"></p>
  </form>






</body>

</html>