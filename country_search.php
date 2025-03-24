<html></html>
<head>
  
<center>
  <table border="2" id="myTable">
    <thead>
      <tr>
        <th>id</th>
        <th>name</th>
        <th>status</th>
        <th>create date</th>
        <th>Update</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
<?php
require 'configure.php';
$search_value = $_POST['value'];
$sql = "SELECT * FROM country WHERE name LIKE '%$search_value%'";
$data = mysqli_query($conn, $sql);
$result = mysqli_num_rows($data);
if ($result) {
    while ($r = mysqli_fetch_array($data)) {?>
        <tr>
          <td><?php echo $r['id']; ?></td>
          <td><?php echo $r['name']; ?></td>
          <td><?php echo $r['status']; ?></td>
          <td><?php echo $r['create_date']; ?></td>
          <td>
            <button
              class="update_btn"
              data-name="<?php echo $r['name']; ?>"
              style="background-color: rgb(41, 86, 176)"
            >
              Update
            </button>
          </td>
          <td>
            <button
              class="delete_btn"
              data-name="<?php echo $r['name']; ?>"
              style="background-color:rgb(217, 54, 70)"
            >
              Delete
            </button>
          </td>
        </tr>
        <?php
                }
            } else {
            ?>
        <tr>
          <td colspan="4">Data not found</td>
        </tr>
        <?php
            }
            ?>
      </tbody>
    </table>
  </center>
</html>
