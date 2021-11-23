<!-- blog-view.php sẽ render ra phần lõi nội dung, frontend sẽ sửa thêm phần này -->

<?php

class HistoryTransactionView{
    public function showAllHistoryTransaction_adminpage($historyTransactions){
        echo '<h1 class="admin-view-transaction">View History Transactions <i class="far fa-eye"></i></h1>';
        echo '<table>';
        echo '<tr>
        <th>ID</th>
        <th>USERNAME</th>
        <th>PRODUCT ID</th>
        <th>IMAGE</th>
        <th>PRODUCT NAME</th>
        <th>PRICE</th>
        <th>QUANTITY</th>
        <th>TOTAL</th>
        <th>DAY</th>
        </tr>';
        if (sizeof($historyTransactions) > 0)
        {
            foreach ($historyTransactions as $historyTransaction):
                echo '<tr>';
                echo '<td class="admin-transaction-ID">' . $historyTransaction['ID'] . '</td>';
                echo '<td class="admin-transaction-username">' . $historyTransaction['Username'] . '</td>';
                echo '<td class="admin-transaction-ID_product">' . $historyTransaction['ID_product'] . '</td>';
                echo '<td class="admin-transaction-img">
                        <img src="' . $historyTransaction['Image'] . '">
                     </td>';
                echo '<td class="admin-transaction-name_product">' . $historyTransaction['Name_product'] . '</td>';
                echo '<td class="admin-transaction-price">' . $historyTransaction['Price'] . '</td>';
                echo '<td class="admin-transaction-quantity">'. $historyTransaction['Quantity'] . '</td>';
                echo '<td class="admin-transaction-total">' . $historyTransaction['Total'] . '</td>';
                echo '<td class="admin-transaction-day">'. $historyTransaction['Day'] .'</td>';
                echo '</tr>';
            endforeach;
            echo '</table>';
        }
        else
        {
            echo '<tr>';
            echo '<td colspan="9" style = "border: 1px solid #dddddd; text-align: left; padding: 8px; text-align: center; width: 100%;">Your current data is empty</td>';
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