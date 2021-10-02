@component('mail::message')
# Introduction User Verify

The body of your message.

@component('mail::button', ['url' => route('user.email.activated', [
                                    'email' => Auth::user()->email
                                ])
                            ])
Activate
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
