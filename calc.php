<?php
  require "includes/config.php";
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- My CSS -->
    <link rel="stylesheet" href="style/articlecss.css">


    <title><?php echo $config['title']?></title>
  </head>
  <body>
    <div class="wrapper">
    <header>
      <?php include "header.php"; ?>   
    </header>
      <div class="group clearfix">
        <div class="container-fluid">
          <div class="inner__article col-lg-8">
              <h3 class="text-wrap">Weekly hours calculator v1</h3><br>
              <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Calc_v1</title>
</head>
<body>
    <form action='calc.php#result' method='POST'>
        <h6 class="col-auto">Until 04/18</h6>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12-sm text-nowrap d-lg-none d-xl-block d-md-none d-lg-block">
                <h5>From | Till | Weekly hours</h5>
                </div>
                <div class="col-2-sm">
                <input class="calc" type="date" name="M1"><input class="calc" type="date" name="M2"><input class="calcWH" type="number" name="H1">
                </div>
                </div>
                <div class="row">
                <div class="col-2-sm">
                <input class="calc" type="date" name="M3"><input class="calc" type="date" name="M4"><input class="calcWH" type="number" name="H2">
                </div>
                </div>
                <div class="row">
                <div class="col-2-sm">
                <input class="calc" type="date" name="M5"><input class="calc" type="date" name="M6"><input class="calcWH" type="number" name="H3">
                </div>
                </div>
                <div class="row">
                <div class="col-2-sm">
                <input class="calc" type="date" name="M7"><input class="calc" type="date" name="M8"><input class="calcWH" type="number" name="H4">
                </div>  
                </div>
        </div>

<br><hr>

        <h6 class="col-auto"  id='result' >After 04/18</h6>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm">
                <input class="calc" type="date" name="N1"><input class="calc" type="date" name="N2"><input class="calc" type="number" name="H5">
                </div>
                <div class="col-sm">
                <input class="calc" type="date" name="N3"><input class="calc" type="date" name="N4"><input class="calc" type="number" name="H6">
                </div>
                <div class="col-sm">
                <input class="calc" type="date" name="N5"><input class="calc" type="date" name="N6"><input class="calc" type="number" name="H7">
                </div>
                <div class="col-sm">
                <input class="calc" type="date" name="N7"><input class="calc" type="date" name="N8"><input class="calc" type="number" name="H8">
                </div>
            </div>
        </div><br>
                <input class='col-sm-7 btn btn-success' type="submit" value='Submit' name='submit'>
    </form>
    <?php

        if(isset($_POST['submit'])){
            function caltill4($D,$D1,$H){
                $ts1=strtotime($D);
                $ts2=strtotime($D1);

                $year1 = date('Y', $ts1);
                $year2 = date('Y', $ts2);

                $month1 = date('m', $ts1);
                $month2 = date('m', $ts2);

                $day1 = date('d',$ts1);
                $day2 = date('d',$ts2);

                if($day2 > ($day1+15)){
                    $monthnew2=$month2+1;
                }else{
                    $monthnew2=$month2;
                }

                if($year2-$year1 >= 1){
                    $months=(($year2-$year1)*12)+($monthnew2-$month1);
                    @$hours=((42-$H)/42);
                }
                if($year2-$year1 < 1){
                    $months=($monthnew2-$month1);
                    @$hours=((42-$H)/42);
                }

                return [
                    $months,$hours
                ];
            }

            function calafter4($D,$D1,$H){
                $ts1=strtotime($D);
                $ts2=strtotime($D1);

                $year1 = date('Y', $ts1);
                $year2 = date('Y', $ts2);

                $month1 = date('m', $ts1);
                $month2 = date('m', $ts2);

                $day1 = date('d',$ts1);
                $day2 = date('d',$ts2);

                if($day2 > ($day1+15)){
                    $monthnew2=$month2+1;
                }else{
                    $monthnew2=$month2;
                }

                if($year2-$year1 >= 1){
                    $months=(($year2-$year1)*12)+($monthnew2-$month1);
                    @$hours=((43-$H)/43);
                }
                if($year2-$year1 < 1){
                    $months=($monthnew2-$month1);
                    @$hours=((43-$H)/43);
                }

                return [
                   $months,$hours
                ];
            }
            #First Line
            if(!empty($_POST['M1'])){
                $L1 = caltill4($_POST['M1'],$_POST['M2'],$_POST['H1']);
                $m1 = $L1['0'];
                $h1 = $L1['1']; 
            }
            else{
                $m1 = 0;
                $h1 = 0;
            }

            #Second Line
            if(!empty($_POST['M3'])){
                $L2=caltill4($_POST['M3'],$_POST['M4'],$_POST['H2']);
                $m2 = $L2['0'];
                $h2 = $L2['1']; 
            }
            else{
                $m2 = 0;
                $h2 = 0;
            }

            #Third Line
            if(!empty($_POST['M5'])){
                $L3=caltill4($_POST['M5'],$_POST['M6'],$_POST['H3']);
                $m3 = $L3['0'];
                $h3 = $L3['1']; 
            }
            else{
                $m3 = 0;
                $h3 = 0;
            }

            #Forth Line
            if(!empty($_POST['M7'])){
                $L4=caltill4($_POST['M7'],$_POST['M8'],$_POST['H4']);
                $m4 = $L4['0'];
                $h4 = $L4['1']; 
            }
            else{
                $m4 = 0;
                $h4 = 0;
            }

            #Fifth Line
            if(!empty($_POST['N1'])){
                $L5=calafter4($_POST['N1'],$_POST['N2'],$_POST['H5']);
                $m5 = $L5['0'];
                $h5 = $L5['1']; 
            }
            else{
                $m5 = 0;
                $h5 = 0;
            }

            #Sixt Line
            if(!empty($_POST['N3'])){
                $L6=calafter4($_POST['N3'],$_POST['N4'],$_POST['H6']);
                $m6 = $L6['0'];
                $h6 = $L6['1']; 
            }
            else{
                $m6 = 0;
                $h6 = 0;
            }

            #Seventh Line
            if(!empty($_POST['N5'])){
                $L7=calafter4($_POST['N5'],$_POST['N6'],$_POST['H7']);
                $m7 = $L7['0'];
                $h7 = $L7['1']; 
            }
            else{
                $m7 = 0;
                $h7 = 0;
            }

            #Eight Line
            if(!empty($_POST['N3'])){
                $L8=calafter4($_POST['N7'],$_POST['N8'],$_POST['H8']);
                $m8 = $L8['0'];
                $h8 = $L8['1']; 
            }
            else{
                $m8 = 0;
                $h8 = 0;
            }

            @$resultfam=((($m1*$h1)+($m2*$h2)+($m3*$h3)+($m4*$h4)+($m5*$h5)+($m6*$h6)+($m7*$h7)+($m8*$h8))/($m1+$m2+$m3+$m4+$m5+$m6+$m7+$m8))*100;
            $resultfirm=100-$resultfam;
            echo "<hr><div span style='color:#037bfc; font-weight:bold; font-size:25px;'> חלק של המשפחה בתשלום הוא  ".round($resultfam, $precision = 1)."% <br><br> חלק של החברה בתשלום הינו  ".round($resultfirm, $precision=1)."% </div>";
        }
        
    ?>
</body>
</html>
            </div>
          </div>
          <div class="sidebar col-lg-4">
            <?php include "includes/sidebar.php";?>
          </div>
        </div>
      </div>  
      <?php include 'includes/footer.php'; ?>
    </div>  
  </body>
</html>
