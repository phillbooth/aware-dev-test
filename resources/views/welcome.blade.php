<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
@vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="bg-gray-100 flex justify-center items-center h-screen">

    @auth
        <script>
            window.location = "{{ route('jokes.index') }}"; // Redirect to the results page if logged in
        </script>
    @else
        <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-md text-center">
            <h1 class="text-3xl font-bold mb-6">Welcome to the Joke App</h1>

            <div class="mb-4">
                <a href="{{ route('login') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Login
                </a>
            </div>
            <div>
                <a href="{{ route('register') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Create Account
                </a>
            </div>
        </div>
    @endauth

</body>
</html>
