<?php
require_once("../admin/header.php");
require_once("../connectionclass.php");

$obj = new Connectionclass();
$username = $_SESSION['username'];
$qry = "SELECT * FROM master WHERE email='$username'";
$exe = $obj->GetSingleRow($qry);
$qry1 = "SELECT * FROM master INNER JOIN arts ON master.fk_art_id=arts.artsid WHERE master.email='$username'";
$exe1 = $obj->GetSingleRow($qry1);
?>

<section>
    <div class="table-agile-info">
        <div class="row">
            <div class="col-lg-8">
                <section class="panel">
                    <header class="panel-heading">PROFILE EDIT</header>
                    <form method="post" action="update_master.php">
                        <table class="table">
                            <tr>
                                <td><label>NAME</label></td>
                                <td>
                                    <input required class='form-control' pattern="[a-zA-Z\s]+" title="only alphabets and spaces allowed" type='text' name='name' id='name' value="<?php echo $exe["full_name"] ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td><label>GENDER</label></td>
                                <td>
                                    <select required class='form-control' name='gender' id='gender'>
                                        <option value="" <?php echo ($exe["gender"] == "") ? "selected" : ""; ?>>Select</option>
                                        <option value="Male" <?php echo ($exe["gender"] == "Male") ? "selected" : ""; ?>>Male</option>
                                        <option value="Female" <?php echo ($exe["gender"] == "Female") ? "selected" : ""; ?>>Female</option>
                                        <option value="Transgender" <?php echo ($exe["gender"] == "Transgender") ? "selected" : ""; ?>>Transgender</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><label>PROFILE</label></td>
                                <td>
                                    <input required class='form-control' type='text' name='profile' id='address' value="<?php echo $exe["profile"] ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td><label>PHONENO</label></td>
                                <td>
                                    <input required class='form-control' pattern="[9876][0-9]{9}" title="Enter a valid mobile number" type='text' name='phoneno' id='phoneno' value="<?php echo $exe["phone"] ?>" />
                                </td>
                            </tr>
                           
                            <tr>
                                <td></td>
                                <td>
                                    <input type="hidden" name="pk_key" value="<?php echo $exe["master_id"] ?>" />
                                    <input class="btn btn-success" type="submit" value="Submit">
                                    <button type="reset" class="btn btn-danger">Cancel</button>
                                </td>
                            </tr>
                        </table>
                    </form>
                </section>
            </div>
        </div>
    </div>
</section>

<?php require_once("../footer.php"); ?>
