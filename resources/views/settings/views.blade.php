@switch(request()->get('view'))

    @case('profile')
        @include('profile.index')
        @break
    @case('users')
        @include('users.index')

        @break
    @default

@endswitch
