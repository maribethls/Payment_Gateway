@component('mail::message')

    <h1>Hello</h1>
    <p>Click the button to verify</p>

    @component('mail::button', ['url' => url('email/verify/'.$user->remember_token)])
        Verify
    @endcomponent

@endcomponent
