<!-- Close Icon -->
<div id="sideMenuClose">
    <i class="ti-close"></i>
</div>
<!--  Side Nav  -->
<div class="nav-side-menu">
    <div class="menu-list">
        <h6>Categories</h6>
        <ul id="menu-content" class="menu-content collapse out">
            <!-- Single Item -->
            @foreach($subcategories as $subcategory)
                <li><a href="{{route('subcategories',$subcategory->slug)}}">{{$subcategory->title}}</a></li>
            @endforeach
           
        </ul>
    </div>
</div>