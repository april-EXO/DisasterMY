@extends('layouts.header')

@section('title', 'Page Title')

@section('content')

<head>
    <style>
        table {
            margin: auto;
        }

        td,
        th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>

<body>
    <table>
        <tr>
            <td>No.</td>
            <td>Event</td>
            <td>Location</td>
            <td>Date</td>
            <td>Time</td>
            <td>Remark</td>
            <td colspan="2">Action</td>
        </tr>
        @foreach ($pending as $a)
        <tr>
            <td>{{$a['id']}}</td>
            <td>{{$a['event']}}</td>
            <td>{{$a['location']}}</td>
            <td>{{$a['date']}}</td>
            <td>{{$a['time']}}</td>
            <td>{{$a['remark']}}</td>
            <td> <a href={{ "approve/".$a['id'] }}>Approve</a></td>
            <td> <a href={{ "reject/".$a['id'] }}>Reject</a></td>
        </tr>
        @endforeach
    </table>
</body>
@stop