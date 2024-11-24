<!DOCTYPE html>
<html>
<head>
    <title>New Submission Received</title>
</head>
<body>
<h1>New Submission Received</h1>
<p><strong>Phone:</strong> {{ $submission->phone }}</p>
@if($submission->comment)
    <p><strong>Comment:</strong> {{ $submission->comment }}</p>
@endif
<h2>Guests:</h2>
<ul>
    @foreach($guests as $guest)
        <li>
            {{ $guest['first_name'] }} {{ $guest['last_name'] }}
            - Sleep: {{ $guest['sleep'] ? 'Yes' : 'No' }}
            @if($guest['allergies'])
                - Allergies: {{ $guest['allergies'] }}
            @endif
        </li>
    @endforeach
</ul>
</body>
</html>
