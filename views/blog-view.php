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
        $output = "";
        $output .= '<h1 class="admin-view-blog">View Blog <i class="far fa-eye"></i></h1>
                    <table>
                      <tr>
                        <th>ID</th>
                        <th>IMAGE</th>
                        <th>TITLE</th>
                        <th>CONTENT</th>
                        <th>TAG</th>
                        <th>DAY</th>
                        <th>DESCRIPTION</th>
                        <th>OPERATION</th>
                      </tr>';
        foreach ($blogs as $blog):
            $output .= '<tr>
                          <td class="admin-blog-ID">' . $blog['ID'] . '</td>
                          <td class="admin-blog-img">
                              <img src="' . $blog['Image'] . '" alt="">
                          </td>
                          <td class="admin-blog-title">'. $blog['Title'] . '</td>
                          <td class="admin-blog-content">'. $blog['Content'] .'</td>
                          <td class="admin-blog-tag">'. $blog['Tag'] .'</td>
                          <td class="admin-blog-day">'. $blog['Day'] .'</td>
                          <td class="admin-blog-descr">' . $blog['Description'] . '</td>
                          <td>
                              <form method="post"  class="admin-blog-btn-group"> 
                                  <button name="editInfo" type="submit" value="' . $blog['ID'] . '">EDIT</button>
                                  <button name="deleteInfo" type="submit" value="' . $blog['ID'] . '">DELETE</button>
                              </form>
                          </td>
                        </tr>';
        endforeach;
        $output .= '</table>';
        return $output;
    }

    public function showFormBlog_adminpage($action){
        $output = "";
        if ($action == "addnew")
        {
            $output .= '<h1 class="admin-add-blog">Add Blog <i class="material-icons">library_add</i></h1>
                        <form method="post" action="" class="add-blog-form">
                          <div class="add-blog-info row">
                            <label for="add-blog-img" class="col-3">IMAGE LINK</label>
                            <input id="add-blog-img" class="col-9" name="Image" type="url">
                          </div>
                          <div class="add-blog-info row">
                            <label for="add-blog-title" class="col-3">TITLE</label>
                            <input id="add-blog-title" class="col-9" name="Title" type="text">
                          </div>
                          <div class="add-blog-info row">
                            <label for="add-blog-content" class="col-3">CONTENT</label>
                            <textarea id="add-blog-content" class="col-9" name="Content"></textarea>
                          </div>
                          <div class="add-blog-info row">
                            <label for="add-blog-tag" class="col-3">TAG</label>
                            <input id="add-blog-tag" class="col-9" name="Tag" type="text">
                          </div>            
                          <div class="add-blog-info row">
                            <label for="add-blog-descr" class="col-3">DESCRIPTION</label>
                            <textarea id="add-blog-descr" class="col-9" name="Description"></textarea>
                          </div>
                          <div class="add-blog-info row">
                            <button class="offset-3" name="submit" type="submit">SAVE</button>
                          </div>
                        </form>';
        }
        else if ($action == "edit")
        {
            $output .= '<h1 class="admin-add-blog">Edit Blog <i class="fas fa-edit edit-icon"></i></h1>
                        <form method="post" action="" class="add-blog-form">
                          <div class="add-blog-info row">
                            <label for="add-blog-img" class="col-3">IMAGE LINK</label>
                            <input id="add-blog-img" class="col-9" name="Image" type="url" value="'. $_SESSION['Image'] .'">
                          </div>
                          <div class="add-blog-info row">
                            <label for="add-blog-title" class="col-3">TITLE</label>
                            <input id="add-blog-title" class="col-9" name="Title" type="text" value="'. $_SESSION['Title'] .'">
                          </div>
                          <div class="add-blog-info row">
                            <label for="add-blog-content" class="col-3">CONTENT</label>
                            <textarea id="add-blog-content" class="col-9" name="Content">'. $_SESSION['Content'] .'</textarea>
                          </div>
                          <div class="add-blog-info row">
                            <label for="add-blog-tag" class="col-3">TAG</label>
                            <input id="add-blog-tag" class="col-9" name="Tag" type="text" value="'. $_SESSION['Tag'] .'">
                          </div>            
                          <div class="add-blog-info row">
                            <label for="add-blog-descr" class="col-3">DESCRIPTION</label>
                            <textarea id="add-blog-descr" class="col-9" name="Description">'. $_SESSION['Description'] .'</textarea>
                          </div>
                          <div class="add-blog-info row">
                              <button class="offset-3" name="submit" type="submit">SAVE</button>
                          </div>
                        </form>';
        }
        return $output;
    }

    public function alertResultPopUp($ctrl, $result) {
        $output = "";
        if ($result == true)
        {
            $output .= '<script>
                    var result = confirm("Successfully");
                    if (result)
                        location.href = "admin.php?ctrl='. $ctrl .'";
                    else
                        location.href = "admin.php?ctrl='. $ctrl .'";
                  </script>';
        }
        else
        {
            $output .= '<script>
                    alert("Failed");
                  </script>';
        }
        return $output;
    }

    public function showAllTag($tags){
        foreach ($tags as $tag):
          echo '<a class="tag-cloud" href="blog.php?tag='. $tag .'">'. $tag .'</a>';
        endforeach;
    }

    public function confirmPopUp($mess, $id){
      echo '<script>
          var result = confirm("' . $mess . '");
          var url = window.location.href;  
          if (result){
              url = "admin.php?ctrl=blog&confirm=true&deleteInfo='.$id.'";
              location.href = url;
          }
          else{
              url = "admin.php?ctrl=blog&confirm=false&deleteInfo='.$id.'";
              location.href = url;
          }
          </script>';
    }
}

?>