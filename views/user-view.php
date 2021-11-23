<!-- blog-view.php sẽ render ra phần lõi nội dung, frontend sẽ sửa thêm phần này -->

<?php

class UserView{
    public function showAllUser_userpage($users){
        foreach ($users as $user):
            
        endforeach;
    }

    public function showAllUser_adminpage($users){
        echo '<table style="border-collapse: collapse;width: 100%;">';
        echo '<tr>
        <th style = "border: 1px solid #dddddd; text-align: left; padding: 8px;">Username</th>
        <th style = "border: 1px solid #dddddd; text-align: left; padding: 8px;">Email</th>
        <th style = "border: 1px solid #dddddd; text-align: left; padding: 8px;">Phone Number</th>
        <th style = "border: 1px solid #dddddd; text-align: left; padding: 8px;">Avatar Link</th>
        <th style = "border: 1px solid #dddddd; text-align: left; padding: 8px;">Comment Permission</th>
        <th style = "border: 1px solid #dddddd; text-align: left; padding: 8px;">Action</th>
        </tr>';

        foreach ($users as $user):
            echo '<tr>';
            echo '<td style = "border: 1px solid #dddddd; text-align: left; padding: 8px;">' . $user['Username'] . '</td>';
            echo '<td style = "border: 1px solid #dddddd; text-align: left; padding: 8px;">' . $user['Email'] . '</td>';
            echo '<td style = "border: 1px solid #dddddd; text-align: left; padding: 8px;">'. $user['PhoneNumber']. '</td>';
            echo '<td style = "border: 1px solid #dddddd; text-align: left; padding: 8px;">'. $user['Avatar'] .'</td>';
            echo '<td style = "border: 1px solid #dddddd; text-align: left; padding: 8px;">' . (($user['PermissionComment'] == 1)? "ALLOW": "BAN") . '</td>';
            echo '<td style = "border: 1px solid #dddddd; text-align: left; padding: 8px;">
                    <form method="POST" action="admin.php?ctrl=user&username=' . $user['Username'] . '"';
            if ($user['PermissionComment'] == 1)
                echo '<p><button name="ban" type="ban"> Ban User </button> </p>';
            else
                echo '<p><button name="unban" type="unban"> Unban User </button> </p>';
                echo '<p><button name="del" type="del"> Delete User </button> </p>
                    </form>
                  </td>';
            echo '</tr>';
        endforeach;
        echo '</table>';
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