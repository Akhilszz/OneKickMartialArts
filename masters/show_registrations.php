<?php require_once("../admin/header.php"); ?>

<section>
    <div class="table-agile-info">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <?php 
                    require_once("../connectionclass.php");

                    // Fetch students who are registered for a specific art where the master is assigned
                    $obj = new Connectionclass();
                    $email = $_SESSION['username']; // Get the email from the session
                    $qry = "SELECT reg.*, arts.*
                            FROM reg 
                            INNER JOIN booking ON reg.reg_id = booking.fk_reg_id 
                            INNER JOIN package ON booking.fk_package_id = package.packgeid
                            INNER JOIN arts ON package.fk_arts_id = arts.artsid
                            WHERE reg.usertype = 'student' 
                            AND booking.fk_master_id = (
                                SELECT master_id FROM master WHERE email = '$email'
                            )";

                    $data = $obj->GetTable($qry);
                    //var_dump($data);
                    //die;
                    ?> 
                    <table class="table table-bordered">
                        <tr> 
                            <th>Name</th>
                            <th>Address</th>
                            <th>Phone Number</th>
                            <th>Gender</th>
                            <th>Email</th>
                            <th>Date of Birth</th>
                            <th>User Type</th>
                            <th>Date of Joining</th>
                            <th>Art Name</th>
                            <!-- Add other headers as needed -->
                        </tr>

                        <?php foreach($data as $row): ?>
                            <tr>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['address']; ?></td>
                                <td><?php echo $row['phoneno']; ?></td>
                                <td><?php echo $row['gender']; ?></td>
                                <td><?php echo $row['emailid']; ?></td>
                                <td><?php echo date("d-m-Y", strtotime($row['dob'])); ?></td>
                                <td><?php echo $row['usertype']; ?></td>
                                <td><?php echo date("d-m-Y", strtotime($row['doj'])); ?></td>
                                <td><?php echo $row['artsname']; ?></td>
                                <!-- Add other columns you want to display -->
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </section>
            </div>
        </div>
    </div>
</section>

<?php require_once("../admin/footer.php"); ?>
