<?php
   include("dbconfig.php");
      $bid_id = mysqli_real_escape_string($connect,$_GET['bid_id']);
      $bidder_id = mysqli_real_escape_string($connect,$_GET['bidder_id']);
    
    $sql ="SELECT b.id, b.firstname, b.lastname, b.email, b.lastupdated, bt.eval_status FROM bid_transactions bt,  bidder b where b.id='$bidder_id' and bt.bid_id ='$bid_id' and b.id=bt.bidder_id";
    // $sql = "SELECT b.id, b.firstname, b.lastname, b.email, b.lastupdated FROM bidder b where b.id ='$bidder_id'";
   
  $result = mysqli_query($connect, $sql);

  $query = "SELECT id, title from bid where id = '$bid_id'";
  $bid_result = mysqli_query($connect, $query);
  
   ?>
<html lang="en">
<head>
  <title>Bidder Evaluation</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="topnav.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script src="bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript">
  	jQuery(document).ready(function($) {
    $(".btn-success").click(function() {
        //window.location = "bidderEvaluate.php";
        //$(location).attr('href', 'bidderEvaluate.php#profile');
        $('#demoModal').modal('show');
    });
     $(".btn-primary").click(function() {
        //window.location = "bidderEvaluate.php";
        <?php
          $usql = "UPDATE bid_transactions SET eval_status='Accepted' WHERE bidder_id='$bidder_id' and bid_id = '$bid_id'";

          mysqli_query($connect, $usql);

        ?>
        $(location).attr('href', 'bidderEvaluate.php?id=1');
        //$('#demoModal').modal('show');
    });
});  	
    $('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('New message to ' + recipient)
  modal.find('.modal-body input').val(recipient)
}); 

  </script>
 
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
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Details</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Documents</a>
  </li>
  </ul>
<div class="tab-content" id="myTabContent">
  <form action="" method="POST" id="myForm">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
    <?php
  while($row = mysqli_fetch_array($result))
  {
       echo '   
       <p>
      Name : '.$row["firstname"].'  '.$row["lastname"].' <br>
      Email: '.$row["email"].'</p>
       
            ';
          
          if ($row["eval_status"]=="Submitted")
          {
            echo '
              <button type="button" class="btn btn-success">Accept</button>
              <button type="button" class="btn btn-danger">Reject</button>
              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Send Clarification</button>
    ';
  }
    else {

      echo ' <button type="button" class="btn btn-info" data-toggle="modal" data-target="#scoreModal" data-whatever="@mdo">Click here to enter Score</button>';
    }
          }
    ?>     
   
    <?php 
    echo '
    <a class="btn btn-link" href="bidderEvaluate.php?id='.$_GET['bid_id'].' " role="button">Cancel</a>
    ';
    ?>
  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
  
 </div>
</form>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="scoreModal" tabindex="-1" role="dialog" aria-labelledby="scoreModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="scoreModalLabel">Score</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Score:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Bid Amount:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Comments:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save Score</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="demoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Accept Bidder</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
             <span aria-hidden="true">&times;</span>
          </button>
      </div>
  <div class="modal-body">
     <h5 class="modal-title" id="myModalLabel">Are you sure, you want to accept this bidder?</h5>
  </div>
  <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <button type="button" class="btn btn-primary">Save changes</button>
  </div>
</div>
</div>
</body>
</html>
