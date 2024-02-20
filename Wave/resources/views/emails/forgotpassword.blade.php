@component('mail::message')

    <h1>Hello</h1>
    <p>Click the button to change password</p>

    @component('mail::button', ['url' => url('password/verify/'.$user->remember_token)])
        Change Password
    @endcomponent

@endcomponent