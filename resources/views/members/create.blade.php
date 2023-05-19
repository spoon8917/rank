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
         <h1>メンバー新規登録</h1>
        <form action="/member" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="name">
                <h2>名前</h2>
                <input type="text" name="member[name]" placeholder="名前" value="{{ old('member.name') }}"/>
                <p class="name__error" style="color:red">{{ $errors->first('member.name') }}</p>
            </div>
            
            <div class="image">
                <h2>アイコン</h2>
                <input type="file" name="image" />
                <p class="image__error" style="color:red">{{ $errors->first('image') }}</p>
            </div>
            
            <div class="comment">
                <h2>コメント</h2>
                <input type="text" name="member[comment]" placeholder="よろしくお願いします" value="{{ old('member.comment') }}"/>
                <p class="comment__error" style="color:red">{{ $errors->first('member.comment') }}</p>
            </div>
            
            <div class="rank">
                <h2>順位</h2>
                <input type="number" name="member[rank]"  value="{{ old('member.rank') }}"/>
                <p class="title__error" style="color:red">{{ $errors->first('member.rank') }}</p>
            </div>
            <input type="submit" value="store"/>
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
     </x-app-layout>
    </html>
