<?php
    require_once 'config.php';
?>
<html>
<head>
    <title>Transaction Page</title>
<link rel="stylesheet" href="transfer.css" type="text/css">
</head>
<body>
        <div class="transfer">
        <form  action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
        
            <label for="acc_no" >Account Number <em>&#x2a;</em></label>
            <input id="acc_no" name="acc_no" required="" readonly value="<?php echo $_GET['acc_no']; ?>" type="text" />

            <label for="b_acc_no">Benificiary Account Number <em>&#x2a;</em></label>
            <input id="b_acc_no" name="b_acc_no" pattern="[0-9]+" maxlength="16" title="Enter 16 Digit number and Only numbers are allowed." required="" type="text" />

            <label for="IFSC">IFSC <em>&#x2a;</em></label>
            <input id="IFSC" maxlength="15" required="" name="IFSC"   type="text" />

            <label for="amount">Amount <em>&#x2a;</em></label>
            <input id="amount" maxlength="10" required="" name="amount"   type="text" />
            
            <br>
            <br>
            <button id="transfer" type="submit" name="transfer">PAY NOW</button>
            <br>
            <br>
        </form>
        </div>
  </body>
</html>
<?php
if(isset($_POST['transfer']))
{
    $account = $_POST['acc_no'];
    $b_account = $_POST['b_acc_no'];
    $IFSC = $_POST['IFSC'];
    $t_amount = $_POST['amount'];

    $check_bal="select balance from customer where acc_no='{$account}'";
    $res=mysqli_query($cn,$check_bal);

    if(mysqli_affected_rows($cn) > 0)
    {
        while($r = mysqli_fetch_assoc($res))
        {
            $bal = $r['balance'];
            if($bal > $t_amount)
            {
                $chech_b_acc = "SELECT * FROM customer where acc_no = '{$b_account}'";
                $r2 = mysqli_query($cn,$chech_b_acc);

                if(mysqli_affected_rows($cn) > 0)
                {
                    $check_ifsc = "SELECT * FROM customer where IFSC = '{$IFSC}'";
                    $r3 = mysqli_query($cn,$check_ifsc);

                    if(mysqli_affected_rows($cn) > 0)
                    {
                        $add_amount = "UPDATE customer SET balance = balance + '{$t_amount}' where acc_no = '{$b_account}'";

                        if(mysqli_query($cn,$add_amount))
                        {
                            $sub_amount = "UPDATE customer SET balance = balance - '{$t_amount}' where acc_no = '{$account}'";
                            if(mysqli_query($cn,$sub_amount))
                            {
                                echo "<script> alert('Amount transferred successfully.'); window.location = 'index.php';</script>";
                            }
                            else
                            {
                                echo "<script> alert('Something went wrong!!! Please try again.'); window.location = 'transfer.php';</script>";
                            }
                        }
                        else
                        {
                            echo "<script> alert('Something went wrong! Please try again.'); window.location = 'transfer.php';</script>";
                        }
                    }
                    else
                    {
                        echo "<script> alert('Wrong IFSC code. Please try again.'); window.location = 'transfer.php';</script>";
                    }
                }
                else
                {
                    echo "<script> alert('Account does not exist.'); window.location = 'customer.php';</script>";
                }
            }
            else
            {
                echo "<script> alert('Insufficiant Balance.'); window.location = 'customer.php';</script>";
            }
        }
    }
    else
    {

    }
}
?>