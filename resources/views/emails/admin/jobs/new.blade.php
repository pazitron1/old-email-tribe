@component('mail::message')
# Good news!

A new job listing has been added to the website:
<br>

@component('mail::table')
| Job title     | Company       | From     |
| :------------ |:--------------| --------:|
| {{$job->title}}   | {{$job->company}} | {{$job->email}}|
@endcomponent
<br>
Don't forget to review it in the Dashboard
<br>
@component('mail::button', ['url' => ''])
View on dashboard
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
