<?php require_once("assets/dashboard/dashboard_header.php"); ?>

<?php
  $update_msg = '';
  $emp = new Employee();
  $data = $emp->employeeInfo($_SESSION['employee']);
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $update_msg = $emp->profileUpdate($_POST,$_FILES);
  }
?>

<div class="card shadow border-0 mb-7">
    <div class="card-header">
        <h5 class="mb-0">: Profile Page →</h5>
    </div>
    <!-- Signup page design start -->
<section class="background-radial-gradient overflow-hidden bg-dark">
  <div class="container px-4 py-5 px-md-5 text-start text-lg-start my-5">
    <div class="row gx-lg-5 align-items-center mb-5">
      <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
        <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
          Update Profile For <br />
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
            <div class="text-center">
              <strong><?php echo $update_msg; ?></strong>
            </div>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">

              <!-- Name input -->
              <div class="form-outline mb-4">
                <label class="form-label" for="form3Example3">Name</label>
                <input type="text" id="form3Example3" value="<?php echo $data->name; ?>" class="form-control" name="name" />
                <input type="hidden" name="id" value="<?php echo $data->id; ?>">
              </div>

              <!-- Email input -->
              <div class="form-outline mb-4">
                <label class="form-label" for="form3Example2">Email address</label>
                <input type="email" id="form3Example2" class="form-control" value="<?php echo $data->email; ?>" readonly />
              </div>
              
              <!-- Employee id -->
              <div class="form-outline mb-4">
                <label class="form-label" for="form3Example6">Employee Id</label>
                <input type="text" id="form3Example6" value="<?php echo $data->employee_id; ?>" class="form-control" name="employeeId" />
              </div>

              <!-- Photo -->
              <div class="form-outline mb-4">
                <label class="form-label" for="form3Example4">Profile Photo</label>
                <input type="file" accept="image/*" id="form3Example4" class="form-control" name="photo" />
                <input type="hidden" name="old_photo" value="<?php echo $data->photo ?>">
                <figure class="figure my-2">
                  <img src="./uploads/<?php echo $data->photo; ?>" alt="...photo" class="figure-img object-fit-cover rounded img-thumbnail" style="object-position: top bottom;" width="100" height="100">
                  <figcaption class="figure-caption"><?php echo $data->name ?>'s photo</figcaption>
                </figure>
              </div>

              <!-- Submit button -->
              <button type="submit" class="btn btn-primary btn-block mb-4 w-100">
                Update Profile
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--./ Signup page design end -->
</div>

<?php require_once("assets/dashboard/dashboard_footer.php"); ?>