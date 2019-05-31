<?php
/**
 * Created by PhpStorm.
 * User: Shuaiqiang Yin
 */

$page_type = 2;
require_once "theme/default/header.php";
/*Main Start*/
?>
<main class="container">
    <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-6">
            <div class="other_main_title">
                <h2>Post to forum</h2>
            </div>
            <form id="postForumForm" action="" method="post">
                <input id="Member_ID" type="hidden" name="Member_ID" value="<?php echo $_SESSION['UserID'];?>">
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" id="title" name="Title" placeholder="Title" required>
                </div>
                <div class="form-group">
                    <label for="comment">Comment:</label>
                    <textarea class="form-control" rows="5" id="comment" name="Comment" required maxlength="255" placeholder="Comment"></textarea>
                    <span class="float-right tag tag-default" id="count_message"></span>
                </div>
                <div class="form-group">
                    <button id="postForum" type="submit"
                            class="btn btn-primary btn-lg btn-block">
                        Post
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>
<?php
require_once "theme/default/footer.php";
?>
