
@component('mail::message')
Hello **{{$name}}**,  
You were invited to be a part of {{$organization->name}}. 
You can accept it or refuse it via the link down below. 
@component('mail::button', ['url' => $link, 'color'=> 'accent'])
Confirm Invitation
@endcomponent
Sincerely,  
Event Up Guys.
@endcomponent