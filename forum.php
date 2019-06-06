<?php
/**
 * Created by PhpStorm.
 * User: Shuaiqiang Yin
 */

$page_type = 7;
require_once "theme/default/header.php";
require_once 'config/database.Connection.php';
/*Main Start*/
?>
<main>
    <div class="container publications">
        <div class="other_main_title">
            <h2 class="publications">Forums</h2>
        </div>
        <form method="post" action="api.php">
        <div class="contact">
            <ul class="result-list">
                <?php
                    $SQL = "SELECT Title, Comment, Date_Posted, Member_ID FROM `forum` ORDER BY Date_Posted DEC";
                    $res = mysqli_query($mysql_con, $SQL);
                    while ($row = mysqli_fetch_row($res)){
                        $SQL = "SELECT First_Name, Last_Name FROM `client` WHERE Client_ID = '" . $row[3] . "'";
                        $res2 = mysqli_query($mysql_con, $SQL);
                        $row2 = mysqli_fetch_row($res2);
                        $date = strtotime($row[2]);
                        $date = date("d/M/Y", $date);
                        echo "<li class=\"result-list-li\">";
                        echo "<div class=\"row\">";
                        echo "<div class=\"col-md-3 pub_img_con\">";
                        echo "<img class=\"pub-img\" src=\"./static/img/health.png\">";
                        echo "</div>";
                        echo "<div class=\"col-md-7\">";
                        echo "<h3 class=\"pub-title\">";
                        echo $row[0];
                        echo "</h3>";
                        echo "<span class=\"pub-author\">By $row2[0] $row2[1] ($date)</span>
                            <br>
                            <br>
                            <subtitle class=\"pub-preview\">$row[1]</subtitle>
                        </div>";
                        echo "<div class=\"col-md-2 pub_img_con\">
                            <button class=\"btn btn-primary btn-block\" onclick=\"\">Read more</button>
                        </div>
                    </div>
                </li>
                <hr>";
                    }
                ?>
            </ul>
        </div>
    </div>
</main>
<?php
require_once "theme/default/footer.php";
?>
