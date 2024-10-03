<?php require_once("../admin/header.php");  
require_once('../Connectionclass.php');
$obj = new Connectionclass();
$username= $_SESSION['username']; 

$qry="select * from master where email='$username'";
$exe=$obj->GetSingleRow($qry);
$qry1="select * from master INNER JOIN arts ON master.fk_art_id=arts.artsid where master.email='$username'";
$exe1=$obj->GetSingleRow($qry1);

?>
<section id="main-content">
    <section class="wrapper">
    <div class="form-w3layouts">
        <!-- page start-->
        <!-- page start-->
        <div class="row">
            <?php
            //var_dump($exe);
            
            ?>
            <div class="col-lg-12">
                  <section class="panel">
                        <header class="panel-heading">
                         Profile Details
                        </header>
                      <div class="panel-body">
                        <div class="outer-w3-agile mt-3">
                   
                    <form action="" method="post">
                        
       
            
              <div class="row">


                
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <th>Name</th>
                        <td><?php echo $exe1['full_name']; ?></td>
                      </tr>

                      <tr>
                        <th> Address</th>
                        <td><?php echo $exe1['profile']; ?></td>
                      </tr>

                      <tr>
                        <th>Phone Number</th>
                        <td><?php echo $exe1['phone']; ?></td>
                      </tr>

                       <tr>
                        <th>Email Id</th>
                        <td><?php echo $exe['email']; ?></a></td>
                      </tr>

                      <tr>
                        <th>Gender</th>
                        <td><?php echo $exe1['gender']; ?></a></td>
                      </tr>
                     
                      <tr>
                        <th>Arts Name</th>
                        <td><?php echo $exe1['artsname']; ?></td>
                      </tr>

                      
                     
                    </tbody>
                  </table>
                  
               
                  
                </div>
              </div>
           
               
                      
                      <a href="master_prf_edit.php" class="btn btn-success pull-right" style="margin-left: 900px;">Edit Details</a>
                        <!--<button type="submit" class="btn btn-success" align="center" style="margin-left: 900px;">Edit Details</button>-->
                    </form>
                </div>

                
                      </div>
                  </section>

            </div>
            
        </div>
       

       
      

        

        <!-- page end-->
        </div>
</section>
<?php require_once("../admin/footer.php");  ?>