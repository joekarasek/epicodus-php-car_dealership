<?php
class Car
{

    function worthBuying($max_price)
    {
        return $this->price < ($max_price + 100);
    }

    function __construct ($make_model,$price=100000,$miles=0)
    {
        $this->make_model = $make_model;
        $this->price = $price;
        $this->miles = $miles;
    }
}

$porsche = new Car("2014 Porsche 911", 114991, 7854);
$ford = new Car("2011 Ford F450", 55995, 14241);
$lexus = new Car("2013 Lexus RX 350", 44700, 20000);
$mercedes = new Car("Mercedes Benz CLS550", 39900, 37979);
$chevy = new Car("Chevy");
$geo = new Car("Geo", 2000);

$cars = array($porsche, $ford, $lexus, $mercedes, $chevy, $geo);

$cars_matching_search = array();

foreach ($cars as $car) {
    if ($car->worthBuying($_GET["price"])) {
        array_push($cars_matching_search, $car);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Your Car Dealership's Homepage</title>
</head>
<body>
    <h1>Your Car Dealership</h1>
    <ul>
        <?php
            foreach ($cars_matching_search as $car) {
                echo "<li> $car->make_model </li>";
                echo "<ul>";
                    echo "<li> $$car->price </li>";
                    echo "<li> Miles: $car->miles </li>";
                echo "</ul>";
            }
        ?>
    </ul>
</body>
</html>
