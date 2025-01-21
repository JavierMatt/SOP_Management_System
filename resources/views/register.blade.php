@extends('layouts.templateForm')

@section('content')

  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm bg-white p-4 opacity-90 rounded-xl">
    <h1 class="text-2xl font-bold text-rose-800">Register</h1>
    <h3 class="mt-2 text-sm text-rose-800">Join us to unlock your documents</h3>

    <div class="error mt-5">
        @if(session('error-N'))
            <div class="bg-red-500 text-white p-4 rounded">
                {{ session('error-N') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="bg-red-500 text-white p-4 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <form class="space-y-6" action="{{ route('register') }}" method="POST">
    @csrf
        <div>
            <div class="mt-5">
            <input id="username" name="username" type="text" autocomplete="username" placeholder=" Enter Username" required class="block w-full rounded-md py-1.5 text-gray-600 p-2 border-solid border-2 border-rose-800 placeholder:text-gray-400 sm:text-sm sm:leading-6">
            </div>
        </div>

        <div>
            <div class="mt-2">
                <input id="password" name="password" type="password" autocomplete="current-password" required placeholder="Password" class="block w-full border-solid border-2 p-2 border-rose-800 rounded-md border-0 py-1.5 text-gray-600 shadow-sm placeholder:text-gray-400 sm:text-sm sm:leading-6">
            </div>
        </div>

        <div>
          <div class="mt-5">
          <input id="role" name="role" type="text" autocomplete="role" placeholder=" Enter Role (admin/user)" required class="block w-full rounded-md py-1.5 text-gray-600 p-2 border-solid border-2 border-rose-800 placeholder:text-gray-400 sm:text-sm sm:leading-6">
          </div>
        </div>

        <div>
            <button type="submit" class="flex w-full justify-center rounded-md bg-rose-800 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-rose-900  hover:text-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Register</button>
        </div>
    </form>
</div>


@endsection('content')