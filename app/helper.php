<?php
function convertTime($time)
{
    $hour =intdiv($time, 60);
    $min = $time%60;
    $result = sprintf('%02d', $hour).":".sprintf('%02d', $min);
    return $result;
}

function hideSome($i)
{
    if ($i > 4) {
        print 'hidden';
    }
}
