<?php
require_once 'config.php';
?>
<html>
<head>
    <title>Customers</title>
    <link rel="stylesheet" href="customer.css" type="text/css">
    <script src="https://kit.fontawesome.com/c7e7696453.js" crossorigin="anonymous"></script>
</head>
<body>
<table border = "1">
    <?php
    if(isset($_POST['submit'])) {
        $getuser = mysqli_query($cn, "SELECT * FROM customer");
        if (mysqli_affected_rows($cn) > 0) {
            while ($user = mysqli_fetch_assoc($getuser)) {
                echo "<tr>";
                echo "<td>" . $user['acc_no'] . "</td>";
                echo "<td>" . $user['name'] . "</td>";
                echo "<td>" . $user['email'] . "</td>";
                echo "<td>" . $user['balance'] . "</td>";
                echo "<td>" . $user['IFSC'] . "</td>";
                echo "<td>" . "<a href='transfer.php?acc_no=" . $user['acc_no'] . "'>" . "<i class='fas fa-exchange-alt'></i>" . "</a>";
                echo "</tr>";
            }

        } else {
            echo "NO DATA";
        }
    }
    ?>
</table>
</body>
</html>
