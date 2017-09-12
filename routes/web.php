<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use aerows\Models;

Route::get('/padron/{cuil}', 'AerolineasController@index');
Route::get('/info',function (){ echo phpinfo(); });
Route::get('/prueba', function() {
    $serverName = "192.168.0.244";
    $connectionOptions = array(
        "Database" => "Liquidacion",
        "Uid" => "laravelLiqUser",
        "PWD" => "pasca1901goula"
    );
//Establishes the connection
    $conn = sqlsrv_connect( $serverName, $connectionOptions );
    if( $conn === false ) {
        die( FormatErrors( sqlsrv_errors()));
    }
//Select Query
    $tsql= "SELECT @@Version as SQL_VERSION";
//Executes the query
    $getResults= sqlsrv_query( $conn, $tsql );
//Error handling

    if ( $getResults == FALSE )
        die( FormatErrors( sqlsrv_errors()));
    ?>
    <h1> Results : </h1>
    <?php
    while ( $row = sqlsrv_fetch_array( $getResults, SQLSRV_FETCH_ASSOC )) {
        echo ( $row['SQL_VERSION']);
        echo ("<br/>");
    }
    sqlsrv_free_stmt( $getResults );
    function FormatErrors( $errors )
    {
        /* Display errors. */
        echo "Error information: <br/>";

        foreach ( $errors as $error )
        {
            echo "SQLSTATE: ".$error['SQLSTATE']."<br/>";
            echo "Code: ".$error['code']."<br/>";
            echo "Message: ".$error['message']."<br/>";
        }
    }
});