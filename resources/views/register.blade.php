<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 dark:bg-gray-900">
<!-- component -->
<div class="h-screen flex flex-row flex-wrap">
  <div class="bg-sky-100 flex justify-center items-center h-screen">
    <!-- Left: Image -->
    <div class="w-1/2 h-screen hidden lg:block">
      <img src="https://img.freepik.com/fotos-premium/imagen-fondo_910766-187.jpg?w=826" alt="Placeholder Image" class="object-cover w-full h-full">
    </div>
    <!-- Right: Register Form -->
    <div class="lg:p-36 md:p-52 sm:20 p-8 w-full lg:w-1/2">
      <h1 class="text-2xl font-semibold mb-4">Register</h1>
      <!-- Update action dengan route register -->
      <form action="{{ route('actionregister') }}" method="POST">
        @csrf <!-- Tambahkan token CSRF untuk keamanan -->

        <!-- Username Input -->
        <div class="mb-4">
          <label for="username" class="block text-gray-600">Username</label>
          <input type="text" id="username" name="username" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500" autocomplete="off" required>
        </div>

        <!-- Email Input -->
        <div class="mb-4">
          <label for="email" class="block text-gray-600">Email</label>
          <input type="email" id="email" name="email" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500" autocomplete="off" required>
        </div>

        <!-- No HP Input -->
        <div class="mb-4">
          <label for="phone" class="block text-gray-600">Phone Number</label>
          <input type="tel" id="phone" name="phone" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500" autocomplete="off" required>
        </div>

        <!-- Password Input -->
        <div class="mb-4">
          <label for="password" class="block text-gray-800">Password</label>
          <input type="password" id="password" name="password" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500" autocomplete="off" required>
        </div>

        <!-- Confirm Password Input -->
        <div class="mb-4">
          <label for="password_confirmation" class="block text-gray-800">Confirm Password</label>
          <input type="password" id="password_confirmation" name="password_confirmation" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500" autocomplete="off" required>
        </div>

        <!-- Register Button -->
        <button type="submit" class="bg-red-500 hover:bg-blue-600 text-white font-semibold rounded-md py-2 px-4 w-full">Register</button>
      </form>

      <!-- Login Link -->
      <div class="mt-6 text-green-500 text-center">
        <a href="#" class="hover:underline">Already have an account? Login</a>
      </div>
    </div>
  </div>
</div>
@if(session('success'))
    <div class="mb-4 text-green-600 bg-green-100 border border-green-400 p-4 rounded">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="mb-4 text-red-600 bg-red-100 border border-red-400 p-4 rounded">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</body>
</html>
