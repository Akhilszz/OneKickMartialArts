<?php require_once("header.php");  ?><section >
<div class="form-w3layouts">
<div class="row">
<div class="col-lg-12">
<section class="panel">
<?php 
require_once("../connectionclass.php");
$obj=new connectionclass() ; 
$pk_key=$_REQUEST['pk_key'];
 $qry="select * from arts where artsid='$pk_key' ";
 $row=$obj->getSingleRow($qry); ?>
<header class="panel-heading"> EDIT ARTS </header>

<div class="panel-body">
 <form method="post" action="code/update_arts.php"> <table> <tr>
 <td>ARTSNAME</td><td> <input class="form-control"  required="" type="text" name="artsname"  pattern="[a-zA-Z\s]+" title="only alphabets and spaces allowed"value="<?php echo $row["artsname"] ?>" /></td><tr>
 <td>DESCRIPTION</td><td> <input class="form-control"  required="" type="text" name="des"  pattern="[a-zA-Z\s]+" title="only alphabets and spaces allowed"value="<?php echo $row["description"] ?>" /></td>
 
 <tr>
    <td>
  <input type="hidden" name="pk_key" value="<?php echo $row["artsid"] ?>" />
<input  class="btn btn-success" type="submit" value="submit">
</td></tr></table> 
 </div>
</form></section>
</div>
</div>
</div>
</section>
<?php require_once("footer.php");  ?>



