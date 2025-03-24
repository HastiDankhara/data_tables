<?php
require 'configure.php';
$limit=5;
$page="";
if(isset($_POST["page"])){
  $page=$_POST["page"];
}
else{
  $page=1;
}
$offset = $page * $limit;

$sql = "SELECT * FROM country LIMIT {$offset}, {$limit}";
$data = mysqli_query($conn, $sql);
$result = mysqli_num_rows($data);

if ($result > 0) {
    $output = "<tbody>";

    while ($r = mysqli_fetch_array($data)) {
        $output .= "
        <tr>
          <td>".$r['id']."</td>
          <td>".$r['name']."</td>
          <td>".$r['status']."</td>
          <td>".$r['create_date']."</td>
          <td>
            <button class='update_btn' data-name='".$r['name']."' style='background-color: rgb(41, 86, 176)'>
              Update
            </button>
          </td>
          <td>
            <button class='delete_btn' data-name='".$r['name']."' style='background-color:rgb(217, 54, 70)'>
              Delete
            </button>
          </td>
        </tr>";
    }

    $output .= "</tbody>";

    // Check if more records exist
    $total_query = "SELECT COUNT(*) AS total FROM country";
    $total_result = mysqli_query($conn, $total_query);
    $total_data = mysqli_fetch_assoc($total_result);
    $total_records = $total_data['total'];

    $next_page = $page + 1;
    $total_pages = ceil($total_records / $limit);

    if ($next_page < $total_pages) {
        $output .= "<tbody id='load_pagi'>
            <tr>
                <td colspan='6'>
                    <button id='ajaxbtn' data-id='".$next_page."'>Load More</button>
                </td>
            </tr>
        </tbody>";
    }

    echo $output;
} else {
    echo "<tr><td colspan='6'>No more records found</td></tr>";
}
?>
