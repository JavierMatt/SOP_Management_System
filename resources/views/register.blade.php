@extends('layouts.templateForm')

@section('content')

  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm bg-white p-4 opacity-90 rounded-xl">
    <h1 class="text-2xl font-bold text-rose-800">Register</h1>
    <h3 class="mt-2 text-sm text-rose-800">Join us to unlock your documents</h3>

    {{-- <div class="error mt-5">
        @if(session('error'))
            <div class="bg-red-500 text-white p-4 rounded">
                {{ session('error') }}
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
    </div> --}}

    <form class="space-y-6" action="{{ route('login') }}" method="POST">
    @csrf
        <div>
          <div class="mt-5">
          <input id="name" name="name" type="text" autocomplete="name" placeholder=" Enter Name" required class="block w-full rounded-md py-1.5 text-gray-600 p-2 border-solid border-2 border-rose-800 placeholder:text-gray-400 sm:text-sm sm:leading-6">
          </div>
        </div>

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
          <input id="role" name="role" type="text" autocomplete="role" placeholder=" Enter Role (Admin/User)" required class="block w-full rounded-md py-1.5 text-gray-600 p-2 border-solid border-2 border-rose-800 placeholder:text-gray-400 sm:text-sm sm:leading-6">
          </div>
        </div>

        <div>
            <button type="submit" class="flex w-full justify-center rounded-md bg-rose-800 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-rose-900  hover:text-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Register</button>
        </div>
    </form>
</div>


@endsection('content')

{{-- <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">User Registration</div>
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Role</label>
                            <input type="text" class="form-control" id="role" name="role" value="{{ old('role') }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}