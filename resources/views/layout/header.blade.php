<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('css')
    <title>Student Form</title>
    @yield('js')
    <style>
        table, td, th {
            border: 1px solid black;
        }
        table{
            border-collapse: collapse;
            width: 100%;
        }
        th{
            height: 50px
        }
        input,textarea,select{
            margin: 10px;
            padding: 10px
        }
    </style>
</head>
<body>