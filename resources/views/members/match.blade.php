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
        <h1>試合結果入力</h1>
        <form action="/rank" method="POST" >
            @csrf
            @method('PUT')
            <h2>勝者</h2>
            <select name="winner">
                @foreach($members as $member)
                    @if(Auth::user()->can('view',$member))
                        <option value="{{ $member->id }}">{{ $member->name }}</option>
                    @endif
                @endforeach
            </select>
            <h2>敗者</h2>
            <select name="loser">
                @foreach($members as $member)
                    @if(Auth::user()->can('view',$member))
                        <option value="{{ $member->id}}">{{ $member->name }}</option>
                    @endif
                @endforeach
            </select>
            
            <p><input type="submit" value="update"></p>
        </form>
    </body>
    </x-app-layout>
    </html>
