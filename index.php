<?php
/**
 * Created by PhpStorm.
 * User: Shuaiqiang Yin
 */

$page_type = 0;
require_once "theme/default/header.php";
/*Main Start*/
?>
<!-- Modal HTML -->
<main>
    <div class="main_home">
        <div class="content">
            <h3>Find a Journal!</h3>
            <p></p>
            <form method="post" action="#">
                <div id="custom-search-input">
                    <div class="input-group">
                        <input type="text" class="search-query" placeholder="Ex. Journal Name, Author Name....">
                        <input type="submit" class="btn_search" value="Search">
                    </div>
                    <ul>
                        <li>
                            <input type="radio" id="all" name="radio_search" value="all" checked="">
                            <label for="all">All</label>
                        </li>
                        <li>
                            <input type="radio" id="category-1" name="radio_search" value="Category-1">
                            <label for="category-1">Health</label>
                        </li>
                        <li>
                            <input type="radio" id="category-2" name="radio_search" value="Category-2">
                            <label for="category-2">Medical</label>
                        </li>
                    </ul>
                </div>
            </form>
        </div>
    </div>
    <div class="container main_margin">
        <div class="main_title">
            <h2>Discover the <strong>online</strong> appointment!</h2>
            <p>Find out the easiest way to make an appointment. Finish this form in a few seconds and get reply in 2 hours!</p>
        </div>
        <div class="row add_bottom_30">
            <div class="col-lg-4">
                <div class="box_feat" id="icon_1">
                    <span></span>
                    <h3>Find a Staff</h3>
                    <p>Choose the staff you want discuses with.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="box_feat" id="icon_2">
                    <span></span>
                    <h3>Your Details</h3>
                    <p>Fill in all your personal details.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="box_feat" id="icon_3">
                    <h3>Book a Time</h3>
                    <p>Last, select the time and date you want.</p>
                </div>
            </div>
        </div>
        <p class="text-center"><a href="appointment.php" class="appointment medium">Make a Appointment</a></p>
    </div>
</main>
<?php
/*Main End*/
require_once "theme/default/footer.php";
?>
