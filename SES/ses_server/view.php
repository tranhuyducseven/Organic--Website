 <?php
    require_once('database.php');
?>


 <?php
    $data = "";
    $data .= '<div class="card-body">
  <table class="table table-striped table-hover">
      <thead>
          <tr>
              <th scope="col">NO</th>
              <th scope="col">Message</th>
              <th scope="col">day</th>
              <th scope="col">time</th>
              
          </tr>
      </thead>
      <tbody> ';
    $sql = "SELECT * FROM msg_table";
    $result = executeResult($sql);
    $no = 1;
    foreach ($result as $row) {
        $data .= '
     <tr>
         <th scope="row">' . $no++ . '</th>
         <td class="data-cell">' . $row["msg"] . '</td>
         <td class="data-cell">' . $row["day"] . '</td>
         <td class="data-cell">' . $row["time"] . '</td>         
     </tr>';
    }
    $data .= '</tbody></table></div>';
    echo $data;
    ?>
   