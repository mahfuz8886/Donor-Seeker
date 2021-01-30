 <?php
    include("connection.php");
    include("header.php");
?>


<!DOCTYPE html>
<html>
<head>
          <title>Division</title>
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
                <div class="card-header"><h5>All Division</h5></div>
                <div class="card-body">
                  
        <table class="table table-striped" style="text-align: center;">
         <thead>
          <hr>
        <h4 style="text-align: center;">All Division
        </h4>
         <tr>
           <th scope="col">Sl.</th>
           <th scope="col">Division</th>
         </tr>
       </thead>
       <tbody>
         <?php
        $query = mysqli_query($connection,"SELECT * from division_infos order by Division ASC");
        $i = 0;
        while($row = mysqli_fetch_array($query))
        {
        ?>
        <tr>
            <td>
                 <?php echo $i = $i + 1; ?>
            </td>
            <td>
                <a href="view_all_district.inc.php?id=<?php echo $row['id'];?>" class="btn btn-link">
                <?php echo $row['Division']; ?>
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