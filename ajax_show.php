<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ajax_show</title>
    <style>
      body {
        font-family: Arial, sans-serif;
        margin: 20px;
      }

      #load_table {
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 5px;
      }

      #load_table:hover {
        background-color:rgb(46, 152, 52);
      }

      table {
        width: 100%;
        margin-top: 20px;
        border-collapse: collapse;
      }

      table, th, td {
        border: 1px solid #ddd;
      }

      th, td {
        padding: 8px;
        text-align: left;
      }

      th {
        background-color: #f2f2f2;
      }
    </style>
  </head>
  <body>
    <button id="load_table">LOAD DATA</button>
    <table id="table_data">
    </table>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
      $(document).ready(function () {
        $("#load_table").on("click", function (e) {
          // $("#load_table").hide();
          $.ajax({
            url: "listed_form.php",
            type: "POST",
            success: function (data) {
              $("#table_data").html(data);
            },
          });
        });
      });
    </script>
  </body>
</html>
