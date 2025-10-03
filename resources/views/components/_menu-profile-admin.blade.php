<div class="Cnavbar">
    <div class="navbar">
        <input type="checkbox" id="check">
        <div class="profile">
            <img src="{{ asset("icons/profile.svg") }}" alt="profile admin">
            <span></span>
        </div>
        <div class="floating">
            <a href=""><img src="{{ asset("icons/profile.svg") }}" alt="profile admin">
                <p>Profile</p>
            </a>
            <a href="{{ route('admin.logout') }}"><img src="{{ asset("icons/logout.svg") }}" alt="sign out admin">
                <p>Sign Out</p>
            </a>
        </div>
    </div>
</div>