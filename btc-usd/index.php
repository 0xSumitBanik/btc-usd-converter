<!DOCTYPE html>
<html>
<head>
    <meta charset = "utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php $title = "BTC-USD Converter";?>
    <title><?=$title?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="files/img/favicon.ico" type="image/gif" >
    <link rel="stylesheet" type="text/css" media="screen" href="files/css/custom.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="files/css/bootstrap/bootstrap.min.css" />
    <script src="files/js/jquery.js"></script>
    <script src="files/js/popper.min.js"></script>
    <script src="files/js/bootstrap/bootstrap.min.js"></script>
</head>
<body>
<?php 
    $url = 'https://api.coinmarketcap.com/v1/ticker/bitcoin/';
    $fgc = file_get_contents($url);
    $btcJSON = json_decode($fgc,TRUE);
    $btcToUSD = $btcJSON[0]['price_usd'];
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
<a class="navbar-brand" href="#"><?=$title?></a>
</nav>
    <div class="container converter-block">
        <h5>BTC: </h5><input class="form-control" title="Enter the amount in BTC" type="number" value="1" name="btc" id="btc"
         onchange="btcConvert();" onkeyup="btcConvert();"/><br>
         <h2 style="text-align:center;cursor:pointer;">&#8645;</h2>
        <h5>USD: </h5><input class="form-control"  title="Enter the amount in USD" type="number" value="<?php echo round($btcToUSD,2)?>" name="usd" id="usd"
        onchange="usdConvert();" onkeyup="usdConvert();" /><br>
        <button type="button" class="btn btn-dark btn-block btn-lg" onclick="btcConvert()">Convert</button>
    </div>
    <script>
        function btcConvert()
        {
            var btcInputPrice = document.getElementById("btc").value;
            var usdOutputPrice = (btcInputPrice* <?=$btcToUSD?>).toFixed(2);
            document.getElementById('usd').value = usdOutputPrice;
        }
        function usdConvert()
        {
            var usdInputPrice = document.getElementById("usd").value;
            var btcOutputPrice = ((1/<?=$btcToUSD?>)*usdInputPrice).toFixed(8);
            document.getElementById('btc').value = btcOutputPrice;
        }
    </script>
</body>
</html>    