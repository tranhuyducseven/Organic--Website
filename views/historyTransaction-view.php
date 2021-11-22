<!-- blog-view.php sẽ render ra phần lõi nội dung, frontend sẽ sửa thêm phần này -->

<?php

class HistoryTransactionView{
    public function showAllHistoryTransaction($historyTransactions){
        echo '<table style="border-collapse: collapse;width: 100%;">';
        echo '<tr>
        <th style = "border: 1px solid #dddddd; text-align: left; padding: 8px;">ID</th>
        <th style = "border: 1px solid #dddddd; text-align: left; padding: 8px;">ID_product</th>
        <th style = "border: 1px solid #dddddd; text-align: left; padding: 8px;">Quantity</th>
        <th style = "border: 1px solid #dddddd; text-align: left; padding: 8px;">Day</th>
        </tr>';
        if (sizeof($historyTransactions) > 0)
        {
            foreach ($historyTransactions as $historyTransaction):
                echo '<tr>';
                echo '<td style = "border: 1px solid #dddddd; text-align: left; padding: 8px;">' . $historyTransaction['ID'] . '</td>';
                echo '<td style = "border: 1px solid #dddddd; text-align: left; padding: 8px;">' . $historyTransaction['ID_product'] . '</td>';
                echo '<td style = "border: 1px solid #dddddd; text-align: left; padding: 8px;">'. $historyTransaction['Quantity'] . '</td>';
                echo '<td style = "border: 1px solid #dddddd; text-align: left; padding: 8px;">'. $historyTransaction['Day'] .'</td>';
                echo '</tr>';
            endforeach;
            echo '</table>';
        }
        else
        {
            echo '<tr>';
            echo '<td colspan="4" style = "border: 1px solid #dddddd; text-align: left; padding: 8px; text-align: center;">Your current data is empty</td>';
            echo '</tr>';
            echo '</table>';
        }
        
    }

    public function showFormHistoryTransaction_adminpage($action){
        if ($action == "addnew")
        {
            echo '<form method="post" action="">
            <p><input name="Username" type="text" placeholder="Username"></p>
            <p><input name="ID" type="text" placeholder="ID product"></p>
            <p><input name="Quantity" type="text" placeholder="Quantity"></p>
            <p><button name="submit" type="submit"> Save </button> </p>
            </form>';
        }
        else if ($action == "show")
        {
            echo '<form method="post" action="">
            <p><input name="Username" type="text" placeholder="Username"></p>
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
                        location.href = "historyTransaction.php";
                    else
                        location.href = "historyTransaction.php";
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