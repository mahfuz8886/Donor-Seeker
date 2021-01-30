<?php
  include("connection.php");  
?>

<!DOCTYPE html>
<html>
<head>
          <title>Login</title>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link rel="stylesheet" type="text/css" href="css/app.css">
          <! Link For Font Awesome>
          <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
             <h4 style="text-align: center;">Today's Blood Donation Infos</h4>
                  <table class="table table-striped" style="text-align: center;">
                    <tr>
                      <th scope="col">Sl.</th>
                      <th scope="col">Division</th>
                      <th scope="col">Total</th>
                    </tr>
                    <?php
                        $query = mysqli_query($connection , "SELECT * FROM division_infos ORDER BY Division ASC");
                        $i = 0;
                        $date = date("Y-m-d");
                        while($row = mysqli_fetch_array($query))
                        {
                          $division = $row['Division'];
                          $sql = mysqli_query($connection , "SELECT `Division` , COUNT(*) AS total FROM donation_infos WHERE `Division` = '$division' AND `Last_donate`  = '$date'");
                          $row2 = mysqli_fetch_array($sql);
                          $total = $row2['total'];
                          ?>
                          <tr>
                            <td>
                              <?php echo $i = $i + 1; ?>
                            </td>
                            <td>
                              <?php echo $division; ?>
                            </td>
                            <td>
                              <?php echo $total; ?>
                            </td>
                          </tr>
                    <?php
                        }
                    ?>
                  </table>
        </div>
    </div>
</div>
</body>
</html>