
@component('mail::message')
Hello **{{$name}}**,  
You were invited to be a part of {{$organization->name}}. 
You can check other informations at our platform.   
@component('mail::button', ['url' => $link, 'color'=> 'accent'])
Confirm Invitation
@endcomponent
Sincerely,  
Event Up Guys.
@endcomponent