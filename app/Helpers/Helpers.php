<?php
// use NumeroALetras\NumeroALetras;

use Luecano\NumeroALetras\NumeroALetras;
use GeoIp2\Database\Reader;

function changeFormatDateApp($fecha)
{
    if ($fecha) {
        $fecha = new \Carbon\Carbon($fecha);
    }
    return $fecha;
}

function currency($var)
{
    return '$ ' . number_format($var, 2);
}

function zerosNumber($data)
{
    if ($data) {
        return str_pad($data, 8, "0", STR_PAD_LEFT);
    }
}


function percentageApp($amount, $percentage)
{
    $calc = ($amount * $percentage) / 100;
    return $calc;
}

function getDateForMonthApp($date, $month)
{
    if ($month) {
        return changeFormatDateApp($date)->addMonths($month)->isoFormat('DD [de] MMMM [de] YYYY');
    }
}
function getNumberToLettersApp($number)
{
    if ($number) {
        $letters = new NumeroALetras();
        return $letters->toWords($number, 2);
    }
}

function toFixed($number, $dec_length)
{
    $pos = strpos($number . '', ".");
    if ($pos > 0) {
        $int_str = substr($number, 0, $pos);
        $dec_str = substr($number, $pos + 1);
        if (strlen($dec_str) > $dec_length) {
            return $int_str . ($dec_length > 0 ? '.' : '') . substr($dec_str, 0, $dec_length);
        } else {
            return $number;
        }
    } else {
        return $number;
    }
}

function getIpCountry($ipAddress)
{

    $databaseFile = base_path('Geo/GeoLite2-Country.mmdb');

    // Cargar la base de datos de GeoIP2
    $reader = new Reader($databaseFile);

    try {
        // Obtener información de la dirección IP
        $record = $reader->country($ipAddress);
        $country = $record->country->name;
        return  $country; //Pais
    } catch (Exception $e) {
        // return 'Error: ' . $e->getMessage();
        return null;
    }
}

function  extHtml($texto)
{
    $patron = '/<[^>]*>/';
    $contenidoTexto = preg_replace($patron, '', $texto);
    return  $contenidoTexto;
}
function str_limit($value, $limit = 100, $end = '...'){
    if (mb_strwidth($value, 'UTF-8') <= $limit) {
            return $value;
    }
    return rtrim(mb_strimwidth($value, 0, $limit, '', 'UTF-8')).$end;
}