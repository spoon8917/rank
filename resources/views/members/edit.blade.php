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
        <h1 class='title'>編集画面</h1>
            <div class='content'>
                <form action="/members/{{$member->id}}" method="POST" enctype="multipart/form-data">
                     @csrf
                     @method('PUT')
                    <div class="image">
                        <h2>アイコン</h2>
                        <input type="file" name='image'>
                        <p class="title_error" style="color:red">{{ $errors->first('image') }}</p>
                    </div>     
                    
                    <div class="name">
                        <h2>name</h2>
                        <input type="text" name='member[name]' value="{{$member->name }}">
                        <p class="title_error" style="color:red">{{ $errors->first('member.name') }}</p>
                    </div>    
                        
                    <div class="comment">
                        <h2>comment</h2>
                        <textarea name='member[comment]'>{{$member->comment}}</textarea>
                        <p class="title_error" style="color:red">{{$errors->first('member.comment') }}</p>
                    </div>
                    
                    <div class="rank">
                        <h2>順位</h2>
                        <input type="number" name='member[rank]' value="{{$member->rank }}">
                        <p class="title_error" style="color:red">{{ $errors->first('member.rank') }}</p>
                    </div>    
                    <input type="submit" value="update">
                </form>
            </div>    
          
    
        <div class="footer">
            <a href="/members">back</a>
        </div>
    </body>
     </x-app-layout>
    </html>
