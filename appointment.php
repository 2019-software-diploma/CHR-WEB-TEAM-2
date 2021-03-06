<?php
/**
 * Created by PhpStorm.
 * User: Shuaiqiang Yin
 */

$page_type = 1;
require_once "theme/default/header.php";
require_once 'config/database.Connection.php';
/*Main Start*/
?>
<main>
    <div class="container maa_main">
        <div class="maa_main_title">
            <h2>Make an appointment</h2>
            <p>Please fill in your personal information and the reason for your appointment below:</p>
        </div>
        <form id="maaForm" action="" method="post"><!-- TODO This is a test Page -->
            <input type="hidden" id="client_id" value="<?php echo $_SESSION['UserID']?>">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="first_name">First Name</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name"
                           value="<?php if (isset($_SESSION['Email'])) { echo $_SESSION['FirstName'];} ?>" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="last_name">Last Name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name"
                           value="<?php if (isset($_SESSION['Email'])) { echo $_SESSION['LastName'];} ?>" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="phone_number">Phone Number</label>
                    <input type="text" class="form-control" id="phone_number" name="phone_number"
                           placeholder="Phone Number" value="<?php if (isset($_SESSION['Email'])) { echo $_SESSION['Phone_Number'];} ?>" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-8">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address"
                           placeholder="1234 Main St, ACT, 2614" value="<?php if (isset($_SESSION['Email'])) { echo $_SESSION['Address'];} ?>" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="branch">Branch</label>
                    <select id="branch" name="branch" class="form-control" required>
                        <?php
                            $res = mysqli_query($mysql_con, $MySQL ["GetBranch"]);
                            while ($row = mysqli_fetch_row($res)){
                                echo "<option value=\"$row[3]\">$row[0]</option>";
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="reason">Brief of reason:</label>
                <textarea class="form-control" rows="5" id="reason" name="reason" required maxlength="255"></textarea>
                <span class="float-right tag tag-default" id="count_message"></span>
            </div>
            <p class="inForm-text">Who would you like to make an appointment with and what time?</p>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="staff">Staff</label>
                    <select id="staff" name="staff" class="form-control" required>
                        <?php
                            $res = mysqli_query($mysql_con, $MySQL ["GetAllStaff"]);
                            while ($row = mysqli_fetch_row($res)){
                                echo "<option value=\"$row[0]\">$row[1] $row[2]</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="date">Date</label>
                    <input id="date" name="date" class="form-control" type="date" placeholder="DD/MM/YYYY" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="time">Time</label>
                    <input id="time" name="time" class="form-control" type="time" placeholder="HH:MM AM" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <input id="appt_Reset" class="form-control" type="reset" value="Reset">
                </div>
                <div class="form-group col-md-3"></div>
                <div class="form-group col-md-3"></div>
                <div class="form-group col-md-3">
                    <input id="postMaa" class="form-control" type="submit" value="Submit">
                </div>
            </div>
        </form>
    </div>
</main>
<?php
/*Main End*/
require_once "theme/default/footer.php";
?>
