<div class="header-cart-menu d-flex align-items-center ml-auto">
    <!-- Cart Area -->
    <div class="cart">
        <a href="#" id="header-cart-btn" target="_blank"><span class="cart_quantity"> {{ \Cart::getTotalQuantity()}}</span> <i class="ti-bag"></i> Your Bag </a>
        <!-- Cart List Area Start -->
        <ul class="cart-list">
            @if(count(\Cart::getContent()) > 0)
                @foreach(\Cart::getContent() as $item)
                <li>
                    <a href="#" class="image"><img src="{{Storage::disk('local')->url($item->attributes->image)}}" class="cart-thumb" alt=""></a>
                    <div class="cart-item-desc">
                        <h6><a href="#">{{$item->name}}</a></h6>
                        <p><small>Qty: {{$item->quantity}}</small> - <span class="price">${{ \Cart::get($item->id)->getPriceSum() }}</span></p>
                    </div>
                    <span class="dropdown-product-remove"><i class="icon-cross"></i></span>
                </li>
                @endforeach
                <li class="total">
                    <span class="pull-right">Total: ${{ \Cart::getTotal() }}</span>
                    <a href="{{route('cart')}}" class="btn btn-sm btn-cart">Cart</a>
                    <a href="{{route('cartTocheckout')}}" class="btn btn-sm btn-checkout">Checkout</a>
                </li>
            @else
                <li class="list-group-item">Your Cart is Empty</li>
            @endif
        </ul>
    </div>
    <div class="header-right-side-menu ml-15">
        <a href="#" id="sideMenuBtn"><i class="ti-menu" aria-hidden="true"></i></a>
    </div>
</div>