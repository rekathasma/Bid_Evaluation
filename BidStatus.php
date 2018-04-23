
<html lang="en">
<head>
  <title>Bid Application Status</title>
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
<div class="jumbotron text-left">
  <h3>Bid Application Status</h3>
  
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="submittedbids-tab" data-toggle="tab" href="#submittedbids" role="tab" aria-controls="submittedbids" aria-selected="false">Submitted Bids</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pendingbids-tab" data-toggle="tab" href="#pendingbids" role="tab" aria-controls="pendingbids" aria-selected="false">Pending Bids</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="submittedbids" role="tabpanel" aria-labelledby="submittedbids-tab"><table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#Bid ID</th>
      <th scope="col">Title</th>
    </tr>
  </thead>
  <tbody >

    <tr>  
      <td><a href = ""> Bid12343546</a></td>  
      <td>Submitted bid 1</td>  
      <td><button type="button">View Status</button></td>
    </tr> 

    <tr>  
      <td><a href = ""> Bid12343546</a></td>  
      <td>Submitted bid 2</td>  
      <td><button type="button">View Status</button></td>
    </tr> 

    <tr>  
      <td><a href = ""> Bid12343546</a></td>  
      <td>Submitted bid 3</td>  
      <td><button type="button">View Status</button></td>
    </tr> 

    <tr>  
      <td><a href = ""> Bid12343546</a></td>  
      <td>Submitted bid 4</td>  
      <td><button type="button">View Status</button></td>
    </tr> 


  </tbody>
</table></div>
  <div class="tab-pane fade" id="pendingbids" role="tabpanel" aria-labelledby="pendingbids-tab"><table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#Bid ID</th>
      <th scope="col">Title</th>
    </tr>
  </thead>
  <tbody >
    <tr>  
      <td><a href = ""> Bid12343546</a></td>  
      <td>First Pending Application</td>  
      <td><button type="button">Edit Application</button></td>
    </tr> </tbody></table></div>
</div>
 </div>
</body>
</html>
