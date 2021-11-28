<?php
const HOST = 'localhost';
const USERNAME = 'root';
const PASSWORD = '';
const DATABASE = 'ses_examples';
function execute($sql)
{
    $conn = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
    if (!$conn) {
        die('Not connected : ' . mysqli_error($conn));
    }

    $result = mysqli_query($conn, $sql);
    if (!$result) {
        $message = 'Invalid query: ' . mysqli_error($conn) . "<br>";
        $message .= 'Whole query: ' . $sql;
        die($message);
    }
    mysqli_close($conn);
}
function executeResult($sql)
{
    $conn = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
    if (!$conn) {
        die('Not connected : ' . mysqli_error($conn));
    }

    $resultset = mysqli_query($conn, $sql);
    if (!$resultset) {
        $message = 'Invalid query: ' . mysqli_error($conn) . "<br>";
        $message .= 'Whole query: ' . $sql;
        die($message);
    }
    $data = [];
    while ($row = mysqli_fetch_array($resultset, 1)) {
        $data[] = $row;
    }
    mysqli_close($conn);
    return $data;
}
