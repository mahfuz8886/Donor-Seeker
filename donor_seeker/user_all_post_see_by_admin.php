<?php 
    include("connection.php"); //all info dash board see by admin of specific user
    include("header.php"); 
    $id = $_GET['id'];
    $sql = mysqli_query($connection , "SELECT * from donor_infos where id ='$id'");
    $rowName = mysqli_fetch_array($sql);
    $name = $rowName['First_Name']."  ".$rowName['Last_Name']." ";
?>
<!DOCTYPE html>
<html>
<head>
        <title>Admin See All Post of User By E-mail</title>
        <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link rel="stylesheet" type="text/css" href="css/app.css">
          <! Link For Font Awesome>
          <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
 <table class="table table-striped">
       <thead>
        <hr>
        <h4 style="text-align: center;">
          <?php echo $name;?>All Post
        </h4>
        <hr>
        <div class="container">
          <div class="row justify-content-center">
          <a href="user_all_live_post_see_by_admin.php?id2=<?php echo $id;?>" class="btn btn-white">All Live Post</a>
          <a href="user_all_die_post_see_by_admin.php?id=<?php echo $id;?>" class="btn btn-white">All Die Post</a>
        </div>
      </div>
         <tr>
           <th scope="col">Blood Group</th>
           <th scope="col">Donation Place</th>
           <th scope="col">Donee Name</th>
           <th scope="col">Donee Contact</th>
           <th scope="col">Status</th>
           <th scope="col">Action</th>
         </tr>
       </thead>
       <tbody>
         <?php
        $query = mysqli_query($connection,"SELECT * from donor_seeker_post where seeker_id = '$id'");
        while($row = mysqli_fetch_array($query))
        {
        ?>
        <tr>
            <td>
                <?php echo $row['blood_group']; ?>
            </td>
            <td>
                <?php echo $row['details_of_your_area']; ?>
            </td>
            <td>
                <?php echo $row['donee_name']; ?>
            </td>
            <td>
                <?php echo $row['donee_contact']; ?>
            </td>
            <td>
                <?php echo $row['status']; ?>
            </td>
             <td>
                <a class="btn btn-info" href="post_details.php?id=<?php echo $row['id'];?>">Post Details</a>
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

  <div style="margin-top: 80px;">
    <?php include("footer.php"); ?>
  </div>

</body>
</html>