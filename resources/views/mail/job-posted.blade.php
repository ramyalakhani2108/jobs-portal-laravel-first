<x-mail::message>
# {{$job->title}}!

# Congrats your job is now live on webstei 
<?php
 $job_id = $job->id;
?>
<x-mail::button :url="'http://example.test/jobs/'.$job_id">
Show
</x-mail::button>


Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
