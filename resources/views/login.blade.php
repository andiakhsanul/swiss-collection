<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
<link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href=https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous">

</head>
<!-- position relative itu artinya klo ditumpuk divnya kebawah dibawah kebalikannya absolut yg selalu di atas -->

<body>

    @if ($errors->any())
    <div class="error-message">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="container" id="container" style="height: 100vh; width: 100%;">

        <div class="form-container sign-up-container">
        <form action="{{ route('add') }}" method="post">
    @method('POST')
    @csrf
    <h1>Create Account</h1>
    <div class="social-container">
    </div>
    <!-- <span>or use your email for registration</span> -->
    <input type="hidden" name="ID_user" value="auto" id="ID_user">
    <input type="text" placeholder="First Name" id="first_name" name="first_name" />
    <input type="text" placeholder="Last Name" id="last_name" name="last_name" />
    <input type="email" placeholder="Email" id="email" name="email" />
    <input type="hidden" name="is_user" value="1">
    <input type="password" placeholder="Password" id="password" name="password" />
    <input type="password" placeholder="Confirm Password" id="confirm_password" name="confirm_password" />
    <input type="text" list="genderList" placeholder="Gender" name="jenis_kelamin" id="jenis_kelamin">
    <datalist id="genderList">
        <option value="laki-laki">
        <option value="perempuan">
    </datalist>
    <button type="submit" value="Create">Sign Up</button>
</form>

</div>
<div class="form-container sign-in-container">
    <form action="{{ route('auth') }}" method="post">
        @method('POST')
        @csrf
        <h1>Sign in</h1>
        <div class="social-container">
        </div>
        <input type="email" placeholder="Email" id="email" name="email" />
        <input type="password" placeholder="Password" id="password" name="password" />
        <!-- <a href="#">Forgot your password?</a> -->
        <button type="submit">Sign In</button>
    </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <video autoplay muted loop id="bg-video" style="position: relative; height: 100vh;">
                    <source src="{{ asset('images/gym-video2.mp4') }}" type="video/mp4" />
                    </video>
                    <h1 style="position :absolute; margin-bottom: 110px;">Welcome Back!</h1>
                    <p style="position: absolute;">To keep connected with us please login with your personal info</p>
                    <button class="ghost" id="signIn" style="position: absolute; margin-top: 110px;">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <video autoplay muted loop id="bg-video" style="position: relative; height: 100vh;">
                    <source src="{{ asset('images/gym-video2.mp4') }}" type="video/mp4" />
                    </video>
                    <h1 style="position: absolute; margin-bottom: 110px;">Hello, Friend!</h1>
                    <p style="position: absolute;">Enter your personal details and start journey with us</p>
                    <button class="ghost" id="signUp" style="position: absolute; margin-top: 110px;">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <p>
            Created with by Jania and Octavia
        </p>
    </footer>
    <script src="{{ asset('js/login.js') }}"></script>
</body>

</html>
