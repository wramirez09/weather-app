<html>
<head>
<?php 
include('header.php'); ?>

</head>
<body>

<div class="container bg">

<?php

$woeid = $_SESSION['number'];
$doc = new DOMDocument();
$url = "http://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20weather.forecast%20where%20woeid%3D$woeid&diagnostics=true";
$doc->load($url);

    $channel = $doc->getElementsByTagName("channel");
        foreach($channel as $chnl){
        $item = $chnl->getElementsByTagName("item");
            foreach($item as $itemgotten){

                if($itemgotten){
                    echo "<div class='big'>";
                    echo "<p class='lead'>".$itemgotten->getElementsByTagNameNS(
                    "http://xml.weather.yahoo.com/ns/rss/1.0","condition")->item(0)->getAttribute("text")." ";
                    echo "<span class='small'>".$itemgotten->getElementsByTagNameNS("http://xml.weather.yahoo.com/ns/rss/1.0","condition")->item(0)->getAttribute("temp")."&deg; F</span></p>";
                    echo $chnl->getElementsByTagNameNS("http://xml.weather.yahoo.com/ns/rss/1.0","forecast")->item(0)->getAttribute("code")."</p>";
                    echo "</div>"; // end big
                    echo "<div class='medium_box'>";
                    echo "<p class='lead'>".$chnl->getElementsByTagNameNS(
                    "http://xml.weather.yahoo.com/ns/rss/1.0","location")->item(0)->
                    getAttribute("city").", ";
                    echo $chnl->getElementsByTagNameNS(
                    "http://xml.weather.yahoo.com/ns/rss/1.0","location")->item(0)->
                    getAttribute("region")."</p>";
                    echo "<p class='small'>".$chnl->getElementsByTagNameNS(
                    "http://xml.weather.yahoo.com/ns/rss/1.0","forecast")->item(0)->
                    getAttribute("day").", ";
                    echo $chnl->getElementsByTagNameNS(
                    "http://xml.weather.yahoo.com/ns/rss/1.0","forecast")->item(0)->
                    getAttribute("date")."</p>";
                    echo "</div>"; // medium box location and date

                }

                else{
                    echo "<h1>there was an error<h2>";
                }
        }
    }


?>

</body>
</html>