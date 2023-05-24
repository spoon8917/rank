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
                    <p class='rank'>順位:{{ $member->rank }}</p>
                </div>
                <div class="edit"><a href="/members/{{ $member->id }}/edit">edit</a></div>
                <form action="/members/{{$member->id}}" id="form_{{$member->id}}"  method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="deletePost({{$member->id}})">delete</button>
                </form>
             @endif
            @endforeach
        </div>
        <script>
            function deletePost(id) {
                'use strict'

                if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
    </body>
</x-app-layout>
    
