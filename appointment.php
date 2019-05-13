<?php
/**
 * Created by PhpStorm.
 * User: Shuaiqiang Yin
 * Date: 2019-05-13
 * Time: 13:30
 */

$page_type = 4;
session_start();
$_SESSION;
require_once "theme/default/header.php";
/*Main Start*/
?>
<main>
    <div class="container maa_main">
        <div class="maa_main_title">
            <h2>Make an appointment</h2>
            <p>Please fill in your personal information and the reason for your appointment below:</p>
        </div>
        <form action="#" method="post"><!-- TODO action page -->
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="first_name">First Name</label>
                    <input type="text" class="form-control" id="first_name" placeholder="First Name"
                           onfocusout="formInputCheck(this);" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="last_name">Last Name</label>
                    <input type="text" class="form-control" id="last_name" placeholder="Last Name"
                           onfocusout="formInputCheck(this);" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="phone_number">Phone Number</label>
                    <input type="text" class="form-control" id="phone_number" placeholder="Phone Number"
                           onkeypress="return event.charCode >= 48 && event.charCode <= 57 && value.length < 10;"
                           onfocusout="formInputCheck(this);" required>
                </div>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" placeholder="1234 Main St, ACT, 2614"
                       onfocusout="formInputCheck(this);" required>
            </div>
            <div class="form-group">
                <label for="reason">Brief of reason:</label>
                <textarea class="form-control" rows="5" id="reason" onfocusout="formInputCheck(this);" required
                          maxlength="500"></textarea>
                <span class="float-right tag tag-default" id="count_message"></span>
            </div>
            <p class="inForm-text">Who would you like to make an appointment with and what time?</p>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="staff">Staff</label>
                    <select id="staff" class="form-control" required>
                        <option selected>Test Person 1</option>
                        <option>Test Person 2</option>
                        <option>Test Person 3</option>
                        <option>Test Person 4</option>
                        <option>Test Person 5</option>
                        <option>Test Person 6</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="date">Date</label>
                    <input id="date" class="form-control" type="date" placeholder="DD/MM/YYYY"
                           onfocusout="formInputCheck(this);" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="time">Time</label>
                    <input id="time" class="form-control" type="time" placeholder="HH:MM AM"
                           onfocusout="formInputCheck(this);" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <input class="form-control" type="reset" value="Reset">
                </div>
                <div class="form-group col-md-3"></div>
                <div class="form-group col-md-3"></div>
                <div class="form-group col-md-3">
                    <input class="form-control" type="submit" value="Submit">
                </div>
            </div>
        </form>
    </div>
</main>
<?php
/*Main End*/
require_once "theme/default/footer.php";
?>
