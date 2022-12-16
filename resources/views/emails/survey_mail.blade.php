<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Survey Mail</title>
</head>

<body>
    Name: {{ $survey->name }}<br>
    @if ($survey->gender == 'm' || $survey->gender == 'M')
        Gender: Male<br>
    @else
        Gender: Female<br>
    @endif
    Image or Video: <a href="{{ 'http://localhost:8000/storage/' . $survey->img_or_vid }}">View</a>
    <br>
    Voice: <a href="{{ 'http://localhost:8000/storage/' . $survey->voice }}">Listen</a>
    <br><br><br>
    Thank You
</body>

</html>
