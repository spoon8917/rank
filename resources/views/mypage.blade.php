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
        <a href='/members'>メンバー表示</a>
        <a href='/members/create'>メンバー新規登録</a>
        <a href='/match'>試合報告</a>
        <a href='/tournament/create'>大会で獲得するポイントの設定</a>
        <a href='/tournaments'>ポイント獲得量設定一覧</a>
        <a href='/member_tournament/create'>大会結果入力</a>
        <a href='/member_tournaments'>選手の総合順位</a>
    </body>
    </x-app-layout>
    </html>
