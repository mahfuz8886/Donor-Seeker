<?php 
   include("connection.php");
   ob_start();
   include("header.php");
   $error_msg = array();
    if($_POST)
    {
      $phone = $_POST['phone'];
      if(empty($_POST['donation_date']))
        {
         $error_msg['donation_date'] = "Donation Date is Required.";
        }
      if($_POST['division'] == "NULL")
        {
         $error_msg['division1'] = "Division is Required.";
        }
      if(empty($_POST['donation_place']))
        {
         $error_msg['donation_place'] = "Donation Place is Required.";
        }
      if(empty($_POST['name']))
        {
         $error_msg['name'] = "Donee Name is Required.";
        }
      if(empty($_POST['phone']))
        {
         $error_msg['phone1'] = "Phone Number is Required.";
        }
      if( !is_numeric($phone))
        {
         $error_msg['phone2'] = "Only Number input";
        }
      else if( strlen($phone) < 11)
        {
         $error_msg['phone2'] = "Number Should Contain at lest 11 digit.";
        }

      if(count($error_msg) == 0)
        {
          $donation_date = $_POST['donation_date'];
          $division = $_POST['division'];
          $name = $_POST['name'];
          $phone = $_POST['phone'];
          $donation_place = $_POST['donation_place'];
          $id = $_SESSION['id'];
          $post_id = 00;

          /* For Blood Group */
          $query = mysqli_query($connection, "SELECT * FROM donor_infos WHERE id = '$id'");
          $row = mysqli_fetch_array($query);
          $blood_group = $row['Blood_Group'];
          
          $sql = "INSERT INTO donation_infos (`post_id`, `donor_id`, `Last_donate`, `Division`, `blood_group`, `donee_location`, `donee_name`, `donee_contact`) VALUES('$post_id' , '$id' , '$donation_date' , '$division' , '$blood_group' , $donation_place' , '$name' , '$phone')";

          $sql2 = "UPDATE donor_infos SET Last_donate = '$donation_date' WHERE id = '$id'";

          $query = mysqli_query($connection, $sql);
          $query2 = mysqli_query($connection, $sql2);

        if($query && $query2)
          {
            //echo "Insert Data";
            header("Location:view_own_profile.php?add_donation=add_donation");
            ob_end_flush();
          }
        else
          {
            //echo "error";
            header("Location:add_recent_blood_donation.php?error=error");
            ob_end_flush();
          }
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
        <title>Donation History</title>
        <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link rel="stylesheet" type="text/css" href="css/app.css">
          <! Link For Font Awesome>
          <script src="https://kit.fontawesome.com/a076d05399.js"></script>
          <style type="text/css">
              .error{
                color: #cc0000;
                padding-top: 5px;
                float: left;
                width: 100%;
                font-style: bold;
              } 
          </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h5>Recent Blood Donation History</h5></div>
                <div class="card-body">
                    <form method="POST" action="">
                        
                         <! Date of Donation >
                         <div class="form-group row">
                            <label for="donation_date" class="col-md-4 col-form-label text-md-right">Donation Date:</label>

                            <div class="col-md-6">
                                <input id="donation_date" type="Date" class="form-control" name="donation_date"autofocus value="<?php if(isset($_POST['donation_date'])) echo $_POST['donation_date']; ?>">
                                <p>
                                    <?php
                                    if(isset($error_msg['donation_date'])) 
                                        echo "<div class='error'>" . $error_msg['donation_date']. "</div>";
                                    ?>
                                </p>
                            </div>
                        </div>

                        <! Division (from database) >
                        <div class="form-group row">
                            <label for="division" class="col-md-4 col-form-label text-md-right">Division:</label>
                            <div class="col-md-6">
                               <select  id="division" class="form-control" name="division"autofocus  >
                                        <option value="NULL">-Select Division</option>
                                   <?php 
                                        $query = mysqli_query($connection , "SELECT * from division_infos ORDER BY Division ASC");
                                        $rowcount = mysqli_num_rows($query);
                                          for($i=1;$i<=$rowcount;$i++)
                                          {
                                            $row = mysqli_fetch_array($query);
                                    ?>
                                        <option value="<?php echo $row['Division'];?>"><?php echo $row['Division'];?></option>
                                    <?php 
                                          }
                                     ?>
                                </select>
                                <p>
                                    <?php
                                    if(isset($error_msg['division1'])) 
                                        echo "<div class='error'>" . $error_msg['division1']. "</div>";
                                    ?>
                                </p>
                            </div>
                        </div>

                         <! Donation Place >
                         <div class="form-group row">
                            <label for="donation_place" class="col-md-4 col-form-label text-md-right">Donation Place:</label>

                            <div class="col-md-6">
                                <input id="donation_place" type="text" class="form-control" name="donation_place"autofocus placeholder="Donation Place" value="<?php if(isset($_POST['donation_place'])) echo $_POST['donation_place']; ?>">
                              <p>
                                <?php
                                if(isset($error_msg['donation_place'])) 
                                    echo "<div class='error'>" . $error_msg['donation_place']. "</div>";
                                ?>
                            </p>
                            </div>
                        </div>

                        <! Donee Name >
                         <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Donee Name:</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name"autofocus placeholder="Donee Name" value="<?php if(isset($_POST['name'])) echo $_POST['name']; ?>">
                             <p>
                                <?php
                                if(isset($error_msg['name'])) 
                                    echo "<div class='error'>" . $error_msg['name']. "</div>";
                                ?>
                            </p>
                            </div>
                        </div>

                        <! phone >
                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">Donee Phone:</label>

                            <div class="col-md-6">
                                <input id="phone" type="number" class="form-control" name="phone"autofocus placeholder="Phone Number" value="<?php if(isset($_POST['phone'])) echo $_POST['phone']; ?>">
                                 <p>
                                     <?php
                                    if(isset($error_msg['phone1'])) 
                                        echo "<div class='error'>" . $error_msg['phone1']. "</div>";
                                    ?>
                                 </p>
                                 <p>
                                     <?php
                                    if(isset($error_msg['phone2'])) 
                                        echo "<div class='error'>" . $error_msg['phone2']. "</div>";
                                    ?>
                                 </p>
                            </div>
                        </div>

                        <! Submit Button >
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" name="submit" class="btn btn-primary">
                                    Add
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 

<?php
  if(!empty($error_msg)) { ?>
    <div class="invalid" data-wrong="<?= $error_msg; ?>"> 
    </div>
    <?php }
        elseif(isset($_GET['error'])) { ?>
          <div class="error" data-wrong2="<?= $_GET['error']; ?>"> 
          </div>
    <?php }
        ?>
           <script src="sweetAlert/jquery-3.5.0.min.js"></script>
           <script src="sweetAlert/sweetalert2.all.min.js"></script>
           <script>
               const wrong = $('.invalid').data('wrong')
              if(wrong){
                Swal.fire({
                      icon: 'error',
                      title: 'Oops...',
                      text: 'Something went wrong...!!!'
                    })
              }
              const wrong2 = $('.error').data('wrong2')
              if(wrong2){
                Swal.fire({
                      icon: 'error',
                      title: 'Oops...',
                      text: 'Data was not insert properly...!!!'
                    })
              }
           </script>
<div style="margin-top: 80px;">
    <?php include("footer.php"); ?>
  </div>
</body>
</html>