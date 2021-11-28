<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <style>
    .form-control {
      margin: 10px 0 20px;
    }


    .border-orange {
      border: 2px solid orange !important;
    }
  </style>
  <title>SES - Connect wifi</title>
</head>

<body>

  <div class="container" style="padding-top: 50px;">
    <div id="wifi" class="card" style="margin-bottom: 50px;">
      <div class="card-body">
        <h3 class="card-title" style="text-align: center; color: #333">
          Connect wifi
        </h3>
        <form method="post" id="wifi-form">
          <div class="form-group">
            <label>Wifi:</label>
            <input type="text" class="form-control" placeholder="Enter the name of the wifi" id="wifi">
          </div>
          <div class="form-group">
            <label>Password: </label>
            <input type="text" class="form-control" placeholder="Enter password of the wifi" id="password">
          </div>          
          <div id="connect-btn" class="btn btn-success" style="width:100px;margin-top:20px;">Connect</div>

        </form>
      </div>
    </div>
    

    <div class="card" id="table-info">
      <div class="card-body">
        <h3 id="table-heading" class="card-title" style="text-align: center">
          Management Message
        </h3>
      </div>

      <div style="padding-left: 20px; display:flex;justify-content:space-around;" class="car-body">
        <button type="submit" class="btn btn-warning mb-3" id="show-btn">Show the list of the messages</button>
        <button type="submit" class="btn btn-danger mb-3" id="clear-btn">Clear the messages</button>       

      </div>
      <div class="card-body" id="load-data">
      </div>
    </div>   
  </div>
  <script src="./main.js"> </script>

</body>

</html>