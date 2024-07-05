<!DOCTYPE html>
<html>
<head>
    <title>Master String Checker</title>
</head>
<body>
    <h1>Master String Checker</h1>
    <form action="/check-strings" method="POST">
        @csrf
        <label for="masterString">Master String:</label>
        <input type="text" id="masterString" name="masterString" required><br><br>

        <label for="string1">String 1:</label>
        <input type="text" id="string1" name="string1" required><br><br>

        <label for="string2">String 2:</label>
        <input type="text" id="string2" name="string2" required><br><br>

        <label for="string3">String 3:</label>
        <input type="text" id="string3" name="string3" required><br><br>

        <label for="string4">String 4:</label>
        <input type="text" id="string4" name="string4" required><br><br>

        <button type="submit">Check Strings</button>
    </form>

    @if (isset($results))
        <h2>Results:</h2>
        <ul>
            @foreach ($results as $key => $result)
                <li>{{ $key }} - {{ $result }}</li>
            @endforeach
        </ul>
    @endif
</body>
</html>
