 <?php
    include("connection.php");
    include("header.php");
    $id = $_GET['id'];
    $sql = mysqli_query($connection , "SELECT * FROM district_infos WHERE id = '$id'");
    $rowName = mysqli_fetch_array($sql);
    $name = $rowName['District'];
?>


<!DOCTYPE html>
<html>
<head>
          <title>Sub-District</title>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link rel="stylesheet" type="text/css" href="css/app.css">
          <! Link For Font Awesome>
          <script src="https://kit.fontawesome.com/a076d05399.js"></script>
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
                <div class="card-header"><h5>All Police Station/Sub-district</h5></div>
                <div class="card-body">
                  
        <table class="table table-striped" style="text-align: center;">
         <thead>
          <hr>
        <h4 style="text-align: center;">All Police Station/Sub-district of <?php echo $name; ?> District
        </h4>
         <tr>
           <th scope="col">Sl.</th>
           <th scope="col">Police Station/Sub-district</th>
         </tr>
       </thead>
       <tbody>
      <?php
        $id = $_GET['id'];
        $query = mysqli_query($connection,"SELECT * from sub_district_infos where district_id = '$id' order by Sub_District_or_Police_Station ASC");
        $i = 0;
        while($row = mysqli_fetch_array($query))
        {
        ?>
        <tr>
            <td>
                 <?php echo $i = $i + 1; ?>
            </td>
            <td>
                <a href="test2.php?id=<?php echo $row['id'];?>" class="btn btn-link">
                <?php echo $row['Sub_District_or_Police_Station']; ?>
                </a>
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