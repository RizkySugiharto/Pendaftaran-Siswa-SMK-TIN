
@include("components._header-admin")

<div class="blue"></div>

<form action="#" method="post">
    @csrf
    <div class="imagegroup">
        <img src="{{ asset('images/logo tin.png') }}" alt="logo smk tin">
        <img src="{{ asset('images/logo yayasan tin.png') }}" alt="logo yayasan tin">
    </div>
    <h2>SIGN IN</h2>
    <div class="inputgroup">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="{{ old('email', '') }}" required>
    </div>
    <div class="inputgroup">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" value="{{ old('password','') }}" required>
    </div>
    <input type="submit" value="Login" class="button">
    <a href="#">Butuh Bantuan?</a>
    @includeWhen($errors->any(), "components._error-message")
</form>