<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stored Jokes</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen flex flex-col items-center py-6">
    <div class="w-full max-w-3xl bg-white p-8 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-6 text-center">Stored Jokes</h1>

        @if ($jokes->isEmpty())
            <p class="text-center text-gray-700">No jokes available.</p>
        @else
            <ul class="space-y-4">
                @foreach ($jokes as $joke)
                    <li class="bg-gray-100 p-4 rounded-lg shadow">
                        <strong>{{ $joke->id }}:</strong> {{ $joke->joke }}
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</body>
</html>
