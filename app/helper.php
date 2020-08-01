<?php
function convertTime($time)
{
    $hour =intdiv($time, 60);
    $min = $time%60;
    $result = sprintf('%02d', $hour).":".sprintf('%02d', $min);
    return $result;
}

function convertHour($time)
{
    $result =intdiv($time, 60);
    return $result;
}

function convertRecord($time)
{
    $temp = explode(':', $time);
    $hour = $temp[0] * 60;
    $min = $temp[1];
    $result = $hour + $min;
    return $result;
}

function hideSome($i)
{
    if ($i > 4) {
        print 'hidden';
    }
}
