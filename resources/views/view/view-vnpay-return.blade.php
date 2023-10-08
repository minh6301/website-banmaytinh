<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <title>VNPAY RESPONSE</title>
        <!-- Bootstrap core CSS -->
        <link href="{{asset('assets/bootstrap.min.css')}}" rel="stylesheet"/>
        <!-- Custom styles for this template -->
        <link href="{{asset('assets/jumbotron-narrow.css')}}" rel="stylesheet">         
        <script src="{{asset('assets/jquery-1.11.3.min.js')}}"></script>
    </head>
    <body>
        
        <!--Begin display -->
        <div class="container">
            <div class="header clearfix">
                <h3 class="text-muted">VNPAY RESPONSE</h3>
            </div>
            <div class="table-responsive">
                <div class="form-group">
                    <label >Mã đơn hàng:</label>

                    <label>{{$vnpay_data['vnp_TxnRef'] }}</label>
                </div>    
                <div class="form-group">

                    <label >Số tiền:</label>
                    <label>{{ number_format ($vnpay_data['vnp_Amount'] / 100,0,',','.' )  }} đ</label>
                </div>  
                <div class="form-group">
                    <label >Nội dung thanh toán:</label>
                    <label>{{$vnpay_data['vnp_OrderInfo'] }}</label>
                </div> 
                <div class="form-group">
                    <label >Mã phản hồi (vnp_ResponseCode):</label>
                    <label>{{$vnpay_data['vnp_ResponseCode'] }}</label>
                </div> 
                <div class="form-group">
                    <label >Mã GD Tại VNPAY:</label>
                    <label>{{$vnpay_data['vnp_TransactionNo'] }}</label>
                </div> 
                <div class="form-group">
                    <label >Mã Ngân hàng:</label>
                    <label>{{$vnpay_data['vnp_BankCode'] }}</label>
                </div> 
                <div class="form-group">
                    <label >Thời gian thanh toán:</label>
                    <label>{{$vnpay_data['vnp_PayDate'] }}</label>
                </div> 
                <div class="form-group">
                    <label >Kết quả:</label>
                    <label>
                        @php
                            if ($vnpay_data['vnp_ResponseCode'] == '00') {
                                echo "<span style='color:blue'>GD Thanh cong</span>";
                                header('http://127.0.0.1:8000/payment/update');
                            } else {
                                echo "<span style='color:red'>GD Khong thanh cong</span>";
                            }
                        @endphp

                    </label>
                </div> 
            </div>
            <a href="{{route('layouts.computech')}}">Trở lại trang chủ</a>
            <p>
                &nbsp;
            </p>
            <footer class="footer">
                   <p>&copy; VNPAY <?php echo date('Y')?></p>
            </footer>
        </div>  
    </body>
</html>
