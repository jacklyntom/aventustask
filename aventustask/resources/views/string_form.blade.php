<!DOCTYPE html>
<html>
<head>
    <title>String Checker</title>
</head>
<body>
    <form action="{{ route('checkStrings') }}" method="POST">
        @csrf
        <label for="master_string">Master String:</label>
        <input type="text" id="master_string" name="master_string" required><br><br>

        <label for="string_1">String 1:</label>
        <input type="text" id="string_1" name="string_1" required><br><br>

        <label for="string_2">String 2:</label>
        <input type="text" id="string_2" name="string_2" required><br><br>

        <label for="string_3">String 3:</label>
        <input type="text" id="string_3" name="string_3" required><br><br>

        <label for="string_4">String 4:</label>
        <input type="text" id="string_4" name="string_4" required><br><br>

        <button type="submit">Check Strings</button>
    </form>
    @if (session('results'))
    <h2>Results:</h2>
    <ul>
        @foreach (session('results') as $string => $result)
            <li>{{ ucfirst($string) }} - {{ $result }}</li>
        @endforeach
    </ul>
@endif
</body>
</html>
