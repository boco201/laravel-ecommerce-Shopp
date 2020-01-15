@component('mail::message')
# Thank you for your message

<strong>Nom</strong>{{ $data['name'] }}
<strong>Email</strong>{{ $data['email'] }}

<strong>Message</strong>

{{ $data['message'] }}

@endcomponent