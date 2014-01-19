<?php

require '../../vendor/autoload.php';

$apiKey = '';
$lob = new \Lob\Lob($apiKey);

$address = $lob->addresses()->create(
array(
        'name'              => 'STANLEY ZHENG', // Required
        'address_line1'     => '1214 REDGATE AVE', // Required
        'address_line2'     => 'Unit E', // Optional
        'address_city'      => 'Norfolk', // Required
        'address_state'     => 'VA', // Required
        'address_country'   => 'US', // Required - Must be a 2 letter country short-name code (ISO 3316)
        'address_zip'       => '23507',// Required
    ));

?>
