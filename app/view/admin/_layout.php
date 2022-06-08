<?php use App\helpers\Func; ?>

<!doctype html>
<html lang="pt-pt">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.72.0">
  <title>Dashboard Admnin -   <?= APP_NAME ?>::<?=$this->e($title)?></title>

  <link rel="canonical" href="https://v5.getbootstrap.com/docs/5.0/examples/dashboard/">
    <link rel="shortcut icon" href="<?php Func::url("logo.ico") ?>" type="image/x-icon">
   <link rel="stylesheet" href="<?php Func::url("assets/bootstrap/css/bootstrap.min.css") ?>">
    <link rel="stylesheet" href="<?php Func::url("assets/fontawesome/all.css")?>">
    <link rel="stylesheet" href="<?php Func::url("assets/css/style.css")?>">
    <script src="<?php Func::url("assets/bootstrap/js/bootstrap.bundle.min.js")?>"> </script>
    <script src="<?php Func::url("assets/bootstrap/js/bootstrap.min.js")?>"> </script>
    <script src="<?php Func::url("assets/fontawesome/all.min.js")?>"> </script>

</head>

<body>

 <div id="app">

 <?= $this->section('content')?>

 </div>

  <?= $this->section("scripts"); ?>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.24.1/feather.min.js"
    integrity="sha384-EbSscX4STvYAC/DxHse8z5gEDaNiKAIGW+EpfzYTfQrgIlHywXXrM9SUIZ0BlyfF"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"
    integrity="sha384-i+dHPTzZw7YVZOx9lbH5l6lP74sLRtMtwN2XjVqjf3uAGAREAF4LMIUDTWEVs4LI"
    crossorigin="anonymous"></script>

  <script>
/* globals Chart:false, feather:false */

(function () {
    'use strict'
  
    feather.replace({ 'aria-hidden': 'true' })
  
    // Graphs
    var ctx = document.getElementById('myChart')
    // eslint-disable-next-line no-unused-vars
    var myChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: [
          'Sunday',
          'Monday',
          'Tuesday',
          'Wednesday',
          'Thursday',
          'Friday',
          'Saturday'
        ],
        datasets: [{
          data: [
            15339,
            21345,
            18483,
            24003,
            23489,
            24092,
            12034
          ],
          lineTension: 0,
          backgroundColor: 'transparent',
          borderColor: '#007bff',
          borderWidth: 4,
          pointBackgroundColor: '#007bff'
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: false
            }
          }]
        },
        legend: {
          display: false
        }
      }
    })
  })()
  

  </script>

</body>

</html>