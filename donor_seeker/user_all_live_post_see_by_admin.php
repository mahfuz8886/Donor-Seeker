<?php 
    include("connection.php");
    include("header.php"); 
    $id = $_GET['id2'];
    $sql = mysqli_query($connection , "SELECT * from donor_infos where id ='$id'");
    $rowName = mysqli_fetch_array($sql);
    $name = $rowName['First_Name']."  ".$rowName['Last_Name']." ";
?>
<!DOCTYPE html>
<html>
<head>
        <title>Admin See Live Post of User By E-mail</title>
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
          <?php echo $name;?>Live Post
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
           <th scope="col">Donation Date</th>
           <th scope="col">How Much Needed</th>
           <th scope="col">Action</th>
         </tr>
       </thead>
       <tbody>
         <?php
        $query = mysqli_query($connection,"SELECT * from donor_seeker_post where seeker_id = '$id' AND status ='live'");
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
                <?php echo $row['date']; ?>
            </td>
            <td>
                 <?php echo $row['how_much_needed']; ?>
            </td>
             <td>
                <a class="btn btn-danger btn-del" href="delete_seeking_post.php?idd=<?php echo $row['id'];?> &id2=<?php echo $id;?>">Delete</a>
                <a class="btn btn-info" href="update_seeking_post.php?id=<?php echo $row['id'];?>">Update</a>
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

        <?php
           /* Delete Sweet Alert Start */
             if(isset($_GET['success'])) { ?>
              <div class="delete-confirm" data-deleted="<?= $_GET['success']; ?>">
              </div>
            <?php }
                 elseif(isset($_GET['error'])) { ?>
                 <div class="not-delete" data-wrong="<?= $_GET['error']; ?>"> 
                 </div>
          <?php }
              
          ?>


          <!-- Delete Sweet Alert Start  -->
            <script src="sweetAlert/jquery-3.5.0.min.js"></script>
            <script src="sweetAlert/sweetalert2.all.min.js"></script>

            <script>
            $('.btn-del').on('click' , function(e){
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
             const deleted = $('.delete-confirm').data('deleted')
                   if(deleted){
                       Swal.fire(
                      'Deleted!',
                      'Your file has been deleted.',
                      'success'
                    )
                 }
             const wrong = $('.not-delete').data('wrong')
              if(wrong){
                Swal.fire({
                      icon: 'error',
                      title: 'Oops...',
                      text: 'Post was not delete...!!!'
                    })
              }
            </script>

<div style="margin-top: 80px;">
    <?php include("footer.php"); ?>
  </div>
</body>
</html>



 


 