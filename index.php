<?php
/**
 * Created by PhpStorm.
 * User: Shuaiqiang Yin
 * Date: 2019-03-11
 * Time: 17:54
 */
$page_type = 0;
session_start();
$_SESSION;
require_once "theme/default/header.php";
/*Main Start*/
?>
<!-- Modal HTML -->
<main>
    <div class="main_home">
        <div class="content">
            <h3>Find a Research!</h3>
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
                            <label for="category-1">Category-1</label>
                        </li>
                        <li>
                            <input type="radio" id="category-2" name="radio_search" value="Category-2">
                            <label for="category-2">Category-2</label>
                        </li>
                    </ul>
                </div>
            </form>
        </div>
    </div>
    <div class="container main_margin">
        <div class="main_title">
            <h2>Discover the <strong>online</strong> appointment!</h2>
            <p>Something Something Something Something Something Something Something Something Something Something</p>
        </div>
        <div class="row add_bottom_30">
            <div class="col-lg-4">
                <div class="box_feat" id="icon_1">
                    <span></span>
                    <h3>Find a Staff</h3>
                    <p>Something Something Something Something Something Something Something Something Something
                        Something Something Something</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="box_feat" id="icon_2">
                    <span></span>
                    <h3>Your Details</h3>
                    <p>Something Something Something Something Something Something Something Something Something
                        Something Something Something</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="box_feat" id="icon_3">
                    <h3>Book a Time</h3>
                    <p>Something Something Something Something Something Something Something Something Something
                        Something Something Something</p>
                </div>
            </div>
        </div>
        <p class="text-center"><a href="appointment.php" class="appointment medium">Make a Appointment</a></p>
    </div>
    <!-- TODO NEED last release -->
</main>
<?php
/*Main End*/
require_once "theme/default/footer.php";
?>
