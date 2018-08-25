<?php

$connection = new Mongo();

$db = $connection->eliesMongo;

$collection = $db->addresses;

$address = array(
"first_name" => "Peter",
"last_name" => "Parker",
"address" => "175 Fifth Ave",
"city" => "New York",
"state" => "NY",
"zip" => "10010"
);

$collection->insert($address);

$pp = $collection->findone( array(
'first_name' => 'Peter',
'last_name' => 'Parker'
) );

print_r($pp); 



?>

   Array ( 
           [_id] => MongoId Object ( 
                                     [$id] => 563f82c76780766fdd27ebe9 
                                   ) 
           [first_name] => Peter [
           last_name] => Parker 
           [address] => 175 Fifth Ave 
           [city] => New York 
           [state] => NY 
           [zip] => 10010 
         ) 
