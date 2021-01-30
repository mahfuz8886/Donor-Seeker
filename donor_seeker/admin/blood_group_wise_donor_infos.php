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
             <h4 style="text-align: center;">Blood Group Wise Donor Infos</h4>
                  <table class="table table-striped" style="text-align: center;">
                    <tr>
                      <th scope="col">Sl.</th>
                      <th scope="col">Blood Group</th>
                      <th scope="col">Total</th>
                    </tr>
                    <?php
                        $query = mysqli_query($connection , "SELECT Blood_Group , COUNT(*) AS total FROM donor_infos GROUP BY Blood_Group");
                        $i = 0;
                        while($row = mysqli_fetch_array($query))
                        {
                          $Blood_Group = $row['Blood_Group'];
                          $total = $row['total'];
                          ?>
                          <tr>
                            <td>
                              <?php echo $i = $i + 1; ?>
                            </td>
                            <td>
                              <?php echo $Blood_Group; ?>
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