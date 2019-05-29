<?php
/**
 * Created by PhpStorm.
 * User: Shuaiqiang Yin
 */

$page_type = 6;
require_once "theme/default/header.php";
?>
<main>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
                <div class="other_main_title">
                    <h2>My profile</h2>
                </div>
                <form id="profileForm" action="" method="post">
                    <div class="form-group">
                        <label for="id">User ID</label>
                        <input type="text" class="form-control" id="id" name="id" value="<?php echo $_SESSION['UserID']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" class="form-control" id="name" value="<?php echo $_SESSION['FirstName'] . " " . $_SESSION['LastName']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" name="address" id="address" placeholder="Address" value="<?php echo $_SESSION['Address'];?>" placeholder="123 Street Name, Suburb, State, Postcode">
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Phone Number</label>
                        <input type="text" class="form-control" id="phone_number" value="<?php echo $_SESSION['Phone_Number'];?>" name="phone_number" placeholder="Phone Number" placeholder="0412345678">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email2" value="<?php echo $_SESSION['Email'];?>" name="email" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" class="custom-control-input" id="subscription"
                               name="newsletter" <?php if ($_SESSION['Subscription'] == 1) { echo "checked"; } ?>>
                        <label class="custom-control-label" for="subscription">Receive newsletter?</label>
                    </div>
                    <div class="form-group">
                        <button id="update" type="submit"
                                class="btn btn-primary btn-lg btn-block">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
<?php
require_once "theme/default/footer.php";
?>
