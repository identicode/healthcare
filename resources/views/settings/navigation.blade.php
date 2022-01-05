<div class="d-none d-lg-block col-lg-3">
    <div class="card">
       <div class="card-body">
        <ul class="nav nav-pills nav-vertical">

            <li class="nav-item">
                <a href="{{ route('sys', ['view' => 'profile']) }}" class="nav-link {{ nh('profile') }} ">
                    Profile
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('sys', ['view' => 'users']) }}" class="nav-link {{ nh('users') }} ">
                    Users
                </a>
            </li>
        </ul>
       </div>
    </div>
</div>
