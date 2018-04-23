<?php
   include("dbconfig.php");
  $sql = "SELECT a.id, a.title, count(*) cnt, a.dt_modified  FROM bid_transactions bt, bid a where a.id=bt.bid_id group by a.id";
  $result = mysqli_query($connect, $sql);
   ?>
<html lang="en">
<head>
  <title>Bid Evaluator</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="topnav.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript">
  	jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
});  	
  </script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
 <div id="wrapper" class="container">
  <div class="container-fluid" id="header">
      <img src="download.png" height="45">
    </div>
 <div class="container-fluid" id="heading">
  <h2>Bid Opportunities Evaluator</h2>
  
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Ready to Evaluate</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Under Evaluation</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Awarded</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"><table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Solicitiation Title</th>
      <th scope="col">No of applications</th>
      <th scope="col">Last Updated</th>
    </tr>
  </thead>
<tbody >
 <?php

            while($row = mysqli_fetch_array($result))
            {
                echo '  
                               <tr class="clickable-row" data-href="bidderEvaluate.php?id='.$row["id"].'">  
                                    <td>'.$row["id"].'</td>  
                                    <td>'.$row["title"].'</td>  
                                    <td>'.$row["cnt"].'</td> 
                                    <td>'.$row["dt_modified"].'</td>
                               </tr>  
                               ';
            }
            ?>  
  
    <!-- <tr class='clickable-row' data-href='bidderEvaluate.php'>
      <th scope="row">Bid A</th>
      <td>Bidding Test 1</td>
      <td>3</td>
      <td>3/11/2018</td>
    </tr>
    <tr>
      <th scope="row">Bid B</th>
      <td>Bidding Test 2</td>
      <td>12</td>
      <td>3/11/2018</td>
    </tr>
    <tr>
      <th scope="row">Bid C</th>
      <td>Bidding Test 3</td>
      <td>20</td>
      <td>3/11/2018</td>
    </tr> -->
  </tbody>
</table></div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
</div>
 </div>
</div>
</body>
</html>
