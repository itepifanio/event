
@component('mail::message')
Hello **{{$name}}**,  
You were successfully subscribed to {{$event->name}}.  
This event will be taking place on {{$event->date}}.  
You can check other informations at our platform.  
@component('mail::button', ['url' => $link, 'color'=> 'accent'])
Go To Event Page
@endcomponent
Sincerely,  
Event Up Guys.
@endcomponent