<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>

    <style>
        /* Basic reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body setup */
        body {
            font-family: 'Arial', sans-serif;
            height: 100vh;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Welcome container */
        .welcome-container {
            background: linear-gradient(45deg, #6a11cb, #2575fc);
            width: 80%;
            max-width: 600px;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            text-align: center;
            color: white;
            transition: background 0.5s ease;
        }

        /* Heading styling */
        .welcome-message h1 {
            font-size: 3rem;
            margin-bottom: 20px;
        }

        /* Paragraph styling */
        .welcome-message p {
            font-size: 1.2rem;
            margin-bottom: 30px;
        }

        /* Button styling */
        .welcome-message button {
            padding: 15px 30px;
            background-color: #ff4081;
            color: white;
            font-size: 1rem;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .welcome-message button:hover {
            background-color: #ff80ab;
        }

        /* Responsiveness */
        @media (max-width: 768px) {
            .welcome-container {
                width: 90%;
                padding: 30px;
            }

            .welcome-message h1 {
                font-size: 2rem;
            }

            .welcome-message p {
                font-size: 1rem;
            }
        }

        @media (max-width: 480px) {
            .welcome-container {
                width: 95%;
                padding: 20px;
            }

            .welcome-message h1 {
                font-size: 1.5rem;
            }

            .welcome-message p {
                font-size: 0.9rem;
            }
        }
    </style>

</head>

<body>
    <div class="welcome-container">
        <div class="welcome-message">
            <h1>Welcome to Eblix <br>Task Managment System!</h1>
            <p>We're glad you're here. Enjoy exploring!</p>
            <button onclick="redirectToLogin()">Go to Login Page</button>
        </div>
    </div>

    <script>
        function redirectToLogin() {
            // Change background color before navigating (optional)
            const colors = [
                'linear-gradient(45deg, #ff512f, #dd2476)',
                'linear-gradient(45deg, #34e89e, #0f3443)',
                'linear-gradient(45deg, #ff6a00, #ee0979)',
                'linear-gradient(45deg, #00b4db, #0083b0)',
                'linear-gradient(45deg, #00c6ff, #0072ff)'
            ];
            const randomColor = colors[Math.floor(Math.random() * colors.length)];
            document.querySelector('.welcome-container').style.background = randomColor;

            // Redirect to the login route after a short delay
            setTimeout(function() {
                window.location.href = "{{ route('login') }}"; // Laravel's route helper for login route
            }, 1000); // 1 second delay for background color change effect
        }
    </script>
</body>

</html>
