<!DOCTYPE html>
<html>
<head>
    <title>Inscription Mariage</title>
</head>
<body>
<p><strong>Tel:</strong> {{ $submission->phone }}</p>
@if($submission->comment)
    <p><strong>Commentaire:</strong> {{ $submission->comment }}</p>
@endif
<h3>Personne(s) inscrites:</h3>
<ul>
    @foreach($guests as $guest)
        <li>
            <p>
                {{ $guest['first_name'] }} {{ $guest['last_name'] }}
                <br>Dormir sur place: {{ $guest['sleep'] ? 'Oui' : 'Non' }}
                @if($guest['allergies'])
                    <br>Particularités alimentaires: {{ $guest['allergies'] }}
                @endif
                <br><br>
            </p>
        </li>
    @endforeach
</ul>
</body>
</html>
