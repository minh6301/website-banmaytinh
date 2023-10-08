<div class="full__screen"></div>
<div class="main__cart">
    <div class="main__cart_header">
        <a href="{{ route('cart') }}">
            <i class="fa-solid fa-arrow-left"></i>
        </a>
        <strong>Thanh toán sản phẩm</strong>
    </div><br>
    <div class="main_payment">
        {!! Form::open(['url' => route('vnpay'), 'method'=>'post']) !!}

        <h4>Thông tin khách hàng</h4>
        
        {{-- Thông tin khách hàng --}}
            <div class="form">
                <div class="form-group">
                    {!! Form::text('fullname', '', ['class'=> '', 'placeholder' => "Họ và tên "]) !!}     
                </div>
                <div class="form-group">
                    {!! Form::text('phone', '', ['class'=> '', 'placeholder' => "Số điện thoại"]) !!}     
                </div>
            </div>
            <div class="form-group">
                {!! Form::email('email', '', ['class'=> '', 'placeholder' => "Email "]) !!}     
            </div>
            
            <div class="address">
                <h4>Địa chỉ nhận hàng</h4>
                <div class="form">
                    <div class="form-group">
                        {!! Form::text('city', '', ['class'=> '', 'placeholder' => "Thành phố"]) !!}     
                    </div>
                    <div class="form-group">
                        {!! Form::text('district', '', ['class'=> '', 'placeholder' => "Quận / Huyện"]) !!}     
                    </div>
                    <div class="form-group">
                        {!! Form::text('ward', '', ['class'=> '', 'placeholder' => "Phường / Xã"]) !!}     
                    </div>
                    <div class="form-group">
                        {!! Form::text('home', '', ['class'=> '', 'placeholder' => "Số nhà"]) !!}     
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::textarea('yeucau', '', ['placeholder' => "Yêu cầu khác"]) !!}
                </div>
            </div>

            <span id="close">Đóng</span>
            <div class="product__list">
                @php
                    $total = 0;
                @endphp
                @foreach ($cart as $carts)
                    @if ($carts->user_id == Auth::user()->id)
                        <div class="main__cart_product-item" >
                                <div>
                                    <img src="{{url($carts->product->file)}}" alt="" srcset="">
                                </div>
                                <div class="main__cart_product-item-detail">
                                    <div class="main__cart_product-item-up">
                                        @php
                                            $product = array($carts->product->tensanpham);
                                            $products = implode(',', $product);
                                            // array_push($products, $carts->product->tensanpham);
                                        @endphp
                                        <div>
                                            <span>{{$carts->product->tensanpham}}</span>
                                            <input type="hidden" name="product" value="{{ $products }}" id="">
                                        </div>
                                    </div>
                                    <div class="main__cart_product-item-down">
                                        <div>
                                            <span id="price">{{number_format($carts->product->price)}}</span> <span>đ</span>
                                        </div>
                                        <div class="quantity">
                                            Số lượng : {{ $carts->quantity }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @php
                                $total += $carts->product->price;
                            @endphp
                        @endif
                @endforeach
            </div>
            

            <div class="total-price">
                <div>
                    <p>Tổng tiền thanh toán : </p>
                    <div class="hide">
                        <a href="#product__list">
                            Kiểm tra danh sách sản phẩm 
                        </a>
                    </div>
                </div>
                <div style="color: #d70018; font-weight: bold">
                    {{-- <span id="getTotal"></span>đ --}}
                    <input type="text" id="totalprice" value="{{ number_format($total) }} đ" readonly> 
                    <input type="hidden" name="totalprice" id="totalprice" value="{{ $total }}">
                </div>
            </div>
            

            {{-- Hình thức thanh toán --}}
            <div class="payment">
                <h4>Hình thức thanh toán</h4>
                <div class="form-payment">
                    <label for="money">
                        <input type="radio" name="payment_type" id="money" value="1" /> Thanh toán khi nhận hàng
                    </label>
                </div>
                <div class="form-payment">
                    <label for="vnpay">
                        <input type="radio" name="payment_type" id="vnpay" value="2" /> VNPay
                    </label>
                </div>
            </div>
            
            <div class="payment-btn btn-money">
                
                    {!! Form::button('Đặt hàng',['class'=>'btn btn-primary']) !!}

            </div>
            
            <div class="payment-btn btn-vnpay" style="display: none">
                <input type="hidden" name="madonhang" id="" value=" 
                        <?php
                            $permitted_chars = '0123456789';
                            function generate_string($input, $strength = 16) {
                                $input_length = strlen($input);
                                $random_string = '';
                                for($i = 0; $i < $strength; $i++) {
                                    $random_character = $input[mt_rand(0, $input_length - 1)];
                                    $random_string .= $random_character;
                                }
                                return $random_string;
                            }
                            // Output: iNCHNGzByPjhApvn7XBD 
                            echo generate_string($permitted_chars, 10);
?>
                        " readonly>
                {!! Form::button('Thanh toán',['class'=>'btn btn-primary', 'type' => 'submit', 'name' => 'redirect']) !!}
            </div>
            
            
            {!! Form::close() !!}
    </div>
    
    
</div>

<script>
  const getTotal = sessionStorage.getItem('total');
  document.getElementById('getTotal').textContent = getTotal;
</script>
