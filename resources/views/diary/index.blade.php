<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>日記一覧</title>
</head>
<body>
    <h1>{{Auth::user()->name}}さんが作った日記一覧</h1>
    <ul>
        @foreach ($diaries as $item)
            <li>
                <p>{!! nl2br($item->content) !!}</p>
                <datetime>{{ $item->created_date }}</datetime>
            </li>
        @endforeach
    </ul>
</body>
</html>