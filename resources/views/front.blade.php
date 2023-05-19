    <!DOCTYPE html>
    <x-app-layout>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Ranking</title>  
        <!-- Fonts -->
        <link rel="stylesheet" href="./css/front.css">
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    </head>
    
    <body class="antialiased">
        <div class="login_link" >
           <a href='/account_login'>ログイン</a>
        </div>
        
    <table>
    <tr>
        <div class="account_create_link">
    <td> <a href='/account_create'>アカウントを作成して団体を登録</td>
    　　<div class="search_link">
    <td><button type="button" onclick="location.href='/search'">スポーツ団体検索</button></td>
    </tr>
    </table>
    
        
    </body>
     </x-app-layout>
    </html>
