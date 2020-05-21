<?php
//print_r($_POST);die;
$time_start = microtime(true);

$oErrHandler = set_error_handler("userErrorHandler");
function userErrorHandler($errno,$errmsg,$filename,$linenum,$vars)
{
    $time=date("d M Y H:i:s");
    // Get the error type from the error number
    $errortype = array (1 => "Error",
        2 => "Warning",
        4 => "Parsing Error",
        8 => "Notice",
        16 => "Core Error",
        32 => "Core Warning",
        64 => "Compile Error",
        128 => "Compile Warning",
        256 => "User Error",
        512 => "User Warning",
        1024 => "User Notice");
    $errlevel=$errortype[$errno];

    //Write error to log file (CSV format)
    $oErrCSV=fopen("../logs/ionos_errors.csv","a");
    fputs($oErrCSV,"time:$time,file:$filename,line:$linenum,level:$errlevel,error:$errmsg\n");
    fclose($oErrCSV);

    if($errno!=2 && $errno!=8)
    {
        //Terminate script if fatal error
        die("A fatal error has occurred. Script execution has been aborted");
    }
}

use App\Kernel;
use Symfony\Component\ErrorHandler\Debug;
use Symfony\Component\HttpFoundation\Request;

require dirname(__DIR__).'/config/bootstrap.php';

if ($_SERVER['APP_DEBUG']) {
    umask(0000);

    Debug::enable();
}

if ($trustedProxies = $_SERVER['TRUSTED_PROXIES'] ?? $_ENV['TRUSTED_PROXIES'] ?? false) {
    Request::setTrustedProxies(explode(',', $trustedProxies), Request::HEADER_X_FORWARDED_ALL ^ Request::HEADER_X_FORWARDED_HOST);
}

if ($trustedHosts = $_SERVER['TRUSTED_HOSTS'] ?? $_ENV['TRUSTED_HOSTS'] ?? false) {
    Request::setTrustedHosts([$trustedHosts]);
}



$kernel = new Kernel($_SERVER['APP_ENV'], (bool) $_SERVER['APP_DEBUG']);
$request = Request::createFromGlobals();
//print_r(get_included_files());
//$execution_time = (microtime(true) - $time_start);
//echo "<b>Total Execution Time:</b> {$execution_time} secs"; die;
$response = $kernel->handle($request);
//print_r(get_included_files());
//$execution_time = (microtime(true) - $time_start);
//echo "<b>Total Execution Time:</b> {$execution_time} secs"; die;
$response->send();
$kernel->terminate($request, $response);
