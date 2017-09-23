<?php

include('home_start.php');

$products_id = input($_GET['products_id']);

$data = $xtemplate->load('chartRating');
;

$Product = new Product();

$rate = $Product->calculationRate($products_id);

$n = count($rate);

$arrRate = array();

for ($i = 0; $i < 10; $i++) {
    $arrRate[$i] = 0;

    for ($j = 0; $j < $n; $j++) {

        if ($rate[$j]['rate'] == $i + 1) {

            $arrRate[$i] = $rate[$j]['total'];
            break;
        }
    }
}

$totalvote = 0;

for ($j = 0; $j < $n; $j++) {

    $totalvote += $rate[$j]['total'];
}



$arrW = array();

$arrPer = array();

$arrVote = array();

for ($i = 0; $i < 10; $i++) {

    $p = round($arrRate[$i] / $totalvote, 5);

    $arrVote[$i] = $arrRate[$i];

    $arrPer[$i] = $p * 100;

    $arrW[$i] = $p * 240;
}

$data = $xtemplate->replace($data, array(
    'all' => $totalvote,
    'width1' => $arrW[0],
    'width2' => $arrW[1],
    'width3' => $arrW[2],
    'width4' => $arrW[3],
    'width5' => $arrW[4],
    'width6' => $arrW[5],
    'width7' => $arrW[6],
    'width8' => $arrW[7],
    'width9' => $arrW[8],
    'width10' => $arrW[9],
    'per1' => $arrPer[0],
    'per2' => $arrPer[1],
    'per3' => $arrPer[2],
    'per4' => $arrPer[3],
    'per5' => $arrPer[4],
    'per6' => $arrPer[5],
    'per7' => $arrPer[6],
    'per8' => $arrPer[7],
    'per9' => $arrPer[8],
    'per10' => $arrPer[9],
    'vote1' => $arrVote[0],
    'vote2' => $arrVote[1],
    'vote3' => $arrVote[2],
    'vote4' => $arrVote[3],
    'vote5' => $arrVote[4],
    'vote6' => $arrVote[5],
    'vote7' => $arrVote[6],
    'vote8' => $arrVote[7],
    'vote9' => $arrVote[8],
    'vote10' => $arrVote[9],
        ));

echo $data;
?>

