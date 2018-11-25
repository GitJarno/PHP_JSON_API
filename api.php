<?php
header('Content-Type: application/json');
$url = 'products.json';
$data = file_get_contents($url); // Fetch JSON
$obj = json_decode($data); // Decode JSON into PHP Object array
$i = 0;

// Counts the amount of products
$total = count((array)$obj->Products);

// Check if any parameters were given
if (count($_GET) == 0) {
	for ($i = 0; $i < $total; $i++) {
		echoProducts($i, $obj);
	}
}
else {
	// Make the key and value of a parameter usable
	foreach($_GET as $a => $b) {
		$key = $a;
		$value = $b;
	}

	$paraInArray = (array_key_exists($key, $obj->Products[1]));
	if ($key == "max") { // Filter out products that are over the given limit
		priceCompare($value, $total, $obj, $i);
	}
	elseif ($paraInArray) { // Scan data for matching keys & values
    productScan($key, $value, $total, $obj, $i);
	}
	else { // Data doesn't contain the parameter
		echo "{$key} is an invalid parameter.";
	}
}

function productScan($key, $value, $total, $obj, $i)
{
	$counter = 0;
	for ($i = 0; $i < $total; $i++) {
		// Look through the data for matching keys & values
		if ($obj->Products[$i]->$key == $value) {
			$counter++;
			echoProducts($i, $obj);
		}
	}
	// if $counter didn't increment, there weren't any matches
  if ($counter == 0) {
		echo "There aren't any products thats {$key} is {$value}.";
	}
}

function priceCompare($max, $total, $obj, $i)
{
	$counter = 0;
	for ($i = 0; $i < $total; $i++) {
		$price = $obj->Products[$i]->price;
		$float = number_format((float)$price, 2, '.', '');
    
		// Go through prices and compare it to the given max price
		if ($float < $max) {
			$counter++;
			echoProducts($i, $obj);
		}
	}
	if ($counter == 0) {
		echo "There aren't any products that are priced lower than {$max}€.";
	}
}

// Function for printing products
function echoProducts($i, $obj)
{
	$price = $obj->Products[$i]->price;
	$floatPrice = number_format((float)$price, 2, '.', '');
	$products = <<<EOD
ID:       {$obj->Products[$i]->id}
Image:    {$obj->Products[$i]->imgUrl}
Name:     {$obj->Products[$i]->name}
Price:    {$floatPrice}€
Weight:   {$obj->Products[$i]->weight}g
Category: {$obj->Products[$i]->category} \n \n
EOD;
	echo $products;
}
?>
