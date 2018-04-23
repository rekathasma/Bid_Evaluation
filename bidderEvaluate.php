<?php
   include("dbconfig.php");
      $id = mysqli_real_escape_string($connect,$_GET['id']);
    $query = "SELECT id, title from bid where id = '$id'";
  $bid_result = mysqli_query($connect, $query);
    
    $eval_status = "select * from eval_status order by id asc";
    $eval_result = mysqli_query($connect, $eval_status);
        
 $tab_menu = '';
$tab_content = '';
$i = 0;
while($row = mysqli_fetch_array($eval_result))
{
 if($i == 0)
 {
  $tab_menu .= '
   <li class="nav-item active"><a class="nav-link active" href="#'.$row["description"].'" data-toggle="tab">'.$row["description"].'</a></li>
  ';
  $tab_content .= '
   <div id="'.$row["description"].'" class="tab-pane fade show active"><table class="table table-hover">  
                          <tr>  
                               <th >id</th>  
                               <th >firstname</th>  
                               <th >lastname</th>  
                               <th >email</th>  
                               <th >submitted date</th>  
                          </tr>  
  ';
 }
 else
 {
  $tab_menu .= '
   <li class="nav-item"><a class="nav-link" href="#'.$row["description"].'" data-toggle="tab">'.$row["description"].'</a></li>
  ';
  $tab_content .= '
   <div id="'.$row["description"].'" class="tab-pane fade"><table class="table table-hover">  
                          <tr>  
                               <th >id</th>  
                               <th >firstname</th>  
                               <th >lastname</th>  
                               <th >email</th>  
                               <th >submitted date</th>   
                          </tr>  
  ';
 }
 $bidder_query = "SELECT b.id, b.firstname, b.lastname, b.email, bt.date_submtd, bt.eval_status FROM bid_transactions bt,  bidder b where b.id=bt.bidder_id and bt.bid_id ='$id' and bt.eval_status = '".$row["description"]."' group by b.id ";
 $bidder_result = mysqli_query($connect, $bidder_query);
 while($sub_row = mysqli_fetch_array($bidder_result))
 {
  if ($row["description"] == "Rejected"){
    $tab_content .= '
  <tr >  
                      <td>'.$sub_row["id"].'</td>  
                      <td>'.$sub_row["firstname"].'</td>  
                      <td>'.$sub_row["lastname"].'</td> 
                      <td>'.$sub_row["email"].'</td> 
                      <td>'.$sub_row["date_submtd"].'</td> 
                  </tr> ';
  }else {

  $tab_content .= '
  <tr class="clickable-row" data-href="bidderEvaluation1.php?bidder_id='.$sub_row["id"].'&bid_id='.$_GET['id'].'">  
                      <td>'.$sub_row["id"].'</td>  
                      <td>'.$sub_row["firstname"].'</td>  
                      <td>'.$sub_row["lastname"].'</td> 
                      <td>'.$sub_row["email"].'</td> 
                      <td>'.$sub_row["date_submtd"].'</td> 
                  </tr>';
                }
 }

 $tab_content .= '</table><div style="clear:both"></div></div>';
  $i++;
 
}
?>


<html lang="en">
<head>
  <title>Bidder Evaluation</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <link rel="stylesheet" type="text/css" href="topnav.css">
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

  <?php
  while($bid = mysqli_fetch_array($bid_result))
            {
       echo '   <h3>Bid : '.$bid["id"].'</h3>
                <h3>Title : '.$bid["title"].'</h3>  
            ';
          }
    ?>
  </div>
  <div class="container-fluid" id="heading">
   <ul class="nav nav-tabs">
   <?php
   echo $tab_menu;
   ?>
   </ul>
   <div class="tab-content">
                  
      <?php
   echo $tab_content;
   ?>
   </div>
</div>
</div>
</body>
</html>
