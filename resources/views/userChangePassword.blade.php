@extends('layouts.templateForm')

@section('content')

  <head>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  </head>

  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    <h1 class="text-2xl font-bold text-white">Change Password</h1>
    <form class="space-y-6" action="#" method="POST">
      <div>
        <div class="mt-5">
          <input id="username" name="username" type="text" autocomplete="username" placeholder=" Enter your current password" required class="block w-full rounded-md border-0 py-1.5 pl-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
      </div>

      <div>
        <div class="mt-2">
            <input id="password" name="password" type="password" autocomplete="current-password" required placeholder=" Enter your new password" class="block w-full rounded-md border-0 py-1.5 pl-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
      </div>

      <div>
        <button type="submit" class="flex w-full justify-center rounded-md bg-rose-800 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-white hover:text-rose-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Change Password</button>
      </div>
    </form>
  </div>
</div>

@endsection('content')