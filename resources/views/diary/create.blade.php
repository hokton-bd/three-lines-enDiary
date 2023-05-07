<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/@grammarly/editor-sdk?clientId=client_AzYKa9hJo7wmF86v7C7rEM"></script>
</head>
<body>
    <form action="{{route('diary.store')}}" method="post">
        @csrf
        <grammarly-editor-plugin>
            <textarea name="content" required></textarea>
        </grammarly-editor-plugin>
        <input type="submit" value="保存">
    </form>
</body>
</html>