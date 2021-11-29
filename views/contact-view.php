<?php

class ContactView{
    public function showContactFooter($contacts){
        foreach ($contacts as $contact):
            echo '<li>
                    <p class="contact_info">Phone:</p>
                    <a target="blank" href="./contact.php">'. $contact['phone'] .'</a>
                </li>
                <li>
                    <p class="contact_info">Email:</p>
                    <a target="blank" href="https://mail.google.com/">'. $contact['email'] .'</a>
                </li>';
            return;
        endforeach;
    }

    public function showAllContact_adminpage($contacts){
        $output = "";
        $output .= '<h1 class="admin-view-product">View Contact <i class="far fa-eye"></i></h1>';
        $output .= '<table class=&quottable&quot>
                        <thead>
                            <tr>
                                <th scope=&quotcol&quot>PHONE NUMBER</th>
                                <th scope=&quotcol&quot>ADDRESS</th>
                                <th scope=&quotcol&quot>EMAIL</th>
                                <th>OPERATION</th>
                            </tr>
                        </thead>
                        <tbody>';
        foreach ($contacts as $contact):
            $output .= '<tr>
                            <td class="admin-contact-phone">' . $contact['phone'] . '</td>
                            <td class="admin-contact-address">' . $contact['address'] . '</td>
                            <td class="admin-contact-email">' . $contact['email'] . '</td>
                            <td>  
                                <form method="post" class="admin-product-btn-group"> 
                                    <button name="editInfo" type="submit" value="' . $contact['id'] . '">EDIT</button>
                                    <button name="deleteInfo" type="submit" value="' . $contact['id'] . '">DELETE</button>
                                </form>
                            </td>
                        </tr>';
        endforeach;
        $output .=      '</tbody>
                    </table>';
        return $output;
    }

    public function showFormContact_adminpage($action){
        $output = "";
        if ($action == "addnew")
        {
            $output .= '<h1 class="admin-add-product">Add Contact <i class="material-icons">library_add</i></h1>
                          <form method="post" action="" class="add-product-form">
                          <div class="add-product-info row">
                            <label for="add-product-img" class="col-3">PHONE NUMBER</label>
                            <input id="add-product-img" class="col-9" name="phone" type ="text">
                          </div>
                          <div class="add-product-info row">
                            <label for="add-product-name" class="col-3">ADDRESS</label>
                            <input id="add-product-name" class="col-9" name="address" type="text">
                          </div>
                          <div class="add-product-info row">
                            <label for="add-product-price" class="col-3">EMAIL</label>
                            <input id="add-product-price" class="col-9" name="email" type="email">
                          </div>
                          <div class="add-product-info row">
                            <button class="offset-3" name="submit" type="submit">SAVE</button>
                          </div>
                        </form>';
        }
        else if ($action == "edit")
        {
            $output .= '<h1 class="admin-add-product">Edit Contact <i class="fas fa-edit edit-icon"></i></h1>
                        <form method="post" action="" class="add-product-form">
                          <div class="add-product-info row">
                            <label for="add-product-img" class="col-3">PHONE NUMBER</label>
                            <input id="add-product-img" class="col-9" name="phone" type="text" value="'. $_SESSION['phone'] .'">
                          </div>
                          <div class="add-product-info row">
                            <label for="add-product-name" class="col-3">ADDRESS</label>
                            <input id="add-product-name" class="col-9" name="address" type="text" value="'. $_SESSION['address'] .'">
                          </div>
                          <div class="add-product-info row">
                            <label for="add-product-price" class="col-3">EMAIL</label>
                            <input id="add-product-price" class="col-9" name="email" type="email" value="'. $_SESSION['email'] .'">
                          </div>
                          
                          <div class="add-product-info row">
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

    public function confirmPopUp($mess, $id){
        echo '<script>
            var result = confirm("' . $mess . '");
            var url = window.location.href;  
            if (result){
                url = "admin.php?ctrl=contact&confirm=true&deleteInfo='.$id.'";
                location.href = url;
            }
            else{
                url = "admin.php?ctrl=contact&confirm=false&deleteInfo='.$id.'";
                location.href = url;
            }
            </script>';
    }
}

?>