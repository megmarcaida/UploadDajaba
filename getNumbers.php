<?php
require_once("dbcontroller.php");
$db_handle = new DBController();


$sql = "SELECT * from users order by id asc ";


$faq = $db_handle->runQuery($sql);

$output = '<table class="table table-responsive table-condensed"><tr><th>#</th><th>UserID</th> <th>Status</th></tr>';
$i=1;
if ($faq) {
    foreach ($faq as $k => $v) {
        switch ($faq[$k]["status"]){
            case "Y":
                $output .= '<tr class="bg-success">';
            break;
            case "N":
                $output .= '<tr class="bg-danger">';
                break;
            case "0":
                $output .='<tr class="bg-default">';
                break;
        }
        $output .= '<td>' . $i++ . '</td>';
        $output .= '<td>' . $faq[$k]["userid"] . '</td>';
        $output .= '<td>' . $faq[$k]["password"] . '</td>';
        $output .= '<td>' . $faq[$k]["status"] . '</td>';
        $output .= '</tr>';
    }
    $output .= "</table>";
}
print $output;

?>
