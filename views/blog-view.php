<!-- blog-view.php sẽ render ra phần lõi nội dung, frontend sẽ sửa thêm phần này -->

<?php

class BlogView{
    public function showAllBlog($blogs){
        foreach ($blogs as $blog):
            echo '<div class="organic-blog__item">
                <img src="'. $blog['Image'] .'" alt="" class="organic-blog__image">
                <ul class="organic-blog__list">
                    <li class="organic-blog__author">
                        <img src="assets/img/vegetables.png" alt="" class="organic-blog__author-ava"> By <span class="organic-blog__author-name">Admin</span>
                    </li>
                    <li class="organic-blog__comment">
                        <i class="fas fa-comments"></i>
                        <span class="organic-blog__comment-counter">0</span>
                        <span>Comment</span>
                    </li>
                    <li class="organic-blog__date">
                        <span class="p-cpn-item-4th__info-time ">
                            <i class="far fa-calendar-alt "></i>
                            '. $blog['Day'] .'
                        </span>
                    </li>
                </ul>
                <h2 class="organic-blog__title">
                    '. $blog['Title'] .'
                </h2>
                <div class="organic-blog__btn">
                    <a class="organic-blog__btn-link " href="./blog-item.php?id='. $blog['ID'] .'">Read more
                        <i class="fas fa-angle-double-right organic-blog__btn-link-icon"></i></a>
                </div>
            </div>';
        endforeach;
    }

    public function getAllBlog_homepage($blogs){
        foreach ($blogs as $blog):
           echo '<div class="col ">
           <div class="p-cpn-item-4th ">
               <img class="p-cpn-item-4th__img " src="'. $blog['Image'] .'" alt=" " />
               <div class="p-cpn-item-4th__wrapper ">
                   <div class="overlay ">
                   </div>
                   <div class="p-cpn-item-4th__info ">
                       <span class="p-cpn-item-4th__info-time ">
                           <i class="far fa-calendar-alt "></i>
                           '. $blog['Day'] .'
                       </span>
                       
                   </div>
                   <div class="p-cpn-item-4th__content ">
                       <a class="p-cpn-item-4th__title " href="blog.php">'. $blog['Title'] .'</a>
                       <span class="p-cpn-item__break "><span></span></span>
                       <p class="p-cpn-item-4th__paragraph ">
                       '. $blog['Description'] .'
                       </p>
                   </div>
               </div>
           </div>
       </div>';
        endforeach;
    }

    public function showOneBlog($blog){
        echo '<h1 class="details-title">
                '. $blog['Title'] .'
            </h1>
            <p class="details-description">
                '. $blog['Description'] .'
            </p>
            <div class="details-images">
                <img src="'. $blog['Image'] .'">
            </div>
            <div class="details-article">
                '. $blog['Content'] .'
            </div>
            <div class="details-author">
                    <img src="assets/img/vegetables.png" alt="" class="details-author-ava"> By <span class="details-author-name">Admin</span>
                    <span class="details-date">'. $blog['Day'] .'</span>
            </div>';
    }

    public function showAllBlog_adminpage($blogs){
        echo '<table style="border-collapse: collapse;width: 100%;">';
        echo '<tr>
        <th style = "border: 1px solid #dddddd; text-align: left; padding: 8px;">ID</th>
        <th style = "border: 1px solid #dddddd; text-align: left; padding: 8px;">Image</th>
        <th style = "border: 1px solid #dddddd; text-align: left; padding: 8px;">Title</th>
        <th style = "border: 1px solid #dddddd; text-align: left; padding: 8px;">Content</th>
        <th style = "border: 1px solid #dddddd; text-align: left; padding: 8px;">Tag</th>
        <th style = "border: 1px solid #dddddd; text-align: left; padding: 8px;">Day</th>
        <th style = "border: 1px solid #dddddd; text-align: left; padding: 8px;">Description</th>
        <th style = "border: 1px solid #dddddd; text-align: left; padding: 8px;">Change information</th>
        </tr>';
        foreach ($blogs as $blog):
            echo '<tr>';
            echo '<td style = "border: 1px solid #dddddd; text-align: left; padding: 8px;">' . $blog['ID'] . '</td>';
            echo '<td style = "border: 1px solid #dddddd; text-align: left; padding: 8px;">' . $blog['Image'] . '</td>';
            echo '<td style = "border: 1px solid #dddddd; text-align: left; padding: 8px;">'. $blog['Title'] . '</td>';
            echo '<td style = "border: 1px solid #dddddd; text-align: left; padding: 8px;">'. $blog['Content'] .'</td>';
            echo '<td style = "border: 1px solid #dddddd; text-align: left; padding: 8px;">'. $blog['Tag'] .'</td>';
            echo '<td style = "border: 1px solid #dddddd; text-align: left; padding: 8px;">'. $blog['Day'] .'</td>';
            echo '<td style = "border: 1px solid #dddddd; text-align: left; padding: 8px;">' . $blog['Description'] . '</td>';
            echo '<td style = "border: 1px solid #dddddd; text-align: left; padding: 8px;">
                    <form method="post"> 
                        <p><button name="editInfo" type="submit" value="' . $blog['ID'] . '">Edit</button></p>
                        <p><button name="deleteInfo" type="submit" value="' . $blog['ID'] . '">Delete</button></p>
                    </form>
                  </td>';
            echo '</tr>';
        endforeach;
        echo '</table>';
    }

    public function showFormBlog_adminpage($action){
        if ($action == "addnew")
        {
            echo '<form method="post" action="">
            <p><input name="Image" type="text" placeholder="Image"></p>
            <p><input name="Title" type="text" placeholder="Title"></p>
            <p><input name="Content" type="text" placeholder="Content"></p>
            <p><input name="Tag" type="text" placeholder="Tag"></p>
            <p><input name="Description" type="text" placeholder="Description"></p>
            <p><button name="submit" type="submit"> Save </button> </p>
            </form>';
        }
        else if ($action == "edit")
        {
            echo '<form method="post" action="">
            <p><input name="Image" type="text" placeholder="Image" value="'. $_SESSION['Image'] .'"</p>
            <p><input name="Title" type="text" placeholder="Title" value="'. $_SESSION['Title'] .'"</p>
            <p><input name="Content" type="text" placeholder="Content" value="'. $_SESSION['Content'] .'"</p>
            <p><input name="Tag" type="text" placeholder="Tag" value="'. $_SESSION['Tag'] .'"</p>
            <p><input name="Description" type="text" placeholder="Description" value="'. $_SESSION['Description'] .'"</p>
            <p><button name="submit" type="submit"> Save </button> </p>
            </form>';
        }
    }

    public function alertResultPopUp($ctrl, $result) {
        if ($result == true)
        {
            echo '<script>
                    var result = confirm("Successfully");
                    if (result)
                        location.href = "admin.php?ctrl='. $ctrl .'";
                    else
                        location.href = "admin.php?ctrl='. $ctrl .'";
                  </script>';
        }
        else
        {
            echo '<script>
                    alert("Failed");
                  </script>';
        }
    }
}

?>