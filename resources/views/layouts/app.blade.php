<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ruben</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            font-family: Arial, sans-serif;
            color: #333;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            color: #666;
            font-weight: bold;
            text-transform: uppercase;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        /* Estilo para la primera columna */
        td:first-of-type {
            font-weight: bold;
        }

        td:nth-child(2) {
            font-weight: bold;
        }

        td:nth-child(3) {
            font-weight: bold;
        }

        /* Estilo para las filas alternas */
        tr:nth-of-type(even) {
            background-color: #fafafa;
        }


        table a:hover {
            text-decoration: underline;
        }


        table a:focus {
           
            color: #f00;
        }
    </style>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</head>

<body>
    <header>
        <div class="container">
            <div>
                <h1>Proyecto Ruben Núñez</h1>
            </div>
        </div>
        <nav class="navbar bg-body-tertiary ">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('images/logo-centro.jpg') }}" alt="HOME" width="80" height="80">  
                </a>
                
            </div>
        </nav>
    </header>
    @yield('content')


    @include('layouts.footer')