@component('mail::message')
# Thank you! 🎉

We have received your {{$job->title}} job listing and will be reviewing it within the next 24 hours to make sure all looks perfect. You will receive an email notification with the confirmation of your listing going live.
<br><br>
In the meantine, if you have any questions, please fee free to give us an email on [email_address].
<br>

Cheers,<br>
{{ config('app.name') }}
@endcomponent
