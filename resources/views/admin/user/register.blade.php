@extends('layouts.app')
@section('title','Register TH21')

@section('content')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">


<div class="container">
<hr>

<div class="card bg-light">
<article class="card-body mx-auto" style="max-width: 400px;">
	<h4 class="card-title mt-3 text-center">Create Account</h4>
	<p class="text-center">Get started with your free account</p>
	<p>
		<a href="" class="btn btn-block btn-twitter"> <i class="fab fa-twitter"></i>   Login via Twitter</a>
		<a href="" class="btn btn-block btn-facebook"> <i class="fab fa-facebook-f"></i>   Login via facebook</a>
	</p>
	<p class="divider-text">
        <span class="bg-light">OR</span>
    </p>
    <form action="{{ route('auth.postUser') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <input name="name" id="name" class="form-control" placeholder="Name" type="text" required autofocus value="{{ old('name') }}">
            @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
        </div>
    
        <div class="form-group">
            <input name="email" id="email_address" class="form-control" placeholder="Email address" type="email" required autofocus value="{{ old('email') }}">
            @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
            @endif
        </div>
    
        <div class="form-group">
            <input name="phone" id="phone" class="form-control" placeholder="Phone number" type="text" required autofocus value="{{ old('phone') }}">
            @if ($errors->has('phone'))
                <span class="text-danger">{{ $errors->first('phone') }}</span>
            @endif
        </div>
    
        <div class="form-group">
            <div class="input-group">
                <input id="password" name="password" class="form-control" placeholder="Create password" type="password" required value="{{ old('password') }}">
                <div class="input-group-append">
                    <button id="togglePassword" class="btn btn-outline-secondary" type="button">
                        <i id="toggleIcon" class="fa fa-eye-slash"></i>
                    </button>
                </div>
            </div>
            @if ($errors->has('password'))
                <span class="text-danger">{{ $errors->first('password') }}</span>
            @endif
        </div>
        <div class="form-group">
            <div class="input-group">
                <input value="{{ old('password') }}" type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Confirm password" required autofocus>
                <div class="input-group-append">
                    <button id="togglePasswordConfirmation" class="btn btn-outline-secondary" type="button">
                        <i id="toggleIconConfirmation" class="fa fa-eye-slash"></i>
                    </button>
                </div>
            </div>
            @if ($errors->has('password_confirmation'))
                <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
            @endif
        </div>
    
        <div class="form-group">
            <label for="image" class="form-label">Avatar</label>
            <input type="file" id="image" name="image" accept="image/*" onchange="previewImage(event)">
            @if ($errors->has('image'))
                <span class="text-danger">{{ $errors->first('image') }}</span>
            @endif
        </div>
    
        <div class="form-group mb-3">
            <img id="avatar-preview" src="#" alt="Avatar Preview" style="display: none; max-width: 200px; max-height: 200px;">
        </div>
    
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Create Account</button>
        </div>
    
        <p class="text-center">Have an account? <a href="{{ route('login') }}">Log In</a></p>
    </form>
</article>
</div> <!-- card.// -->

</div> 
<!--container end.//-->
<script>
    function previewImage(event) {
        var input = event.target;
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                var preview = document.getElementById('avatar-preview');
                preview.src = e.target.result;
                preview.style.display = 'block';
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    const togglePassword = document.getElementById('togglePassword');
const togglePasswordConfirmation = document.getElementById('togglePasswordConfirmation');
const passwordInput = document.getElementById('password');
const passwordConfirmationInput = document.getElementById('password_confirmation');
const toggleIcon = document.getElementById('toggleIcon');
const toggleIconConfirmation = document.getElementById('toggleIconConfirmation');

togglePassword.addEventListener('click', function () {
    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordInput.setAttribute('type', type);
    toggleIcon.className = type === 'password' ? 'fa fa-eye-slash' : 'fa fa-eye';
});

togglePasswordConfirmation.addEventListener('click', function () {
    const type = passwordConfirmationInput.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordConfirmationInput.setAttribute('type', type);
    toggleIconConfirmation.className = type === 'password' ? 'fa fa-eye-slash' : 'fa fa-eye';
});
</script>
<br><br>

<style>
    .divider-text {
    position: relative;
    text-align: center;
    margin-top: 15px;
    margin-bottom: 15px;
}
.divider-text span {
    padding: 7px;
    font-size: 12px;
    position: relative;   
    z-index: 2;
}
.divider-text:after {
    content: "";
    position: absolute;
    width: 100%;
    border-bottom: 1px solid #ddd;
    top: 55%;
    left: 0;
    z-index: 1;
}

.btn-facebook {
    background-color: #405D9D;
    color: #fff;
}
.btn-twitter {
    background-color: #42AEEC;
    color: #fff;
}
</style>
@endsection