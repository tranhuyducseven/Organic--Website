<!-- blog-view.php sẽ render ra phần lõi nội dung, frontend sẽ sửa thêm phần này -->

<?php

class UserView{
    public function showAllUser_userpage($users){
        foreach ($users as $user):
            
        endforeach;
    }

    public function showAllUser_adminpage($users){
        echo ""
        ,    "<table class=&quottable&quot>"
        ,    "<thead>"
        ,        "<tr>"
        ,        "<th scope=&quotcol&quot>Username</th>"
        ,        "<th scope=&quotcol&quot>Email</th>"
        ,        "<th scope=&quotcol&quot>Phone Number</th>"
        ,        "<th scope=&quotcol&quot>Avatar Link</th>"
        ,        "<th scope=&quotcol&quot>Comment Permission</th>"
        ,        "<th scope=&quotcol&quot>Action</th>"
        ,        "</tr>"
        ,    "</thead>"
        ,       "<tbody>";
        foreach ($users as $user):
            echo ""
            ,    "<tr>"
            ,    "<td>" , $user['Username'] , "</td>"
            ,    "<td>" , $user['Email'] , "</td>"
            ,    "<td>" , $user['PhoneNumber'] , "</td>"
            ,    "<td>" , $user['Avatar'] , "</td>"
            ,    "<td>" , $user['PermissionComment'] , "</td>"
            ,    "<td>"  
            ,       '<form method="POST" action="admin.php?ctrl=user&username=' , $user['Username'] , '"';
            if ($user['PermissionComment'] == 1){
                echo '<p><button name="ban" type="ban"> Ban User </button> </p>';
            }
            else echo '<p><button name="unban" type="unban"> Unban User </button> </p>';
            echo '<p><button name="del" type="del"> Delete User </button> </p>'
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