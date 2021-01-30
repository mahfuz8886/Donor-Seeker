<?php
  include("connection.php");
  $sql = mysqli_query($connection, "SELECT donor_infos.id,donation_infos.donor_id FROM donor_infos,donation_infos WHERE donation_infos.Last_donate > '2020-02-01' AND donor_infos.Blood_Group = 'A+' AND donation_infos.blood_group = 'A+'");
  //$id = array();
  while ($row = mysqli_fetch_array($sql)) {
    //echo $row['id']." ";
    if($row['id'] != $row['donor_id'])
    {
      $id = $row['id'];
      //echo $id." ";
    }
    //echo $id." ";
  }
   /* For search eligible donor purpose */
    $date = date("Y-m-d");
    $check_date = date_create($date);
    date_modify($check_date , "-120 days");
    $eligible_date = date_format($check_date,"Y-m-d"); // final date;
?>