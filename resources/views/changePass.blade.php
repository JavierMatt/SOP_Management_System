@extends('layouts.templateChangePW')

@section('content')

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm bg-white p-4 opacity-90 rounded-xl">
      <h1 class="text-2xl font-bold text-red-800">Change Password</h1>

      <div class="error mt-5">
        @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
      @endif

      @if ($errors->any())
          <div class="alert alert-danger">
              {{ session('error') }}
          </div>
      @endif

      @if ($errors->any())
          <div class="alert alert-success">
              {{ session('success') }}
          </div>
      @endif
    </div>
    

    <form class="space-y-6" action="#" method="POST" action="{{ route('changePass') }}">
      @csrf
      <div>
        <div class="mt-5">
          <label for="old_password" class="form-label">Old Password</label>
          <input id="old_password" name="old_password" type="password" placeholder=" Enter your current password" required autofocus class="block w-full rounded-md border-0 py-1.5 pl-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 sm:text-sm sm:leading-6">
        </div>
      </div>

      <div>
        <div class="mt-2">
          <label for="new_password" class="form-label">New Password</label>
          <input id="new_password" name="new_password" type="password" autocomplete="current-password" required placeholder=" Enter your new password" class="block w-full rounded-md border-0 py-1.5 pl-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 sm:text-sm sm:leading-6">
        </div>
      </div>

      <div>
        <div class="mt-2">
          <label for="new_password_confirmation" class="form-label">Confirm Password</label>
          <input id="new_password_confirmation" name="new_password_confirmation" type="password" autocomplete="current-password" required placeholder=" Confirm your password" class="block w-full rounded-md border-0 py-1.5 pl-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 sm:text-sm sm:leading-6">
        </div>
      </div>

      <div>
        <button type="submit" class="flex w-full justify-center rounded-md bg-rose-800 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-white hover:text-rose-800">Change Password</button>
      </div>
    </form>

@endsection('content')

{{-- <div class="card-header">Change Password</div>
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

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif


                    <form method="POST" action="{{ route('changePass') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="old_password" class="form-label">Old Password</label>
                            <input type="password" class="form-control" id="old_password" name="old_password" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="new_password" class="form-label">New Password</label>
                            <input type="password" class="form-control" id="new_password" name="new_password" required>
                        </div>
                        <div class="mb-3">
                            <label for="new_password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div> --}}