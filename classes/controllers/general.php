<?php

function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'second',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}



function sanitizer($data) {
    global $dbcon;
    //$data =$dbcon->quote($data);
    $data = htmlentities($data);
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


function dateParseFromFormat($stFormat, $stData)
{
    $aDataRet = array();
    $aPieces = split('[:/.\ \-]', $stFormat);
    $aDatePart = split('[:/.\ \-]', $stData);
    foreach($aPieces as $key=>$chPiece)   
    {
        switch ($chPiece)
        {
            case 'd':
            case 'j':
                $aDataRet['day'] = $aDatePart[$key];
                break;
               
            case 'F':
            case 'M':
            case 'm':
            case 'n':
                $aDataRet['month'] = $aDatePart[$key];
                break;
               
            case 'o':
            case 'Y':
            case 'y':
                $aDataRet['year'] = $aDatePart[$key];
                break;
           
            case 'g':
            case 'G':
            case 'h':
            case 'H':
                $aDataRet['hour'] = $aDatePart[$key];
                break;   
               
            case 'i':
                $aDataRet['minute'] = $aDatePart[$key];
                break;
               
            case 's':
                $aDataRet['second'] = $aDatePart[$key];
                break;           
        }
       
    }
    return $aDataRet;
}


function FunctionName($value='')
{
    # code...
}

