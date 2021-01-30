<?php 
  include("connection.php"); // any user can see his/her profile
  ob_start();
  include("header.php");
  $id = $_SESSION['id'];
  
  if(!isset($_SESSION['user'])) {
    header("location:home.php");
  }

  $query = mysqli_query($connection,"SELECT * from donor_infos where id = '$id'");
  $rowName = mysqli_fetch_array($query);
  $name = $rowName['First_Name']." ".$rowName['Last_Name'];

  /* For checking any seeking request accept or seeking post posted */ 
  $query = mysqli_query($connection,"SELECT * FROM donor_confirmation WHERE status = 'true'");
  while($row = mysqli_fetch_array($query))
  {
    $donor_id = $row['donor_id'];
    $seeker_id = $row['seeker_id'];
    if($donor_id == $id || $seeker_id == $id)
    {
      header("location:donation_info_confirmation.php");
    }
  }
  /* For checking any seeking request accept or seeking post posted */ 
  
?>
<!DOCTYPE html>
<html>
<head>
        <title>Profile</title>
        <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link rel="stylesheet" type="text/css" href="css/app.css">
          <! Link For Font Awesome>
          <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>

  <hr>
    <h4 style="text-align: center;"><?php echo $name;?> Full Profile</h4>
    <hr style="margin-bottom: 50px;">
    <div class="container">
  <div class="row">
    <div class="col-md-9">
      <div class="card">
      <div class="card-header"><h5 style="text-align: center;">Full Details of <?php echo $name;?></h5></div>
        <div class="card-body">
           <table class="table table-striped">
            <tbody>
              <?php 
              $query = mysqli_query($connection,"SELECT * from donor_infos where id = '$id'");
               while($row = mysqli_fetch_array($query))
                {
                  
              ?>
              <tr>
                <td>First Name</td>
                <td>
                  <?php echo $row['First_Name'] ?>
                </td>
              </tr>
              <tr>
                <td>Last Name</td>
                <td>
                  <?php echo $row['Last_Name'] ?>
                </td>
              </tr>
              <tr>
                <td>Blood Group</td>
                <td>
                  <?php echo $row['Blood_Group'] ?>
                </td>
              </tr>
              <tr>
                <td>Gender</td>
                <td>
                  <?php echo $row['Gender'] ?>
                </td>
              </tr>
              <tr>
                <td>Date of Birth</td>
                <td>
                  <?php echo $row['Date_of_Birth'] ?>
                </td>
              </tr>
              <tr>
                <td>Weight</td>
                <td>
                  <?php echo $row['Weight'] ?>
                </td>
              </tr>
              <tr>
                <td>Division</td>
                <td>
                  <?php echo $row['Division'] ?>
                </td>
              </tr>
              <tr>
                <td>District</td>
                <td>
                  <?php echo $row['District'] ?>
                </td>
              </tr>
              <tr>
                <td>Sub-district/Police Station</td>
                <td>
                  <?php echo $row['Sub_District_or_Police_Station'] ?>
                </td>
              </tr>
              <tr>
                <td>Village/Area</td>
                <td>
                  <?php echo $row['Village_or_Area'] ?>
                </td>
              </tr>
              <tr>
                <td>Details of Your Area</td>
                <td>
                  <?php echo $row['Details_of_Your_Area'] ?>
                </td>
              </tr>
              <tr>
                <td>Phone</td>
                <td>
                  <?php echo $row['Phone'] ?>
                </td>
              </tr>
              <tr>
                <td>E-mail</td>
                <td>
                  <?php echo $row['E_mail'] ?>
                </td>
              </tr>
              <tr>
                <td>Role</td>
                <td>
                  <?php echo $row['Role'] ?>
                </td>
              </tr>
               <?php
                   }
                ?>
            </tbody>
         </table>
         <?php
              if(mysqli_num_rows($query) == false)
              {
                echo "<h5 style='text-align:center;'>No result found</h5>"."<hr>";
              }
         ?>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card">
      <div class="card-header"><h5 style="text-align: center;">User Menu</h5></div>
        <div class="card-body">
           <div class="list-group">
              <a href="delete_own_profile.php" class="btn btn-link" id="btn-del">Delete Profile</a>
              <a href="update_own_profile.php" class="btn btn-link">Update Profile</a>
              <a href="blood_donation_history_user_wise.php" class="btn btn-link">Blood Donation History</a>
              <a href="add_recent_blood_donation.php" class="btn btn-link">Add Recent Blood Donation</a>
              <a href="blood_taken_history_user_wise.php" class="btn btn-link">Blood Taken History</a>
              <a href="password_change_user_wise.php" class="btn btn-link">Change Password</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

        <?php
          if(isset($_GET['error'])) { ?>
            <div class="not-delete" data-wrong="<?= $_GET['error']; ?>"> 
            </div>
           <?php 
               }
               if(isset($_GET['password_update'])) { ?>
              <div class="change_password" data-wrong3="<?= $_GET['password_update']; ?>"> 
              </div>
           <?php 
               }
               if(isset($_GET['success'])) { ?>
                <div class="update" data-updated="<?= $_GET['success']; ?>"> 
                </div>
             ?>
        <?php }
              if(isset($_GET['add_donation'])) { ?>
                <div class="add_donation" data-add_donation="<?= $_GET['add_donation']; ?>"> 
                </div>
                ?>
        <?php }
         /* Delete Sweet Alert Start */ ?>
            <script src="sweetAlert/jquery-3.5.0.min.js"></script>
            <script src="sweetAlert/sweetalert2.all.min.js"></script>

            <script>
            $('#btn-del').on('click' , function(e){
              e.preventDefault();
              const href = $(this).attr('href')
              Swal.fire({
                  title: 'Are you sure?',
                  text: "You won't be able to revert this!",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                      document.location.href = href;
                    }
                })
            })
            const wrong = $('.not-delete').data('wrong')
              if(wrong){
                Swal.fire({
                      icon: 'error',
                      title: 'Oops...',
                      text: 'Your profile was not deleted...!!!'
                    })
              }
              const wrong3 = $('.change_password').data('wrong3')
              if(wrong3){
                Swal.fire(
                    'Password Changed!',
                    'Password change successfully.',
                    'success'
                  )
              }
              const updated = $('.update').data('updated')
                  if(updated){
                    Swal.fire(
                      'Success!',
                      'Your profile  was updated!',
                      'success'
                    )
                  }
              const add_donation = $('.add_donation').data('add_donation')
              if(add_donation){
                Swal.fire(
                  'Success!',
                  'Successfully added your recent blood donation info',
                  'success'
                )
              }
            </script>

<div style="margin-top: 80px;">
    <?php include("footer.php"); ?>
  </div>
</body>
</html>