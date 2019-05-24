<?php
/**
 * Created by PhpStorm.
 * User: Shuaiqiang Yin
 */

$page_type = 8;
require_once "theme/default/header.php";
?>
<main class="container">
    <div class="row">
        <aside class="col">
            <form action="api.php" method="post">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name"
                           placeholder="Full Name" required="required">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email"
                           placeholder="Email" required="required">
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
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Branch name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Phone Number</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">Test Branch 1</th>
                    <td>Test Address 1</td>
                    <td>02 1234 5678</td>
                </tr>
                <tr>
                    <th scope="row">Test Branch 2</th>
                    <td>Test Address 2</td>
                    <td>02 1234 5678</td>
                </tr>
                <tr>
                    <th scope="row">Test Branch 3</th>
                    <td>Test Address 3</td>
                    <td>02 1234 5678</td>
                </tr>
                </tbody>
            </table>
        </aside>
    </div>
</main>
<?php
require_once "theme/default/footer.php";
?>