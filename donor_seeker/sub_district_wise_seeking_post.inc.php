<?php 
   include("connection.php"); // Admin can update profile by mail
   include("header.php");
?>        
<!DOCTYPE html>
<html>
<head>
        <title>Sub-district Wise Donor</title>
        <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link rel="stylesheet" type="text/css" href="css/app.css">
          <! Link For Font Awesome>
          <script src="https://kit.fontawesome.com/a076d05399.js"></script>
          
</head>
<body>
<?php

    $blood_group = $_GET['blood_group'];
    $sql1 = mysqli_query($connection , "SELECT * from division_infos where id = '$Division'");
    $Division_sql = mysqli_fetch_array($sql1);
    $division = $Division_sql['Division'];
    $District = $_GET['district'];
    $sql2 = mysqli_query($connection , "SELECT * from district_infos where id = '$District'");
    $District_sql = mysqli_fetch_array($sql2);
    $district = $District_sql['District'];
    $Sub_District_or_Police_Station = $_GET['sub_district'];
    $sql3 = mysqli_query($connection , "SELECT * from sub_district_infos where id = '$Sub_District_or_Police_Station'");
    $Sub_District_or_Police_Station_sql = mysqli_fetch_array($sql3);
    $sub_district = $Sub_District_or_Police_Station_sql['Sub_District_or_Police_Station'];

    $date = date("Y-m-d"); //From donor_seeker_post.
    $check_date = date_create($date);
    date_modify($check_date , "-120 days");
    $eligible_date = date_format($check_date,"Y-m-d"); // final date

    /* For age >= 18 and age <= 60 */
    $today = $date;
    $check_18 = date_create($today);
    date_modify($check_18 , "-18 years");
    $eighten = date_format($check_18 , "Y-m-d");

    $check_60 = date_create($today);
    date_modify($check_60 , "-60 years");
    $sixty = date_format($check_60 , "Y-m-d");
    /* For age >= 18 and age <= 60 */

   $sql = "SELECT * from donor_infos WHERE Blood_Group = '$blood_group' and Division = '$division' and District = '$district' and Sub_District_or_Police_Station = '$sub_district' and Date_of_Birth <= '$eighten' and Date_of_Birth >= '$sixty' and Weight >= 50 and  status = 'active' and Last_donate <= '$eligible_date'";

    $result = mysqli_query($connection , $sql);
?>  
 
    <table class="table table-striped">
        <thead>
            <h4 style="text-align: center;">All Eligible Donor According to <?php echo $sub_district;?> Police Station/Sub-district</h4>
            <hr>
         <tr>
           <th scope="col">First Name</th>
           <th scope="col">Last Name</th>
           <th scope="col">Blood Group</th>
           <th scope="col">Phone</th>
           <th scope="col">E-mail</th>
           <th scope="col">Action</th>
         </tr>
       </thead>
       <tbody>
        <?php 
                 
            while($row2 = mysqli_fetch_array($result))
             {
                //$row2 = mysqli_fetch_array($result);
        ?>
         
         <tr>
            <td>
                <?php echo $row2['First_Name']; ?>
            </td>
            <td>
                <?php echo $row2['Last_Name']; ?>
            </td>
            <td>
                <?php echo $row2['Blood_Group']; ?>
            </td>
            <td>
                <?php echo $row2['Phone']; ?>
            </td>
            <td>
                <?php echo $row2['E_mail']; ?>
            </td>
            <td>
                <a class="btn btn-info" href="view_user_full_profile_by_admin.php?id=<?php echo $row2['id'];?>">Full Profile</a>
            </td>
        </tr>
            <?php
              } ?>
        </tbody>
    </table>
    <?php
      if(mysqli_num_rows($result) == false)
        {
            echo "<h5 style='text-align:center;'>No result found</h5>"."<hr>";
        } 
    ?>  
           <script src="sweetAlert/jquery-3.5.0.min.js"></script>
           <script src="sweetAlert/sweetalert2.all.min.js"></script>
           <script>
            const sent = $('.sent-mail').data('sent')
              if(sent){
                Swal.fire(
                  'Success!',
                  'E-mail was sent!',
                  'success'
                )
              }
                const not = $('.error').data('not')
                if(not){
                  Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'E-mail was not sent...!!!'
                      })
                }
             </script>
  <div style="margin-top: 80px;">
    <?php include("footer.php"); ?>
  </div>

</body>
</html>