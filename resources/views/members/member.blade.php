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
        <h1>メンバー一覧</h1>
        <div class='posts'>
            @foreach ($members as $member)
             @if(Auth::user()->can('view',$member))
                <div class='members'>
                    <img src="{{ $member->img_path }}" alt="画像が読み込めません。"/>
                    <p class='name'>{{ $member->name }}</h2>
                    <p class='comment'>{{ $member->comment }}</p>
                </div>
             @endif   
            @endforeach
        </div>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
     </x-app-layout>
    </html>
