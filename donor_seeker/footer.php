<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="frontpage.css">

    <! Link For Font Awesome>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    
    <title></title>
	<style>
		.navbar-light{
			  font-size: 20px;
			  font-weight: bold;
			  letter-spacing: .3px;
			}

	</style>
  </head>
  <body>
   <div class="container">
     <div class="row">
            <div class="col-sm-4">
              <div class="card">
                <div class="card-header"><h5>Am I eligible to donate blood?</h5></div>
                <div class="card-body">
                  <p class="card-text">With supporting text below as a natural lead-in to additional content.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="card">
                <div class="card-header"><h5>About Blood Donation</h5></div>
                <div class="card-body">
                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="card">
                <div class="card-header"><h5>Why Donate Blood?</h5></div>
                <div class="card-body">
                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                </div>
              </div>
            </div>
      </div>

      <div class="row" style="margin-top: 80px;">
        <div class="col-md-6">
        <h4 style="text-align: center;">Donor Infos</h4>
                  <table class="table table-striped" style="text-align: center;">
                    <tr>
                      <th scope="col">Sl.</th>
                      <th scope="col">Division</th>
                      <th scope="col">Total</th>
                    </tr>
                    <?php
                        $query = mysqli_query($connection , "SELECT * FROM division_infos ORDER BY Division ASC");
                        $i = 0;
                        while($row = mysqli_fetch_array($query))
                        {
                          $division = $row['Division'];
                          $sql = mysqli_query($connection , "SELECT `Division` , COUNT(*) AS total FROM donor_infos WHERE `Division` = '$division'");
                          $row2 = mysqli_fetch_array($sql);
                          $total = $row2['total'];
                          ?>
                          <tr>
                            <td>
                              <?php echo $i = $i + 1; ?>
                            </td>
                            <td>
                              <?php echo $division; ?>
                            </td>
                            <td>
                              <?php echo $total; ?>
                            </td>
                          </tr>
                    <?php
                        }
                    ?>
                  </table>
      </div>
      <div class="col-md-6">
        <h4 style="text-align: center;">Donation Infos</h4>
                  <table class="table table-striped" style="text-align: center;">
                    <tr>
                      <th scope="col">Sl.</th>
                      <th scope="col">Division</th>
                      <th scope="col">Total</th>
                    </tr>
                    <?php
                        $query = mysqli_query($connection , "SELECT * FROM division_infos ORDER BY Division ASC");
                        $i = 0;
                        while($row = mysqli_fetch_array($query))
                        {
                          $division = $row['Division'];
                          $sql = mysqli_query($connection , "SELECT `Division` , COUNT(*) AS total FROM donation_infos WHERE `Division` = '$division'");
                          $row2 = mysqli_fetch_array($sql);
                          $total = $row2['total'];
                          ?>
                          <tr>
                            <td>
                              <?php echo $i = $i + 1; ?>
                            </td>
                            <td>
                              <?php echo $division; ?>
                            </td>
                            <td>
                              <?php echo $total; ?>
                            </td>
                          </tr>
                    <?php
                        }
                    ?>
                  </table>
      </div>
    </div>
      </div>
   </div>

     <body>
  <!-- Footer -->
<footer class="text-white font-small bg-dark pt-4" style="margin-top: 40px;">

  <!-- Footer Links -->
  <div class="container text-center text-md-left">

    <!-- Grid row -->
    <div class="row">

      <!-- Grid column -->
      <div class="col-md-4 mx-auto">

        <!-- Content -->
        <h5 class="font-weight-bold text-uppercase mt-3 mb-4">How Donor Seeker Work</h5>
        <p>Here you can use rows and columns to organize your footer content. Lorem ipsum dolor sit amet,
          consectetur
          adipisicing elit.</p>

      </div>
      <hr class="clearfix w-100 d-md-none">

      <!-- Grid column -->
      <div class="col-md-2 mx-auto">

        <!-- Links -->
        <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Quick Links</h5>

        <ul class="list-unstyled">
          <li>
            <a class="btn btn-link" href="donor_seeker_post.php">Donor Search</a>
          </li>
          <li>
            <a class="btn btn-link" href="statistics.php">Statistics</a>
          </li>
          <li>
            <a class="btn btn-link" href="contact_us.php">Feedback</a>
          </li>
        </ul>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-2 mx-auto">

        <!-- Links -->
        <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Contact Us</h5>

        <ul class="list-unstyled">
          <li>
            <i class="fas fa-phone"></i>+8801743484950
          </li>
          <li>
            E-mail:
          </li>
        </ul>

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->
  </div>
  <!-- Footer Links -->

  <hr>
  <!-- Call to action -->
  <ul class="list-unstyled list-inline text-center py-2">
    <li class="list-inline-item">
      <h5 class="mb-1">Register for free</h5>
    </li>
    <li class="list-inline-item">
      <a href="registation.php" class="btn btn-danger btn-rounded">Sign up!</a>
    </li>
  </ul>
  <!-- Call to action -->

  <hr>

  <!-- Social buttons -->
  <ul class="list-unstyled list-inline text-center">
    <li class="list-inline-item">
      <a href="#!" class="btn-floating btn-fb mx-1">
        <i class="fab fa-facebook-f"> </i>
      </a>
    </li>
    <li class="list-inline-item">
      <a href="#!" class="btn-floating btn-tw mx-1">
        <i class="fab fa-twitter"> </i>
      </a>
    </li>
    <li class="list-inline-item">
      <a href="#!" class="btn-floating btn-gplus mx-1">
        <i class="fab fa-google-plus-g"> </i>
      </a>
    </li>
    <li class="list-inline-item">
      <a href="#!" class="btn-floating btn-li mx-1">
        <i class="fab fa-linkedin-in"> </i>
      </a>
    </li>
    <li class="list-inline-item">
      <a href="#!"class="btn-floating btn-dribbble mx-1">
        <i class="fab fa-dribbble"> </i>
      </a>
    </li>
  </ul>
  <!-- Social buttons -->

  <!-- Copyright -->
  <div class="footer-copyright py-3">© 2020 Copyright:
    <a href="">donorseeker.org</a>
    
      <div style="float: right;">
          <a class="btn btn-link" href="terms_and_condition.php">Terms & Condition</a>
          |
          <a class="btn btn-link" href="privacy_and_policy.php">Privacy & Policy</a>
      </div>

  </div>
  <!-- Copyright -->

    
  
 
</footer>
<!-- Footer -->


  </body>
</html>
