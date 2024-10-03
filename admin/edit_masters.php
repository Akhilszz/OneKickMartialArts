<?php require_once("header.php");  ?><section class="wrapper">
<div class="form-w3layouts">
<div class="row">
<div class="col-lg-12">
<section class="panel">
<?php 
require_once("../connectionclass.php");
$obj=new connectionclass() ; 
$pk_key=$_REQUEST['pk_key'];
 $qry="select * from master where master_id='$pk_key' ";
 $row=$obj->getSingleRow($qry); ?>
<header class="panel-heading"> EDIT MASTER </header>

<div class="panel-body">
 <form method="post" action="code/update_master.php"> <table> 
  <tr>
 <td>FULL NAME</td><td> <input class="form-control"  pattern="[a-zA-Z\s]+" title="only alphabets and spaces allowed"   required="" type="text" name="name" value="<?php echo $row["full_name"] ?>" /></td><tr>
 <td>PROFILE</td><td> <input class="form-control"  required="" type="text" name="profile" value="<?php echo $row["profile"] ?>" /></td><tr>
 <td>PHONE</td><td> <input class="form-control"  pattern="[9876][0-9]{9}" title="Enter a valid mobile number"   required="" type="text" name="phone" value="<?php echo $row["phone"] ?>" /></td><tr>
 <td><label>GENDER</label></td>
                                <td>
                                    <select required class='form-control' name='gender' id='gender'>
                                        <option value="" <?php echo ($row["gender"] == "") ? "selected" : ""; ?>>Select</option>
                                        <option value="Male" <?php echo ($row["gender"] == "Male") ? "selected" : ""; ?>>Male</option>
                                        <option value="Female" <?php echo ($row["gender"] == "Female") ? "selected" : ""; ?>>Female</option>
                                        <option value="Transgender" <?php echo ($row["gender"] == "Transgender") ? "selected" : ""; ?>>Transgender</option>
                                    </select>
                                </td>
 <tr>
 
 <tr><td colspan="2" align="right">
<input type="hidden" name="pk_key" value="<?php echo $row["master_id"] ?>" />
<input  class="btn btn-success" type="submit" value="submit">
</td></tr></table> 
 </div>
</form></section>
</div>
</div>
</div>
</section>
<?php require_once("footer.php");  ?>