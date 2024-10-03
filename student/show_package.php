<?php require_once("../admin/header.php"); ?>

<section>
    <div class="table-agile-info">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <?php 
                    require_once("../connectionclass.php");
                    $qry = "SELECT * FROM package  
                            INNER JOIN arts ON package.fk_arts_id=arts.artsid  
                            JOIN master ON master.fk_art_id=arts.artsid"; 
                    $obj = new connectionclass();
                    $data = $obj->GetTable($qry);

                    $username = $_SESSION['username'];

                    $qr = "SELECT * FROM reg WHERE emailid ='$username'";
                    $ob = new connectionclass();
                    $dat = $ob->GetTable($qr);
                    ?>
                    <table class="table table-bordered">
                        <tr> 
                            <th>PACKAGE_TITLE</th>  
                            <th>ARTS NAME</th>  
                            <th>DURATION</th>  
                            <th>COST</th>
                            <th>ACTION</th>   
                        </tr> 
                        <?php  
                        foreach($data as $row) {
                            foreach($dat as $ro) {
                                $master = $row['master_id'];
                                $pk_key = $row['packgeid']; // Assuming primary key is 'pakgeid'
                                $p_key = $ro['reg_id'];
                                $isBooked = false;

                                // Check if the student has booked the package
                                $bookingQuery = "SELECT COUNT(*) as count FROM booking WHERE fk_package_id = $pk_key AND  fk_reg_id = $p_key";
                                $bookingResult = $obj->GetTable($bookingQuery);
                                if ($bookingResult[0]['count'] > 0) {
                                    $isBooked = true;
                                }
                        ?>
                            <tr> 
                                <td><?php  echo $row['package_title']; ?></td> 
                                <td><?php  echo $row['artsname']; ?></td> 
                                <td><?php  echo $row['duration']; ?></td> 
                                <td><?php  echo $row['cost']; ?></td>
                                <td>  
                                    <?php if (!$isBooked) { ?>
                                        <a onclick='return confirm("are you sure want to book")' class="btn btn-primary btn-xs "   
                                           href="book_package.php?pk_key=<?php  echo $pk_key; ?>&p_key=<?php  echo $p_key; ?>&mid=<?php echo $master;?>">BOOK NOW</a>
                                    <?php } ?>
                                    <a class="btn btn-danger btn-xs" href="st_schedule.php?pk_key=<?php  echo $pk_key; ?>">SCHEDULE</a>
                                </td>
                            </tr>
                        <?php
                            }
                        }
                        ?>
                    </table> 
                </section>
            </div>
        </div>
    </div>
</section>
<?php require_once("../admin/footer.php"); ?>
