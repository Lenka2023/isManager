<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
 @if($title)

    <p>Title: {{  $title  }}</p>
    

    @endif

 @if($text)

    <p>Text: {{  $text  }}</p>

    @endif
</body>
</html>