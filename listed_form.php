<?php
require 'configure.php';
?>
<html>
  <head>
    <title>Listed</title>
    <!-- <link
      rel="stylesheet"
      href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css"
    />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script>
      $(document).ready(function () {
        $("#myTable").DataTable();
      });
    </script> -->
    <style>
      table td {
        text-align: center;
      }

      /* Responsive styling for the table */
      @media (max-width: 768px) {
        table {
          width: 90%;
          margin: 20px auto;
        }

        .delete_btn {
          font-size: 12px;
          padding: 6px 12px;
        }
      }
    </style>
  </head>

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
            $sql = "SELECT * FROM country";
            $data = mysqli_query($conn, $sql);
            $result = mysqli_num_rows($data);
            if ($result) {
                while ($r = mysqli_fetch_array($data)) {
            ?>
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
          <td colspan="6">Data not found</td>
        </tr>
        <?php
            }
            ?>
      </tbody>
    </table>
  </center>
</html>
