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
        <h1>ポイント獲得量の設定</h1>
        <h3>＊順位の欄に何も数値を入れなかった場合、その順位の選手が獲得するポイントはゼロになります</h3>
         <form action="/tournament" method="POST" >
            @csrf
            <div class="name">
                <h2>ポイント獲得量設定名</h2>
                <input type="text" name="name" value="{{ old('name') }}"/>
                <p class="name__error" style="color:red">{{ $errors->first('name') }}</p>
            </div>
            
            <div class="point_setting">
               <h2>ポイント設定</h2>
               <h3>一位のポイント</h3>
               <input type="number" name="first" />
               <p class="title__error" style="color:red">{{ $errors->first('first') }}</p>
               <h3>二位のポイント</h3>
               <input type="number" name="second" />
               <p class="title__error" style="color:red">{{ $errors->first('second') }}</p>
               <h3>三位のポイント</h3>
               <input type="number" name="third" />
               <p class="title__error" style="color:red">{{ $errors->first('second') }}</p>
               <h3>ベスト8のポイント</h3>
               <input type="number" name="best8" />
               <p class="title__error" style="color:red">{{ $errors->first('best8') }}</p>
               <h3>ベスト16のポイント</h3>
               <input type="number" name="best16" />
               <p class="title__error" style="color:red">{{ $errors->first('best16') }}</p>
                <h3>ベスト32のポイント</h3>
               <input type="number" name="best32" />
               <p class="title__error" style="color:red">{{ $errors->first('best32') }}</p>
            </div>
    
            <p><input type="submit" value="store"></p>
        </form>
    </body>
     </x-app-layout>
    </html>
