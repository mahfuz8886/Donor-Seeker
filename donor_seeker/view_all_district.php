<?php
    include("connection.php");
    ob_start();
    include("header.php");
     if($_POST)
    {
        $division = $_POST['division'];
        $error_msg = array();
        if($_POST['division'] == "NULL")
        {
         $error_msg['division1'] = "Division is Required.";
        }

        if(count($error_msg) == 0)
        {
            $division_id = $_POST['division'];

            /* Success */
            header("location:view_all_district.inc.php?id=$division_id");
            ob_end_flush();
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
          <title>View District</title>
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
                <div class="card-header"><h5>All District</h5></div>
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

                        <! View District >
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Show 
                                </button>
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

   <script src="sweetAlert/jquery-3.5.0.min.js"></script>
   <script src="sweetAlert/sweetalert2.all.min.js"></script>
   <script>
      const null1 = $('.not-null1').data('null1')
      if(null1){
        Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'Division field is required'
            })
      }  
   </script>

  <div style="margin-top: 80px;">
    <?php include("footer.php"); ?>
  </div>

</body>
</html>