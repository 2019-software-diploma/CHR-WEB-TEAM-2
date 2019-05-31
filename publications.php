<?php
/**
 * Created by PhpStorm.
 * User: Shuaiqiang Yin
 */

$page_type = 3;
require_once "theme/default/header.php";
/*Main Start*/
?>
<main>
    <div class="container publications">
        <div class="other_main_title">
            <h2 class="publications">Publications</h2>
        </div>
        <form method="post" action="api.php">
            <div id="custom-search-input">
                <div class="input-group">
                    <input name="keyword" type="text" class="search-query" placeholder="Ex. Journal Name, Author Name....">
                    <input type="submit" class="pub_btn_search" value="Search">
                </div>
                <ul>
                    <li>
                        <input type="radio" id="all" name="radio_search" value="all" checked="">
                        <label for="all">All</label>
                    </li>
                    <li>
                        <input type="radio" id="Health" name="radio_search" value="Category-1">
                        <label for="Health">Health</label>
                    </li>
                    <li>
                        <input type="radio" id="Medical" name="radio_search" value="Category-2">
                        <label for="Medical">Medical</label>
                    </li>
                </ul>
            </div>
        </form>
        <div class="contact">
            <ul class="result-list">
                <li class="result-list-li">
                    <div class="row">
                        <div class="col-md-3 pub_img_con">
                            <img class="pub-img" src="./static/img/health.png">
                        </div>
                        <div class="col-md-7">
                            <h3 class="pub-title">
                                Test Book 1
                            </h3>
                            <span class="pub-author">By Shuaiqiang Yin (29/05/2019)</span>
                            <br>
                            <br>
                            <subtitle class="pub-preview">This just a test text here, in the real project her should be a preview of this journal!</subtitle>
                        </div>
                        <div class="col-md-2 pub_img_con">
                            <button class="btn btn-primary btn-block">Read more</button>
                        </div>
                    </div>
                </li>
                <hr>
                <li class="result-list-li">
                    <div class="row">
                        <div class="col-md-3 pub_img_con">
                            <img class="pub-img" src="./static/img/health.png">
                        </div>
                        <div class="col-md-7">
                            <h3 class="pub-title">
                                Test Book 2
                            </h3>
                            <span class="pub-author">By Shuaiqiang Yin (29/05/2019)</span>
                            <br>
                            <br>
                            <subtitle class="pub-preview">This just a test text here, in the real project her should be a preview of this journal!</subtitle>
                        </div>
                        <div class="col-md-2 pub_img_con">
                            <button class="btn btn-primary btn-block">Read more</button>
                        </div>
                    </div>
                </li>
                <hr>
                <li class="result-list-li">
                    <div class="row">
                        <div class="col-md-3 pub_img_con">
                            <img class="pub-img" src="./static/img/health.png">
                        </div>
                        <div class="col-md-7">
                            <h3 class="pub-title">
                                Test Book 3
                            </h3>
                            <span class="pub-author">By Shuaiqiang Yin (29/05/2019)</span>
                            <br>
                            <br>
                            <subtitle class="pub-preview">This just a test text here, in the real project her should be a preview of this journal!</subtitle>
                        </div>
                        <div class="col-md-2 pub_img_con">
                            <button class="btn btn-primary btn-block">Read more</button>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</main>
<?php
require_once "theme/default/footer.php";
?>
