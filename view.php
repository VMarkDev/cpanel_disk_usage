<?php
  include("disk.php");
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Disk Usage</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="well container" style="background-color: #fff; max-width: 700px">
      <p class=MsoNormal align=center style='text-align:center'>
       <b><span style='font-size:18.0pt;line-height:107%'>Disk Usage</span></b>
      </p>
      <center>
        <div class="progress">
          <div class="progress-bar 
            <?if($porciento<=25){echo 'progress-bar-success';}
              if($porciento<=50 && $porciento>25){echo 'progress-bar-info';}
              if($porciento<=75 && $porciento>50){echo 'progress-bar-warning';}
              if($porciento<=100 && $porciento>75){echo 'progress-bar-danger';}
            ?>" role="progressbar" aria-valuenow="<?echo $porciento;?>" aria-valuemin="0" aria-valuemax="100"
             style="width: <?echo $porciento;?>%">
          </div>
         </div>
          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <label for="usr">Total</label>
                <p><?echo $totalmb;?> MB</p>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
              <label for="usr">Consumido</label>
              <p><?echo $usadomb;?> MB</p>
            </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
              <label for="usr">Restante</label>
              <p><?echo $diferenciamb;?> MB</p>
            </div>
          </div>
        </div>
      </center>
    </div>
  </body>
</html>
