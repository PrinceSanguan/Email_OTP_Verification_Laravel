<!DOCTYPE html>
<html>
<head>
    <title>Verify OTP</title>
</head>
<body>
    <form action="{{ route('verify.otp') }}" method="POST">
        @csrf
        <input type="hidden" name="email" value="{{ request('email') }}">
        <div>
            <label for="otp">OTP:</label>
            <input type="text" id="otp" name="otp" required>
        </div>
        <button type="submit">Verify OTP</button>
    </form>
</body>
</html>