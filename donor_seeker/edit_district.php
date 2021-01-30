<?php
    include("connection.php");
    ob_start();
    include("header.php");
     if($_POST)
    {
        $division = $_POST['division'];
        $district = $_POST['district'];
        $edit_district = $_POST['edit_district'];
        $error_msg = array();
        if($_POST['division'] == "NULL")
        {
         $error_msg['division1'] = "Division is Required.";
        }
        if($_POST['district'] == "NULL")
        {
         $error_msg['district1'] = "District is Required.";
        }
        if(empty($_POST['edit_district']))
        {
         $error_msg['edit_district1'] = "District Field Can't be empty.";
        }
         

        if(count($error_msg) == 0)
        {
      			$edit_district = $_POST['edit_district'];
      			$district = $_POST['district'];
            $sql=mysqli_query($connection , "UPDATE   district_infos set District = '$edit_district'where division_id = '$division' and id = '$district'");
            if(!$sql)
            {
                /* Not Updated */
                header("location:edit_district.php?error=error");
                ob_end_flush();
            }
            else
            {
                /* Updated */
                header("location:edit_district.php?success=success");
                ob_end_flush();
            }  
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
          <title>Update District</title>
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
           <!--jQuery Library -->
	        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	        <!--Popper JS -->
	        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	        <!-- Latest Compiled JavaScript -->
	        <script src="css/bootstrap.min.js"></script>

	        <script src="jquery.js"></script>
</head>
<body>
<div class="row">
      <?php
        if(isset($_SESSION['user']) && $_SESSION['role'] == "admin") { 
          ?>
          <div class="col-sm-3">
               <div class="card">
                <div class="card-header"><h5>Aministration Task</h5></div>
                 <div class="card-body"> <?php include('left_side_bar.php');?>
                 </div>
             </div>
         </div> <?php } ?>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header"><h5>Update District</h5></div>
                <div class="card-body">
                    <form method="POST" action="">

                    	<! Division (from database) >
                        <div class="form-group row">
                            <label for="division" class="col-md-4 col-form-label text-md-right">Division:</label>
                            <?php 
                                
                              ?>
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
                                        <option value="<?php echo $row['id'];?>"><?php echo $row['Division'];?></option>
                                    <?php 
                                          }
                                     ?>
                                </select>
                                <p>
                                    <?php
                                    if(isset($error_msg['division1'])) {
                                        echo "<div class='error'>" . $error_msg['division1']. "</div>";
                                        ?>
                                        <div class="not-null1" data-null1="<?= $error_msg['division1'];?>"></div>
                                  <?php }
                                    ?>
                                </p>
                            </div>
                        </div>

                         <! District (from database) >
                        <div class="form-group row">
                            <label for="district" class="col-md-4 col-form-label text-md-right">District:</label>

                            <div class="col-md-6">
                               <select  id="district" class="form-control" name="district"autofocus  >
                                        <option value="NULL">-Select District</option>
                                </select> 
                                 <p>
                                     <?php
                                    if(isset($error_msg['district1'])) {
                                        echo "<div class='error'>" . $error_msg['district1']. "</div>";
                                        ?>
                                        <div class="not-null2" data-null2="<?= $error_msg['district1'];?>"></div>
                                <?php }
                                    ?>
                                 </p>
                            </div>
                        </div>
                    	<! Update District >
                        <div class="form-group row">
                            <label for="edit_district" class="col-md-4 col-form-label text-md-right">Replace District:</label>
                            <div class="col-md-6">
                                <input id="edit_district" type="text" class="form-control" name="edit_district"  autofocus placeholder="Replace District">
                                <p> 
                                <?php
                                    if(isset($error_msg['edit_district1'])) {
                                        echo "<div class='error'>" . $error_msg['edit_district1']. "</div>";
                                        ?>
                                        <div class="not-null3" data-null3="<?= $error_msg['edit_district1'];?>"></div>
                                  <?php }
                                ?> 
                                </p>
                                 
                            </div>
                        </div>

                        <! Update District >
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Update District
                                </button>

                                <?php 
                                    if(isset($_GET['success'])) { ?>
                                      <div class="edit-district" data-edit="<?= $_GET['success'];?>"></div>
                                      <?php }
                                        elseif(isset($_GET['error'])) { ?>
                                          <div class="not-edited" data-wrong="<?= $_GET['error']; ?>"> 
                                          </div>
                              <?php 
                                  }
                                ?>

                                 <script src="sweetAlert/jquery-3.5.0.min.js"></script>
                                 <script src="sweetAlert/sweetalert2.all.min.js"></script>
                                 <script>
                                  const edit = $('.edit-district').data('edit')
                                    if(edit){
                                      Swal.fire(
                                        'Success!',
                                        'District was updated!',
                                        'success'
                                      )
                                    }

                                    const wrong = $('.not-edited').data('wrong')
                                    if(wrong){
                                      Swal.fire({
                                            icon: 'error',
                                            title: 'Oops...',
                                            text: 'District was not updated...!!!'
                                          })
                                    }
                                    const null1 = $('.not-null1').data('null1')
                                    if(null1){
                                      Swal.fire({
                                            icon: 'error',
                                            title: 'Oops...',
                                            text: 'Division field is required'
                                          })
                                    }
                                     const null2 = $('.not-null2').data('null2')
                                    if(null2){
                                      Swal.fire({
                                            icon: 'error',
                                            title: 'Oops...',
                                            text: 'District field is required'
                                          })
                                    }
                                    const null3 = $('.not-null3').data('null3')
                                    if(null3){
                                      Swal.fire({
                                            icon: 'error',
                                            title: 'Oops...',
                                            text: "District Field Can't be empty."
                                          })
                                    }
                                 </script>


                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
         <?php
        if(isset($_SESSION['user']) && $_SESSION['role'] == "admin") { 
          ?>
          <div class="col-sm-3">
               <div class="card">
                <div class="card-header"><h5>Aministration Task</h5></div>
                 <div class="card-body"> <?php include('right_side_bar.php');?>
                 </div>
             </div>
         </div> <?php } ?>
    </div>

  <div style="margin-top: 80px;">
    <?php include("footer.php"); ?>
  </div>

</body>
</html>