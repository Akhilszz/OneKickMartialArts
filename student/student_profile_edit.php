<?php
require_once("../connectionclass.php");
$reg_id = $_GET['pk_key'];
$query = "SELECT * FROM reg WHERE reg_id = $reg_id";

$obj = new Connectionclass();
$data = $obj->GetSingleRow($query);
?>

<?php require_once("../admin/header.php"); ?>

<script>
    $(function() {

        var dtToday = new Date();

        var month = dtToday.getMonth() + 1;
        var day = dtToday.getDate();
        var year = dtToday.getFullYear();

        if (month < 10)
            month = '0' + month.toString();
        if (day < 10)
            day = '0' + day.toString();

        var maxDate = year + '-' + month + '-' + day;
        $('#txtDate').attr('max', maxDate);
    });
</script>

<section>
    <div class="table-agile-info">
        <div class="row">
            <div class="col-lg-8">
                <section class="panel">
                    <header class="panel-heading">EDIT PROFILE</header>
                    <form method="post" action="update_reg.php">
                        <table class="table">
                            <tr>
                                <td><label>NAME</label></td>
                                <td>
                                    <input required class='form-control' pattern="[a-zA-Z\s]+" title="only alphabets and spaces allowed" type='text' name='name' id='name' value="<?php echo $data["name"] ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td><label>GENDER</label></td>
                                <td>
                                    <select required class='form-control' name='gender' id='gender'>
                                        <option value="" <?php echo ($data["gender"] == "") ? "selected" : ""; ?>>Select</option>
                                        <option value="Male" <?php echo ($data["gender"] == "Male") ? "selected" : ""; ?>>Male</option>
                                        <option value="Female" <?php echo ($data["gender"] == "Female") ? "selected" : ""; ?>>Female</option>
                                        <option value="Transgender" <?php echo ($data["gender"] == "Transgender") ? "selected" : ""; ?>>Transgender</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><label>ADDRESS</label></td>
                                <td>
                                    <input required class='form-control' type='text' name='address' id='address' value="<?php echo $data["address"] ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td><label>PHONENO</label></td>
                                <td>
                                    <input required class='form-control' pattern="[9876][0-9]{9}" title="Enter a valid mobile number" type='text' name='phoneno' id='phoneno' value="<?php echo $data["phoneno"] ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td><label>DOB</label></td>
                                <td>
                                    <input required class='form-control' type='date' name='dob' id='txtDate' value="<?php echo $data["dob"] ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <input type="hidden" name="pk_key" value="<?php echo $data["reg_id"] ?>" />
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
