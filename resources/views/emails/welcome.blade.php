@component('mail::message')
# Introduction

The body of your message.

@component('mail::button', ['url' => route('core.email.activated', [
                                    'email' => $user->email
                                ])
                            ])
Activate
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
