    <!DOCTYPE html>
    <x-app-layout>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Ranking</title>  
        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    </head>
    
    <body class="antialiased">
        <h1>ポイント獲得量設定一覧</h1>
        <div class='posts'>
            @foreach ($tournaments as $tournament)
                <div class='members'>
                    <h2>設定名</h2>
                    <p class='name'>{{ $tournament->name }}</p>
                     <h2>｛順位：ポイント数｝</h2>
                    <p class='point_setting'>{{ $tournament->point_setting }}</p>
                </div>
            @endforeach
    </body>
     </x-app-layout>
    </html>
