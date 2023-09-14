<?php require_once("assets/dashboard/dashboard_header.php"); ?>

<?php
$res = false;
$emp = new Employee();
$data = $emp->getAllUsers();
$info = $emp->usersAnalyticsInfo();

if (isset($_REQUEST['post'])) {
    $res = $emp->postAnalyticsData($_POST);
}

if (isset($_REQUEST['query']) && $_REQUEST['query'] == 'delete') {
    $id = $_REQUEST['id'];
    $dbName = "analytics_" . date('Y');
    $res = $emp->deleteWithId($dbName, $id);
}
?>

<?php if ($res) { ?>
    <script>
        window.location.href = "/banking_management_system/analytics.php"
    </script>
<?php } ?>

<div class="card shadow border-0 mb-7">
    <div class="card-header">
        <h5 class="mb-0">: Analytics Page →</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-nowrap table-striped table-hover table-bordered text-center">
                <thead>
                    <tr>
                        <th rowspan="2">S.N</th>
                        <th rowspan="2">Depositor's Name</th>
                        <th colspan="12">Month of Deposition</th>
                        <th rowspan="2">Total</th>
                        <?php
                        if (count($info)) { ?>
                            <th rowspan="2">Action</th>
                        <?php  }  ?>
                    </tr>
                    <tr>
                        <th>Jan</th>
                        <th>Feb</th>
                        <th>Mar</th>
                        <th>Apr</th>
                        <th>May</th>
                        <th>Jun</th>
                        <th>July</th>
                        <th>Aug</th>
                        <th>Sep</th>
                        <th>Oct</th>
                        <th>Nov</th>
                        <th>Dec</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $counter = 0;
                    foreach ($info as $data) {
                        $counter++; ?>
                        <tr>
                            <td><?php echo $counter; ?></td>
                            <td><?php echo $data->Name; ?></td>
                            <td><?php echo $data->January; ?></td>
                            <td><?php echo $data->February; ?></td>
                            <td><?php echo $data->March; ?></td>
                            <td><?php echo $data->April; ?></td>
                            <td><?php echo $data->May; ?></td>
                            <td><?php echo $data->June; ?></td>
                            <td><?php echo $data->July; ?></td>
                            <td><?php echo $data->August; ?></td>
                            <td><?php echo $data->September; ?></td>
                            <td><?php echo $data->October; ?></td>
                            <td><?php echo $data->November; ?></td>
                            <td><?php echo $data->December; ?></td>
                            <td>test</td>
                            <?php include("./assets/analytics_edit_delete.php"); ?>
                        </tr>
                    <?php } ?>

                    <tr>
                        <td colspan="2">Total</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>198000</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="col-md-12">
            <div class="card bg-glass">
                <div class="card-body px-4 py-5 px-md-5">
                    <div class="text-center mt-5">
                        <strong>MONTH OF DEPOSITION</stro>
                    </div>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

                        <!-- Amount -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form3Example3">Amount</label>
                            <input type="text" id="form3Example3" class="form-control" name="taka" required />
                        </div>

                        <!-- Name -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form3Example1">Name</label>
                            <select name="name" id="form3Exampl1" class="form-control" name="name" required>
                                <option selected disabled>Choose An Employee</option>
                                <?php
                                foreach ($info as $item) { ?>
                                    <?php pre($item); ?>
                                <?php } ?>
                            </select>
                        </div>

                        <!-- Month -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form3Example2">Month</label>
                            <input type="month" id="form3Example2" class="form-control" name="month" required />
                        </div>

                        <?php
                        if (isset($_REQUEST['query']) && $_REQUEST['query'] == 'edit') { ?>
                            <!-- Update button -->
                            <button type="submit" name="update" class="btn btn-primary btn-block mb-4 w-100">
                                Update
                            </button>

                        <?php    } else { ?>
                            <!-- Submit button -->
                            <button type="submit" name="post" class="btn btn-primary btn-block mb-4 w-100">
                                Submit
                            </button>
                        <?php    }
                        ?>


                    </form>
                    <?php
                    if (isset($_REQUEST['query']) && $_REQUEST['query'] == 'edit') { ?>
                        <button onclick="cancelUpdate()" class="btn btn-danger btn-block mb-4 w-100">
                            Cacel Update
                        </button>
                    <?php } ?>

                    <script>
                        // cancel update 
                        function cancelUpdate() {
                            window.location.href = "/banking_management_system/analytics.php"
                        }
                    </script>

                </div>
            </div>
        </div>
    </div>
    <div class="card-footer border-0 py-5">
        <span class="text-muted text-sm">Showing <?php echo count($info); ?> items out of <?php echo count($info); ?> results found</span>
    </div>
</div>

<?php require_once("assets/dashboard/dashboard_footer.php"); ?>

<!--
create table analytics_2023(
	Id int(11) not null AUTO_INCREMENT UNIQUE,
    Name varchar(255) not null,
    Year varchar(255) not null,
    January varchar(255) not null default 0,
    February varchar(255) not null default 0,
    March varchar(255) not null default 0,
    April varchar(255) not null default 0,
    May varchar(255) not null default 0,
    June varchar(255) not null default 0,
    July varchar(255) not null default 0,
    August varchar(255) not null default 0,
    September varchar(255) not null default 0,
    October varchar(255) not null default 0,
    November varchar(255) not null default 0,
    December varchar(255) not null default 0,
    primary key(id)
)


select sum(January,February,March,April,May,June,July,August,September,October,November,December) from analytics_2023
-->