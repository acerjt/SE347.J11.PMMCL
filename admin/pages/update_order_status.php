<?php
//Khai báo sử dụng session
session_start();
    //Kết nối tới database
include('../../config/dbconfig.php');

if(isset($_POST['updateorder'])) {
    if(isset($_POST['status']))
    {
        $status = $_POST['status'];
        $orderid = $_POST['orderid'];
        $oldstatus = $_POST['oldstatus'];
        if($status == 'Đang vận chuyển'){
            $query = "UPDATE tbl_order SET status ='$status' WHERE id =  '$orderid'";
            $run = mysqli_query($conn,$query);
            if($run){
                $query = "SELECT * FROM tbl_order_detail WHERE orderid =  '$orderid'";
                $run = mysqli_query($conn,$query);
                while($orderdetail = mysqli_fetch_array($run)){
                    // $query = "SELECT * FROM tbl_product_detail WHERE id = '$orderdetail[productdetailid]'";
                    $query ="SELECT amount FROM tbl_product_detail WHERE id = '$orderdetail[productdetailid]'";
                    $run1 = mysqli_query($conn,$query);
                    $amount = mysqli_fetch_array($run1);
                    $amount = $amount['amount'];
                    $query = "UPDATE tbl_product_detail SET amount = $amount - $orderdetail[quantity] WHERE id = '$orderdetail[productdetailid]';";
                    $run1 = mysqli_query($conn,$query);
                }
                echo "
            <script language='javascript'>
                alert('Cập nhật tình trạng thành công');
                window.location.replace( document.referrer);
               
                
            </script>
            ";
            }
            else {
                $query = "UPDATE tbl_order SET status ='$oldstatus' WHERE id =  '$orderid'";
                $run = mysqli_query($conn,$query);
                echo "
                <script language='javascript'>
                    alert('Cập nhật tình trạng thất bại');
                    window.location.replace( document.referrer);
                   
                    
                </script>
                ";
            }
        }
        else if($status == 'Hủy đơn'){
            $query = "UPDATE tbl_order SET status ='$status' WHERE id =  '$orderid'";
            $run = mysqli_query($conn,$query);
            if($run){
                $query = "SELECT * FROM tbl_order_detail WHERE orderid =  '$orderid'";
                $run = mysqli_query($conn,$query);
                while($orderdetail = mysqli_fetch_array($run)){
                    // $query = "SELECT * FROM tbl_product_detail WHERE id = '$orderdetail[productdetailid]'";
                    $query ="SELECT amount FROM tbl_product_detail WHERE id = '$orderdetail[productdetailid]'";
                    $run1 = mysqli_query($conn,$query);
                    $amount = mysqli_fetch_array($run1);
                    $amount = $amount['amount'];
                    $query = "UPDATE tbl_product_detail SET amount = $amount + $orderdetail[quantity] WHERE id = '$orderdetail[productdetailid]';";
                    $run1 = mysqli_query($conn,$query);
                }
                echo "
                <script language='javascript'>
                    alert('Cập nhật tình trạng thành công');
                    window.location.replace( document.referrer);
                   
                    
                </script>
                ";
            }
            else {
                echo "
                <script language='javascript'>
                    alert('Cập nhật tình trạng thất bại');
                    window.location.replace( document.referrer);
                   
                    
                </script>
                ";
            }

        }
        else {
            $query = "UPDATE tbl_order SET status ='$status' WHERE id =  '$orderid'";
            $run = mysqli_query($conn,$query);
            if($run){
                echo "
                <script language='javascript'>
                    alert('Cập nhật tình trạng thành công');
                    window.location.replace( document.referrer);
                   
                    
                </script>
                ";
            }
            else {
                echo "
                <script language='javascript'>
                    alert('Cập nhật tình trạng thất bại');
                    window.location.replace( document.referrer);
                   
                    
                </script>
                ";
            }
        }
    }
}

?>