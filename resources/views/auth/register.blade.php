<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
         <div class="mt-4">
            <x-input-label for="sport" :value="__('Sport')" />
            <select id="sport" class="block mt-1 w-full"  name="sport_id">
                @foreach($sports as $sport)
                    <option value="{{ $sport->id }}">{{ $sport->name }}</option>
                @endforeach
            </select name="sport" :value="old('sport')" required autofocus autocomplete="sport" />
            <x-input-error :messages="$errors->get('sport')" class="mt-2" />
        </div>
        
          <div class="mt-4">
            <x-input-label for="prefecture" :value="__('Prefecture')" />
            <select id="prefecture" class="block mt-1 w-full"  name="prefecture_id">
                @foreach($prefectures as $prefecture)
                    <option value="{{ $prefecture->id }}">{{ $prefecture->name }}</option>
                @endforeach
            </select name="prefecture" :value="old('prefecture')" required autofocus autocomplete="prefecture" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        
        <div class="mt-4">
            <x-input-label for="image" :value="__('image')" />
            <input id="image" class="block mt-1 w-full" type="file" name="image" :value="old('image')" required autofocus autocomplete="image" />
            <x-input-error :messages="$errors->get('image')" class="mt-2" />
        </div>
        
        <div class="mt-4">
            <x-input-label for="comment" :value="__('comment')" />
            <input id="comment" class="block mt-1 w-full" type="text" name="comment" required autofocus autocomplete="comment" />
            <x-input-error :messages="$errors->get('comment')" class="mt-2" />
        </div>

        
        
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
