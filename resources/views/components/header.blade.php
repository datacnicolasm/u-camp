<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @if(session('title'))
            {{ session('title') }}
        @else
            Account Camp - Contabilidad y finanzas
        @endif
    </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Google Font: Madimi One -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Madimi+One&display=swap">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- datatables -->
    <link href="https://cdn.datatables.net/v/bs4/dt-2.0.5/b-3.0.2/datatables.min.css" rel="stylesheet">
    <!-- Llamado al archivo CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>