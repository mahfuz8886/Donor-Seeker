<?php
  include("connection.php");
  include("header.php"); 
?>

<!DOCTYPE html>
<html>
<head>
  <title>Statistics</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/app.css">
  <! Link For Font Awesome >
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
  <div class="container">
  <div class="row">
      <div class="col-md-6">
        <h4 style="text-align: center;">Donor Infos</h4>
                  <table class="table table-striped" style="text-align: center;">
                    <tr>
                      <th scope="col">Sl.</th>
                      <th scope="col">Division</th>
                      <th scope="col">Total</th>
                    </tr>
                    <?php
                        $query = mysqli_query($connection , "SELECT * FROM division_infos ORDER BY Division ASC");
                        $i = 0;
                        while($row = mysqli_fetch_array($query))
                        {
                          $division = $row['Division'];
                          $sql = mysqli_query($connection , "SELECT `Division` , COUNT(*) AS total FROM donor_infos WHERE `Division` = '$division'");
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
      <div class="col-md-6">
        <h4 style="text-align: center;">Donation Infos</h4>
                  <table class="table table-striped" style="text-align: center;">
                    <tr>
                      <th scope="col">Sl.</th>
                      <th scope="col">Division</th>
                      <th scope="col">Total</th>
                    </tr>
                    <?php
                        $query = mysqli_query($connection , "SELECT * FROM division_infos ORDER BY Division ASC");
                        $i = 0;
                        while($row = mysqli_fetch_array($query))
                        {
                          $division = $row['Division'];
                          $sql = mysqli_query($connection , "SELECT `Division` , COUNT(*) AS total FROM donation_infos WHERE `Division` = '$division'");
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
    <div class="row" style="margin-top: 50px;">
      <div class="col-md-6">
        <h4 style="text-align: center;">Blood Group Wise Donor Infos</h4>
                  <table class="table table-striped" style="text-align: center;">
                    <tr>
                      <th scope="col">Sl.</th>
                      <th scope="col">Blood Group</th>
                      <th scope="col">Total</th>
                    </tr>
                    <?php
                        $query = mysqli_query($connection , "SELECT * FROM blood_group_infos ORDER BY blood_group ASC");
                        $i = 0;
                        while($row = mysqli_fetch_array($query))
                        {
                          $blood_group = $row['blood_group'];
                          $sql = mysqli_query($connection , "SELECT `Blood_Group` , COUNT(*) AS total FROM donor_infos WHERE `Blood_Group` = '$blood_group'");
                          $row2 = mysqli_fetch_array($sql);
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
      <div class="col-md-6">
        <h4 style="text-align: center;">Blood Group Wise Donation Infos</h4>
                  <table class="table table-striped" style="text-align: center;">
                    <tr>
                      <th scope="col">Sl.</th>
                      <th scope="col">Blood Group</th>
                      <th scope="col">Total</th>
                    </tr>
                    <?php
                       $query = mysqli_query($connection , "SELECT * FROM blood_group_infos ORDER BY blood_group ASC");
                        $i= 0;
                          while($row = mysqli_fetch_array($query))
                          {
                              $blood_group = $row['blood_group'];
                              $sql = mysqli_query($connection , "SELECT `blood_group` , COUNT(*) AS total FROM donation_infos WHERE `blood_group` = '$blood_group'");
                              $row2 = mysqli_fetch_array($sql);
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
    <div class="row" style="margin-top: 50px;">
      <div class="col-md-6">
        <h4 style="text-align: center;">Today's Blood Seeking Post</h4>
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
                          $sql = mysqli_query($connection , "SELECT `division` , COUNT(*) AS total FROM donor_seeker_post WHERE `division` = '$division' AND `date`  = '$date'");
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
      <div class="col-md-6">
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
    <div class="row justify-content-center" style="margin-top: 50px;">
      <div class="col-md-6">
        <h4 style="text-align: center;">Total Blood Seeking Post</h4>
                  <table class="table table-striped" style="text-align: center;">
                    <tr>
                      <th scope="col">Sl.</th>
                      <th scope="col">Division</th>
                      <th scope="col">Total</th>
                    </tr>
                    <?php
                        $query = mysqli_query($connection , "SELECT * FROM division_infos ORDER BY Division ASC");
                        $i = 0;
                        while($row = mysqli_fetch_array($query))
                        {
                          $division = $row['Division'];
                          $sql = mysqli_query($connection , "SELECT `division` , COUNT(*) AS total FROM donor_infos WHERE `division` = '$division'");
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
  
  <div style="margin-top: 80px;">
    <?php include("footer.php"); ?>
  </div>

</body>
</html>