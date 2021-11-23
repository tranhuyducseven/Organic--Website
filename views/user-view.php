<!-- blog-view.php sẽ render ra phần lõi nội dung, frontend sẽ sửa thêm phần này -->

<?php

class UserView{
    public function showAllUser_userpage($users){
        foreach ($users as $user):
            
        endforeach;
    }

    public function showAllUser_adminpage($users){
        echo '<h1 class="admin-view-customer">View Customer <i class="far fa-eye"></i></h1>';
        echo ""
        ,    "<table class=&quottable&quot>"
        ,    "<thead>"
        ,        "<tr>"
        ,        "<th scope=&quotcol&quot>USERNAME</th>"
        ,        "<th scope=&quotcol&quot>EMAIL</th>"
        ,        "<th scope=&quotcol&quot>PHONE NUMBER</th>"
        ,        "<th scope=&quotcol&quot>AVATAR LINK</th>"
        ,        "<th scope=&quotcol&quot>COMMENT PERMISSION</th>"
        ,        "<th scope=&quotcol&quot>OPERATION</th>"
        ,        "</tr>"
        ,    "</thead>"
        ,       "<tbody>";
        foreach ($users as $user):
            echo ""
            .    "<tr>"
            .    "<td class='admin-customer-username'>" . $user['Username'] . "</td>"
            .    "<td class='admin-customer-email'>" . $user['Email'] . "</td>"
            .    "<td class='admin-customer-phone'>" . $user['PhoneNumber'] . "</td>"
            .    "<td class='admin-customer-avatar'>" . $user['Avatar'] . "</td>"
            .    "<td class='admin-customer-permissionCmt'>" . (($user['PermissionComment'] == 1)? "ALLOW" : "BAN") . "</td>";
            echo    "<td>"  
            ,       '<form method="POST" class="admin-customer-btn-group" action="admin.php?ctrl=user&username=' , $user['Username'] , '"';
            if ($user['PermissionComment'] == 1){
                echo '<div><button class="admin-customer-ban" name="ban" type="ban"> BAN USER </button></div>';
            }
            else echo '<div><button class="admin-customer-unban" name="unban" type="unban"> UNBAN USER </button></div>';
            echo '<button name="del" type="del"> DELETE USER </button>'
            ,       '</form>'
            ,    "</td>"
            ,    "</tr>";
        endforeach;
        echo ""
        ,    "</tbody>"
        ,    "</table>";
    }

    public function showOneUser_userpage($user){
        $permission = "Được phép bình luận";
        if ($user['PermissionComment'] == 0)
            $permission = "Không Được phép bình luận";
        echo '
            <form method="POST">
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" value="' , $user['Username'] , '" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" value="' , $user['Password'] , '">
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" value="' , $user['Email'] , '">
                </div>
                <div class="mb-3">
                    <label class="form-label">Phone Number</label>
                    <input type="text" class="form-control" name="phone" value="' , $user['PhoneNumber'] , '">
                </div>
                <div class="mb-3">
                    <label class="form-label">Avatar Link</label>
                    <input type="text" class="form-control" name="avatar" value="' , $user['Avatar'] , '">
                </div>
                <div class="mb-3">
                    <label class="form-label">Quyền bình luận</label>
                    <input type="text" class="form-control" name="commentper" value="' , $permission , '" readonly>
                </div>
                <input type="submit" name = "submit" class="btn btn-primary" value="Submit"></input>
            </form>
        ';
    }

    public function alertResultPopUp($result, $locationTrue, $locationFalse, $messTrue, $messFalse) {
        if ($result == true)
        {
            echo '<script>
                    var result = confirm("' . $messTrue . '");
                    if (result)
                        location.href = "' . $locationTrue . '";
                    else
                        location.href = "' . $locationTrue . '";
                  </script>';
        }
        else
        {
            echo '<script>
                    var result = confirm("' . $messFalse . '");
                    if (result)
                        location.href = "' . $locationFalse . '";
                    else
                        location.href = "' . $locationFalse . '";
                  </script>';
        }
    }

    public function confirmPopUp($mess){
        echo '<script>
            var result = confirm("' . $mess . '");
            var url = window.location.href;  
            if (result){
                url += "&confirm=true"
                location.href = url;
            }
            else{
                url += "&confirm=false"
                location.href = url;
            }
            </script>';
    }
}

?>