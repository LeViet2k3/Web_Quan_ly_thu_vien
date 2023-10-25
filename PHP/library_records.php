<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="../CSS/library_records.css"> -->
    <title>Document</title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 10px;
            text-align: center;
        }

        .okok {
            display: flex;
        }

        .okok1 {
            width: 60%;
        }

        .okok2 {
            width: 35%;
            border: 1px solid black;
            margin: auto;
            padding: 15px;
            background-color: rgba(240, 248, 255, 0.7);
            position: absolute;
            top: 30px;
            right: 10px;
        }

        .library {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="okok">
        <div class="okok1">
            <?php
            include('libs/helper.php');
            db_connect();

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Dữ liệu bạn muốn chèn
                $email = $_SESSION['email'];
                $book_id = $_POST['Book_id'];
                $return_day = $_POST['time'];
                $expense;
                if ($_POST['time'] == "3 ngày") {
                    $expense = "MP01";
                }
                if ($_POST['time'] == "5 ngày") {
                    $expense = "MP02";
                }
                if ($_POST['time'] == "7 ngày") {
                    $expense = "MP03";
                }


                // Câu lệnh SQL để chèn dữ liệu
                $sql = "INSERT INTO library_records (Email, Book_id, Book_return_day, Expense_id) 
                       VALUES ('$email', '$book_id', '$return_day', '$expense' )";
                // Thực thi câu lệnh SQL
                if (mysqli_query($conn, $sql)) {
                    $sql1 = " SELECT library_records.Id, library_records.Email, library_records.Book_id, library_records.Book_borrowed_day, library_records.Book_return_day, expense.Charges
                    FROM library_records
                    JOIN expense ON library_records.Expense_id = expense.Expense_id
                    WHERE Email = '$email'";
                    $result1 = mysqli_query($conn, $sql1);
                    if (mysqli_num_rows($result1) > 0) {
                        echo '<table>';
                        echo '<tr>';
                        echo '<th>ID</th>';
                        echo '<th>Email</th>';
                        echo '<th>Mã Sách</th>';
                        echo '<th>Ngày Mượn</th>';
                        echo '<th>Thời Hạn</th>';
                        echo '<th>Mức Phí</th>';
                        echo '</tr>';

                        while ($row = mysqli_fetch_assoc($result1)) {
                            echo '<tr>';
                            echo '<td>' . $row["Id"] . '</td>';
                            echo '<td>' . $row["Email"] . '</td>';
                            echo '<td>' . $row["Book_id"] . '</td>';
                            echo '<td>' . $row["Book_borrowed_day"] . '</td>';
                            echo '<td>' . $row["Book_return_day"] . '</td>';
                            echo '<td>' . $row["Charges"] . '</td>';
                            echo '</tr>';
                        }
                        echo '</table>';
                    } else {
                        echo "Không có dữ liệu trong bảng website.";
                    }
                } else {
                    echo "Lỗi khi thêm dữ liệu vào bảng: " . mysqli_error($conn);
                }
            }

            // Đóng kết nối
            db_disconnect();
            ?>
        </div>
        <div class="okok2">
            <form action="" method="post">
                <div class="library">
                    <div class="ok1">
                        Nhập mã sách:&emsp; <input type="text" class="ok1_1" name="Book_id" placeholder="Nhập mã sách" required>
                    </div><br>
                    <div class="ok1">
                        Thời hạn:&emsp;
                        <input type="radio" name="time" value="3 ngày" required>&nbsp; 3 ngày &emsp;
                        <input type="radio" name="time" value="5 ngày" required>&nbsp; 5 ngày &emsp;
                        <input type="radio" name="time" value="7 ngày" required>&nbsp; 7 ngày &emsp;
                    </div><br>
                    <div class="ok2">
                        <input type="submit">
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>