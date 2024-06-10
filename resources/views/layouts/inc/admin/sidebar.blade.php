<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{url('admin/dashboard')}}">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#category" aria-expanded="false" aria-controls="ui-basic">
                <i class="mdi mdi-circle-outline menu-icon"></i>
                <span class="menu-title">Category</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="category">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{url('admin/category')}}">View Category</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{url('admin/add-category')}}">Add Category</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
                   <a class="nav-link" data-bs-toggle="collapse" href="#product" aria-expanded="false" aria-controls="ui-basic">
                       <i class="mdi mdi-circle-outline menu-icon"></i>
                       <span class="menu-title">Product</span>
                       <i class="menu-arrow"></i>
                   </a>
                   <div class="collapse" id="product">
                       <ul class="nav flex-column sub-menu">
                           <li class="nav-item"> <a class="nav-link" href="{{url('admin/product')}}">View Product</a></li>

                       </ul>
                   </div>
               </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#brand" aria-expanded="false" aria-controls="ui-basic">
                        <i class="mdi mdi-circle-outline menu-icon"></i>
                        <span class="menu-title">Brand</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="brand">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="{{url('admin/brands')}}">View Brand</a></li>
                           
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#slide" aria-expanded="false" aria-controls="ui-basic">
                        <i class="mdi mdi-circle-outline menu-icon"></i>
                        <span class="menu-title">Slide</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="slide">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="{{url('admin/slide')}}">View Slide</a></li>
                            <li class="nav-item"> <a class="nav-link" href="{{url('admin/add-slide')}}">Add Slide</a></li>
                        
                        </ul>
                    </div>
                </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#user" aria-expanded="false" aria-controls="ui-basic">
                <i class="mdi mdi-circle-outline menu-icon"></i>
                <span class="menu-title">User</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="user">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{url('admin/user')}}">View User</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{url('admin/add-user')}}">Add User</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('color') }}">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Product Color</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="pages/icons/mdi.html">
                <i class="mdi mdi-emoticon menu-icon"></i>
                <span class="menu-title">Icons</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <i class="mdi mdi-account menu-icon"></i>
                <span class="menu-title">User Pages</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/login-2.html"> Login 2 </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/register-2.html"> Register 2 </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/lock-screen.html"> Lockscreen </a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('All_User_Order') }}">
                <i class="mdi mdi-file-document-box-outline menu-icon"></i>
                <span class="menu-title">Order user</span>
            </a>
        </li>
    </ul>
</nav>
