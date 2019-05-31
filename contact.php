<?php
/**
 * Created by PhpStorm.
 * User: Shuaiqiang Yin
 */

$page_type = 4;
require_once "theme/default/header.php";
?>
<main class="container">
    <div class="row">
        <aside class="col">
            <div class="other_main_title">
                <h2>Contact Us</h2>
            </div>
            <form action="api.php" method="post">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name"
                           placeholder="Full Name" value="<?php if (isset($_SESSION['Email'])) { echo $_SESSION['FirstName'] . " " . $_SESSION['LastName']; } ?>" required="required">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email"
                           placeholder="Email" value="<?php if (isset($_SESSION['Email'])) { echo $_SESSION['Email']; } ?>" required="required">
                </div>
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" class="form-control" id="subject" name="subject"
                           placeholder="Subject" required="required">
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea class="form-control" rows="5" id="message" name="message" required maxlength="500" placeholder="Message"></textarea>
                    <span class="float-right tag tag-default" id="count_message"></span>
                </div>
                <div class="form-group">
                    <button type="submit"
                            class="btn btn-primary btn-lg btn-block">
                        Send
                    </button>
                </div>
            </form>
        </aside>
        <aside class="col">
            <div class="other_main_title">
                <h2>Branches</h2>
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Branch name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Phone Number</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    require_once "config/database.Connection.php";
                    $res = mysqli_query($mysql_con, $MySQL ["GetBranch"]);
                    while ($row = mysqli_fetch_row($res)){
                        echo "<tr>";
                        echo "<th scope=\"row\">$row[0]</th>";
                        echo "<td>$row[1]</td>";
                        echo "<td>$row[2]</td>";
                        echo "</tr>";
                    }
                ?>
                </tbody>
            </table>
        </aside>
    </div>
</main>
<?php
require_once "theme/default/footer.php";
?>