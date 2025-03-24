<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>loadmore</title>
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
    <table id="table_data">
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
    </table>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
   <script>
        $(document).ready(function () {
            var page = 0; // Start from page 0

            function loadmore(page) {
                $.ajax({
                    url: "load_more.php",
                    type: "POST",
                    data: { page: page },
                    success: function (data) {
                        $("#table_data").append(data);
                    }
                });
            }


            loadmore(page); // Load initial data

            $(document).on("click", "#ajaxbtn", function () {
                var nextPage = $(this).data("id");
                $(this).remove(); // Remove old button
                loadmore(nextPage);
            });
        });

   </script>
  </body>
</html>
