<x-guest-layout>
    @section('title')
    Muslim Tool
    @endsection

    {{-- @if($errors->any())
    <script>alert('{{$errors->first()}}')</script>
    @endif --}}
    <div class="flex overflow-x-hidden w-screen">
        <div form method="POST" action="{{ route('register') }}" class="flex w-7/12 flex-col flex-none">
            @csrf
                <div class="font-inter p-10 space-y-2 ml-7 mt-7">
                    <p class="font-inter font-bold text-2xl">Daftar</p>
                    <p class="font-inter text-sm text-[#9797AA]"> Daftar untuk dapat bergabung dengan forum </p>
                </div>
                <div class="font-inter p-10 space-y-2 ml-7">
                    <form method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        <div class="">
                            <div>
                                <label class="block" for="name">
                                    Nama Lengkap 
                                    <span class="text-red-500">
                                        *
                                    </span>
                                </label>
                                <input type="text" placeholder="Nama Lengkap"
                                    name="name"
                                    class="w-full text-base  px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" 
                                    required/>
                                    
                                @if($errors->has('name'))
                                    <span class="text-red-500">{{$errors->first('name')}}</span>    
                                @endif
                                
                            </div>
                            <div>
                                <label class="block" for="email">
                                    Email 
                                    <span class="text-red-500">
                                        *
                                    </span>
                                </label>
                                <input 
                                    type="email" 
                                    placeholder="Email"
                                    name="email"
                                    class="w-full text-base  px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" 
                                    required/>

                                @if($errors->has('email'))
                                    <span class="text-red-500">{{$errors->first('email')}}</span>    
                                @endif
                            </div>
                            <div class="mt-4">
                                <label class="block">
                                    Password 
                                    <span class="text-red-500">
                                        *
                                    </span>
                                </label>
                                <input 
                                    type="password" 
                                    placeholder="Password"
                                    name="password"
                                    class="w-full text-base  px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" 
                                    required/>

                                @if($errors->has('email'))
                                    <span class="text-red-500">{{$errors->first('email')}}</span>    
                                @endif
                            </div>

                            <div class="flex items-center my-5">
                                <div class="flex items-center space-x-2 ">
                                    <input id="ingat_akun" name="remember" type="checkbox" required/>
                                    <label class="font-normal text-sm" for="ingat_akun"> Saya menyetujui  </label> 
                                </div>
                                
                                
                                <label class="ml-1 text-sm font-semibold">Syarat dan Ketentuan</label >    
                            </div>
                            
                            <div class="flex flex-col items-baseline justify-between mt-10">
                                <button class="w-full mb-5 px-6 py-2 mt-4 text-white bg-primary-500 rounded-lg hover:bg-primary-900">Daftar</button>
                                <p class="font-normal text-sm">Sudah punya akun? <a href="/login" class="text-sm font-semibold text-primary-500 hover:underline">Masuk</a> </p>
                            </div>

                    </form>
                </div>
            </div>
        </div>
        <div class="flex-1 flex flex-row items-center bg-primary-500 h-screen">
            <div class=" p-20 space-y-4">
                <h1 class="font-inter font-semibold text-6xl text-white"> ??? Ilmu adalah kehidupan bagi pikiran. ???</h1>
                <h1 class="font-inter font-semibold text-white">- Abu Bakar </h1>
            </div>
        </div>
    {{-- <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card> --}}
</x-guest-layout>
