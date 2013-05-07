<?php
error_reporting(-1);
ini_set('display_errors', true);
ini_set('mysql.connect_timeout', 300);
ini_set('default_socket_timeout', 300);
ini_set('soap.wsdl_cached_enabled', 0);

set_time_limit(0);

define("SERVER", "localhost");
define("USERNAME", "root");
define("PASSWORD", "dax");
define("DBNAME", "vacation_roost");
define("VACATIONROOST_API_USERNAME", "vacation20");
define("VACATIONROOST_API_PASSWORD", "7S8dn!*9");
define("VACATIONROOST_API_URL", "https://otaservice.vacationroost.com:8088/DataReceiverService.asmx?wsdl");

$link = $db = null;

function connectDB() {
    global $link, $db;

    $link = mysql_connect(SERVER, USERNAME, PASSWORD, true);
    $db = mysql_select_db(DBNAME, $link);
}

function getResults($params, $method, $resultset) {
    $client = new SoapClient(VACATIONROOST_API_URL, array(
        'soap_version'  => SOAP_1_2,
        'cache_wsdl'    => WSDL_CACHE_NONE,
        'use'           => SOAP_LITERAL,
        'style'         => SOAP_DOCUMENT,
        'user_agent'    => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.7; rv:13.0) Gecko/20100101 Firefox/13.0.1',
        'connection_timeout' => 120
    ));

    $headers = new SoapHeader('http://VacationRoost.GatewayServices.DataReceiverService', 'AuthHeader', array(
        'UserName' => VACATIONROOST_API_USERNAME,
        'Password' => VACATIONROOST_API_PASSWORD
    ));

    $client->__setSoapHeaders(array($headers));

    $result = $client->{$method}($params);

    $output = $result->{$resultset};

    return $output;
}

function getSuppliers() {
    global $link;

    $params = array(
        //'extractType' => "STANDARD",
        'gatewayProviderType' => "",
        'supplierId' => "",
        'sendSupplierIdsOnly' => true,
        //'rentalUnitId' => "" // empty string to get all rentalUnitIds
    );

    $result = getResults($params, 'GetValidRentalUnitIdsForExtract', 'GetValidRentalUnitIdsForExtractResult');

    if($result != null) {
        $values = array();
        foreach($result->long as $row) {
            $values[] = "(".mysql_real_escape_string($row) .")";
        }

        $query = "INSERT IGNORE INTO suppliers (supplier_id) VALUES". implode(',', $values);
        mysql_query($query, $link) or die(mysql_error());
    }
}

function getRentalUnitDetail($rental_id) {
    connectDB();

    global $link;

    $params = array(
                'extractType' => 'STANDARD',
                'gatewayProviderType' => '',
                'supplierId' => '',
                'rentalUnitId' => $rental_id
            );

    $result = getResults($params, 'DataExtract', 'DataExtractResult');

    $query = "INSERT IGNORE INTO rental_units (rental_unit_id, content) VALUES(". $rental_id.", '" . mysql_real_escape_string($result) . "')";

    mysql_query($query, $link) or die(mysql_error());

    exit("Property ID $rental_id data retrieval completed \n");
}

function getRentalUnits() {
    global $link;

    $query = "SELECT * FROM suppliers";
    $supplier_result = mysql_query($query, $link);

    while($row = mysql_fetch_assoc($supplier_result)) {
        $params = array(
            'gatewayProviderType' => "",
            'supplierId' => $row['supplier_id'],
            'sendSupplierIdsOnly' => false,
        );

        $result = getResults($params, 'GetValidRentalUnitIdsForExtract', 'GetValidRentalUnitIdsForExtractResult');

        if($result != null) {
            //foreach($result->long as $row) {
            foreach(array(99029, 65942) as $row) {
                $pid = pcntl_fork();

                if (!$pid) {
                    sleep(1);

                    print "Fetching Property ID $row\n";

                    getRentalUnitDetail($row);
                }
            }
        }

        exit();
    }
}

connectDB();

getRentalUnits();
?>