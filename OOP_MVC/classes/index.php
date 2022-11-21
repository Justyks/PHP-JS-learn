<?php

require_once 'Date.php';

$date=new Date('2025-12-31');

$date->subDay(3);
echo $date;