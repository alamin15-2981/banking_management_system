<?php require_once("assets/header.php"); ?>
<?php include("./assets/autoload.php")  ?>

<?php 
  session_start();
  if(isset($_SESSION['employee'])){
      header("location:./home.php");
  }

  $login_msg = '';
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $emp = new Employee();
    $login_msg = $emp->loginData($_POST);
  }
?>

<!-- login page design start -->
<section class="background-radial-gradient overflow-hidden page-container">
  <div class="container px-4 py-5 px-md-5 text-start text-lg-start my-5">
    <div class="row gx-lg-5 align-items-center mb-5">
      <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
        <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
          Login Page For <br />
          <span style="color: hsl(218, 81%, 75%)">Himsagor Kollan Somiti</span>
        </h1>
        <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
          A bank is a financial institution which accepts deposits, pays interest on pre-defined rates, clears checks, makes loans, and often acts as an intermediary in financial transactions. It also provides other financial services to its customers.
        </p>
      </div>

      <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
        <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
        <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

        <div class="card bg-glass">
          <div class="card-body px-4 py-5 px-md-5">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
              <div class="text-center">
                <strong><?php echo $login_msg; ?></strong>
              </div>
              <!-- Email input -->
              <div class="form-outline mb-4">
                <label class="form-label" for="form3Example3">Email address</label>
                <input type="email" id="form3Example3" class="form-control" name="email" required />
              </div>

              <!-- Password input -->
              <div class="form-outline mb-4">
                <label class="form-label" for="form3Example4">Password</label>
                <input type="password" id="form3Example4" class="form-control" name="password" required />
              </div>

              <!-- change password -->
              <div class="form-check d-flex justify-content-center mb-4">
                <a href="change_password.php" class="text-decoration-none">Do you want change your password?</a>
              </div>

              <!-- Submit button -->
              <button type="submit" class="btn btn-primary btn-block mb-4 w-100">
                Login
              </button>

              <!-- Login button -->
              <div class="text-center">
                Don't have an account? <a href="registration.php">Register</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--./ login page design end -->

<?php require_once("assets/footer.php"); ?>