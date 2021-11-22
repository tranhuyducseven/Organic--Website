<?php

class CommentView{
    public function showAllComment($comments){
        echo '<table style="border-collapse: collapse;width: 100%;">';
        echo '<tr>
        <th style = "border: 1px solid #dddddd; text-align: left; padding: 8px;">ID</th>
        <th style = "border: 1px solid #dddddd; text-align: left; padding: 8px;">Username</th>
        <th style = "border: 1px solid #dddddd; text-align: left; padding: 8px;">Content</th>
        </tr>';
        if (sizeof($comments) > 0)
        {
            foreach ($comments as $comment):
                echo '<tr>';
                echo '<td style = "border: 1px solid #dddddd; text-align: left; padding: 8px;">' . $comment['ID'] . '</td>';
                echo '<td style = "border: 1px solid #dddddd; text-align: left; padding: 8px;">'. $comment['Username'] . '</td>';
                echo '<td style = "border: 1px solid #dddddd; text-align: left; padding: 8px;">'. $comment['Content'] .'</td>';
                echo '</tr>';
            endforeach;
            echo '</table>';
        }
        else
        {
            echo '<tr>';
            echo '<td colspan="3" style = "border: 1px solid #dddddd; text-align: left; padding: 8px; text-align: center;">Your current data is empty</td>';
            echo '</tr>';
            echo '</table>';
        }
        
    }

    public function showAllCommentOfBlog($comments, $users) {
        foreach ($comments as $comment):
            echo '<div class="organic-comment__item">
                    <div class="organic-comment__ava">
                        <img src="'. $users[$comment['Username']]['Image'] .'">
                    </div>
                    <div class="organic-comment__content">
                        <span class="organic-comment__name">'. $comment['Username'] .'</span>
                        <span class="organic-comment__time"><i class="far fa-clock"></i>'. $comment['Time'] .'</span>
                        <p class="organic-comment__text">
                            '. $comment['Content'] .'
                        </p>
                    </div>
                </div>';
        endforeach;
    }

    public function showFormComment_adminpage($action){
        if ($action == "addnew")
        {
            echo '<form method="post" action="">
            <p><input name="Username" type="text" placeholder="Username"></p>
            <p><input name="ID" type="text" placeholder="ID blog"></p>
            <p><input name="Content" type="text" placeholder="Content"></p>
            <p><button name="submit" type="submit"> Save </button> </p>
            </form>';
        }
        else if ($action == "show")
        {
            echo '<form method="post" action="">
            <p><input name="ID" type="text" placeholder="ID blog"></p>
            <p><button name="submit" type="submit"> Show result </button> </p>
            </form>';
        }
    }

    public function alertResultPopUp($result) {
        if ($result == true)
        {
            echo '<script>
                    var result = confirm("Successfully");
                    if (result)
                        location.href = "comment.php";
                    else
                        location.href = "comment.php";
                  </script>';
        }
        else
        {
            echo '<script>
                    alert("Failed");
                  </script>';
        }
    }

    public function showError($checkUserName) {
        if ($checkUserName == -1)
            echo 'Your username is not exist!';
        else
            echo 'You cant comment this blog!';
    }

}

?>