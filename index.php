<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>all_operation</title>
    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }

      body {
        font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f4f7fc;
        color: #333;
        margin-top: 20px;
      }

      h1 {
        text-align: center;
        color: #4caf50;
        font-size: 2em;
        margin-bottom: 20px;
        font-weight: 700;
      }

      label {
        font-size: 1.1em;
        color: #555;
        /* display: block; */
        margin-bottom: 5px;
      }

      button {
        width: 100%;
        padding: 12px;
        font-size: 1.2em;
        background-color: #4caf50;
        color: white;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        transition: background-color 0.3s ease;
      }

      button:hover {
        background-color: #45a049;
      }

      table {
        width: 100%;
        margin-top: 40px;
        border-collapse: collapse;
        border-radius: 8px;
        overflow: hidden;
        background-color: #fff;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      }

      th,
      td {
        padding: 12px 15px;
        text-align: left;
        border: 1px solid #ddd;
      }

      th {
        background-color: #4caf50;
        color: white;
        font-size: 1.1em;
      }

      td {
        font-size: 1em;
      }

      tr:nth-child(even) {
        background-color: #f9f9f9;
      }

      tr:hover {
        background-color: #f1f1f1;
      }

      .form-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        flex-direction: column;
      }
      #modal {
        background: rgba(0, 0, 0, 0.7);
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        display: none;
      }
      #modal form {
        background-color: #fff;
        width: 50%;
        position: relative;
        top: 20%;
        left: calc(50% - 15%);
        padding: 15px;
        border-radius: 5px;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        max-width: 450px;
      }

      #modal label {
        display: block;
        margin: 8px 0 6px;
        font-size: 14px;
        font-weight: 600;
      }

      #modal input {
        width: 100%;
        padding: 12px;
        margin-bottom: 20px;
        border-radius: 8px;
        border: 1px solid #ccc;
        box-sizing: border-box;
        font-size: 16px;
      }

      #modal input:focus {
        border-color: #28a745;
        outline: none;
        box-shadow: 0 0 5px rgba(40, 167, 69, 0.3);
      }

      .close_btn {
        color: white;
        background-color: red;
        border-radius: 50%;
        width: 30px;
        height: 30px;
        text-align: center;
        line-height: 30px;
        font-size: 18px;
        position: absolute;
        top: 100px;
        right: 368px;
        cursor: pointer;
        display: flex;
        justify-content: center;
        align-items: center;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
      }

      .close_btn:hover {
        background-color: #cc0000;
      }
      .pagination{
          display: flex;
      }
    
      .pagination 
        a {
        border-radius:5px;
        background-color:rgb(79, 150, 222);
        display: flex;
        justify-content: space-around;
        align-items: center;
        width: 100px;
        margin: 20px;
        height: 50px;
        text-decoration: none;
        color: white;
      }
      .pagination 
        a:hover{
        border-radius:5px;
        background-color:rgb(10, 105, 189);
        display: flex;
        justify-content: space-around;
        align-items: center;
        width: 100px;
        margin: 20px;
        height: 50px;
        text-decoration: none;
        color: white;
      }
      
    </style>
  </head>
  <body>
    <form method="post">
      <label for="name">Name</label>
      <input type="text" name="name" id="name" required />
      <label for="status">Status</label>
      <input name="status" id="status" placeholder="Active/Inactive" required />
      <label for="cd">Create Date</label>
      <input name="cd" id="cd" placeholder="0000-00-00" required /><br /><br />
      <button name="submit" id="submit_btn">SUBMIT</button><br />
    </form>
      <div class="search_bar"><br><br>
        <label for="search">Search</label>
        <input type="text" name="search" id="search" autocomplete="off" required />
      </div>
    <div id="modal">
      <form>
        <label for="modal_name">Name</label>
        <input type="text" name="name" id="modal_name" required />
        <label for="modal_status">Status</label>
        <input type="text" name="status" id="modal_status" required />
        <label for="modal_cd">Create Date</label>
        <input type="text" name="cd" id="modal_cd" required />
        <button type="button" name="update" id="update_btn">Update</button>
      </form>
      <div class="close_btn">X</div>
    </div>

    <table id="table_data">
      
    </table>
      
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
      $(document).ready(function () {
        // Load data
        function load() {
          $.ajax({
            url: "listed_form.php",
            type: "POST",
            success: function (data) {
              $("#table_data").html(data);
            },
          });
        }
        load();

        // Submit data
        $("#submit_btn").on("click", function (e) {
          e.preventDefault();
          var name = $("#name").val();
          var status = $("#status").val();
          var cd = $("#cd").val();
          $.ajax({
            url: "country_register.php",
            type: "POST",
            data: { name: name, status: status, cd: cd },
            success: function (data) {
              load();
            },
            error: function () {
              alert("Error during insert operation.");
            }
          });
        });

        // Delete data
        $(document).on("click", ".delete_btn", function () {
          var c_name = $(this).data("name");

          $.ajax({
            url: "country_delete.php",
            type: "POST",
            data: { name: c_name },
            success: function () {
              load();
            },
            error: function () {
              alert("Error deleting the record.");
            }
          });
        });

        // Open modal for update
        $(document).on("click", ".update_btn", function () {
          $("#modal").show();
          $("#table_data").hide();
          var co_name = $(this).data("cname");
          var c_stat = $(this).data("status");
          var c_cd = $(this).data("cd");

          // Populate modal inputs with the selected data
          $("#modal_name").val(co_name);
          $("#modal_status").val(c_stat);
          $("#modal_cd").val(c_cd);
        });

        // Close the modal
        $(".close_btn").on("click", function (e) {
          $("#modal").hide();
          $("#table_data").show();
        });

        // Update data
        $("#update_btn").on("click", function (e) {
          e.preventDefault();

          var updatedName = $("#modal_name").val();
          var updatedStatus = $("#modal_status").val();
          var updatedCd = $("#modal_cd").val();

          $.ajax({
            url: "update_form.php",
            type: "POST",
            data: {
              name: updatedName,
              status: updatedStatus,
              cd: updatedCd
            },
            success: function (data) {
              load();
              $("#modal").hide();
              $("#table_data").show();
            },
            error: function () {
              alert("Error in update operation.");
            }
          });
        });
        //search data
        $("#search").on("keyup", function () {
          var value = $(this).val()
          $.ajax({
            url: "country_search.php",
            type: "POST",
            data: { value: value },
            success: function (data) {
              $("#table_data").html(data);
            },
          });
        });
        //pagination
        function loadtable(page) {
          $.ajax({
            url: "country_pagination.php",
            type: "POST",
            data: { page: page },
            success: function (data) {
              $("#table_data").html(data);
            },
            error: function () {
              alert("Error loading pagination data.");
            }
          });
        }

        // Load table initially with page 1
        loadtable();

        // Pagination click event (dynamic binding)
        $(document).on("click", ".pagination a", function (e) {
          e.preventDefault();
          var page_id = $(this).attr("id");
          loadtable(page_id);
        });
        
      });
    </script>
  </body>
</html>
