<!DOCTYPE html>
<html>
<head>
    <title>Debug Registration Form</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <h2>Debug Registration Test</h2>
    
    <form id="debug-form">
        <div>
            <label>Name:</label>
            <input type="text" id="name" name="name" value="Test User">
        </div>
        <div>
            <label>Email:</label>
            <input type="email" id="email" name="email" value="test@example.com">
        </div>
        <div>
            <label>Password:</label>
            <input type="password" id="password" name="password" value="">
        </div>
        <div>
            <label>Confirm Password:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" value="">
        </div>
        <button type="button" id="submit-btn">Test Registration</button>
    </form>

    <div id="result"></div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('#submit-btn').click(function() {
            var formData = {
                _token: "{{ csrf_token() }}",
                name: $('#name').val(),
                email: $('#email').val(),
                password: $('#password').val(),
                password_confirmation: $('#password_confirmation').val()
            };
            
            console.log('Sending data:', formData);
            console.log('Passwords match:', formData.password === formData.password_confirmation);
            
            $.ajax({
                url: "{{ route('register.proses') }}",
                type: 'POST',
                data: formData,
                success: function(response) {
                    $('#result').html('<pre>' + JSON.stringify(response, null, 2) + '</pre>');
                },
                error: function(xhr) {
                    $('#result').html('<pre>Error: ' + xhr.responseText + '</pre>');
                }
            });
        });
    </script>
</body>
</html>
