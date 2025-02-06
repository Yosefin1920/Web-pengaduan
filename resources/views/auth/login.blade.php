<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Favicon --}}
    <link rel="icon" type="image/x-icon" href="{{ asset('img/logo.png') }}">

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    {{-- Icon --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- Sweet alert --}}
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">


    <title>Login | Lapor Purworejo</title>

    @vite('resources/css/app.css')

</head>

<body class="font-poppins">
    <div class="flex items-center justify-center h-screen px-8 gap-8 ">
        <div class="rounded-lg p-8 md:w-1/2 w-full max-w-lg h-full flex flex-col justify-center">
            <div class="flex items-center justify-between mb-8">
                <a href="{{ route('pengaduan.home') }}" class="flex items-center gap-2">
                    <img src="{{ asset('img/logo.png') }}" alt="Logo" class="h-12">
                    <h3 class="text-gray-800 font-bold text-sm leading-tight">
                        Lapor <br> Purworejo
                    </h3>
                </a>
                <div class="flex items-center gap-4">
                    <img src="{{ asset('img/kominfo.png') }}" alt="Kominfo" class="h-12">
                    <img src="{{ asset('img/logo-purworejo.png') }}" alt="Logo Purworejo" class="h-12">
                </div>
            </div>

            <h1 class="text-4xl font-bold text-gray-800 mb-1 text-center">Welcome Back!</h1>
            <p class="text-gray-600 text-xs text-center mb-6">Login now to take action and share your concerns</p>

            <form action="{{ route('login-process') }}" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" placeholder="Enter Your Email"
                        class="w-full mt-1 px-4 py-2 border rounded-lg shadow-sm focus:ring-primary focus:border-primary"
                        required>
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter Your Password"
                        class="w-full mt-1 px-4 py-2 border rounded-lg shadow-sm focus:ring-primary focus:border-primary"
                        required>
                </div>
                <div class="flex items-center justify-end">
                    <a href="#" class="text-sm hover:underline">Forgot password?</a>
                </div>
                <button type="submit"
                    class="w-full bg-primary text-white font-semibold py-2 rounded-lg hover:bg-opacity-80 transition-colors">
                    Login
                </button>
            </form>

            <div class="text-center my-4">
                <p class="text-gray-600">- Or continue with -</p>
            </div>
            <div class="flex justify-center">
                <a href="#"
                    class="w-full bg-primary text-white text-center font-semibold py-2 rounded-lg hover:bg-opacity-80 transition-colors">
                    Login with Google
                </a>
            </div>

            <p class="text-center mt-6 text-sm text-gray-600">
                Don't have an account? <a href="{{ route('register') }}"
                    class="text-secondary font-semibold hover:underline">Register
                    now</a>
            </p>

            <p class="text-center mt-4 text-xs text-gray-500">
                By clicking "Login" you agree to our <a href="#" class="text-primary hover:underline">Privacy
                    Policy</a> &amp; <a href="#" class="text-primary hover:underline">Terms of Service</a>.
            </p>
        </div>
        <div class="hidden md:block md:w-1/2 h-full p-8">
            <img src="{{ asset('img/bg-purworejo.png') }}" alt="bg-purworejo"
                class="w-full h-full object-cover rounded-lg">
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('success'))
        <script>
            Swal.fire({
                title: 'Sukses!',
                text: "{{ session('success') }}",
                icon: 'success',
                confirmButtonText: 'OK'
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                title: 'Error!',
                text: "{{ session('error') }}",
                icon: 'error',
                confirmButtonText: 'OK'
            });
        </script>
    @endif

</body>



</html>
