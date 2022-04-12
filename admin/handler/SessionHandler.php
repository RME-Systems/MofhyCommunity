<?php
if (isset($_SESSION['LEASESS']))
{
    $sql = mysqli_query($connect, "SELECT * FROM `hosting_admin` WHERE `admin_email`='" . base64_decode($_SESSION['LEASESS']) . "'");
    if (mysqli_num_rows($sql) > 0)
    {
        $AdminInfo = mysqli_fetch_assoc($sql);
    }
    else
    {
        unset($_SESSION['LEASESS']);
        $_SESSION['message'] = '<div class="alert alert-danger">Your previous session has expired.</b>
									</div>';
        header('location: login');
        exit;
    }
}
else
{
    $_SESSION['message'] = '<div class="alert alert-danger">Your previous session has expired.</div>';
    header('location: login');
    exit;
}
?>