<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Not Found</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="bg-gray-100 flex justify-center items-center h-screen">
    <div class="text-center">
        <h1 class="text-4xl font-bold text-gray-800">404</h1>
        <p class="text-xl text-gray-600">Oops! The page you are looking for doesn't exist.</p>
        <a href="{{ route('home') }}" class="mt-4 inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Go Home</a>
    </div>
</body>
</html>
