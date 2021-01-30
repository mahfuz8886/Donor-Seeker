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
             <h4 style="text-align: center;">Blood Group Wise Donation Infos</h4>
                  <table class="table table-striped" style="text-align: center;">
                    <tr>
                      <th scope="col">Sl.</th>
                      <th scope="col">Blood Group</th>
                      <th scope="col">Total</th>
                    </tr>
                    <?php
                        $sql = mysqli_query($connection , "SELECT * FROM donation_infos");
                        $i= 0;
                          while($row = mysqli_fetch_array($sql))
                          {
                            $post_id = $row['post_id'];
                            $query = mysqli_query($connection , "SELECT blood_group , COUNT(*) AS total FROM donor_seeker_post WHERE id = '$post_id'");
                            $row2 = mysqli_fetch_array($query);
                            $blood_group = $row2['blood_group'];
                            $total = $row2['total'];
                          ?>
                          <tr>
                            <td>
                              <?php echo $i = $i + 1; ?>
                            </td>
                            <td>
                              <?php echo $blood_group; ?>
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