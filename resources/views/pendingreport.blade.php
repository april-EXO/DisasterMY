<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jq-3.6.0/dt-1.12.1/datatables.min.css" /> --}}
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" />


    <title>News</title>
    <style type="text/css">
        .my-custom-scrollbar {
            position: relative;
            /* height: 650 px; */
            overflow: auto;
            background-color: rgba(135, 141, 150, 0.5);
        }

        .table-wrapper-scroll-y {
            display: block;
        }

        tfoot input {
            width: 100%;
            padding: 3px;
            box-sizing: border-box;
        }

        #example_length {
            display: none;
        }

        .hide_select select {
            display: none;
        }

        table {
            white-space: nowrap;
        }


        #intro {
            background-image: url("images/background.jpg");
            height: 100vh;
        }

        /* Height for devices larger than 576px */
        @media (min-width: 992px) {
            #intro {
                margin-top: -58.59px;
            }
        }

        .navbar .nav-link {
            color: #fff !important;
        }

        .table-responsive {
            max-height: 300px;
        }
    </style>
    @include('layouts.header')

</head>

<body>

    <div class="bg-image shadow-2-strong" id="intro">
        <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
            <div class="d-flex justify-content-center align-items-center h-100">
                <div class="card" style="width:80%;">
                    <div class="table-wrapper-scroll-y my-custom-scrollbar">
                        <table class="table table-dark table-striped p-3 table-sm" id="example">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Submitted At</td>
                                    <th scope="col">Type</td>
                                    <th scope="col">Latitude</td>
                                    <th scope="col">Longitude</td>
                                    <th scope="col">User Location</td>
                                    <th scope="col">Location</td>
                                    <th scope="col">Date</td>
                                    <th scope="col">Time</td>
                                    <th scope="col">Message</td>
                                    <th scope="col">Status</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pending as $key => $data)
                                    <tr>
                                        <th scope="row">{{ $key + 1 }}</th>
                                        <td>{{ $data->created_at }}</td>
                                        <td>{{ $data->type }}</td>
                                        <td>{{ $data->latitude }}</td>
                                        <td>{{ $data->longitude }}</td>
                                        <td>{{ $data->locatedlatlng }}</td>
                                        <td>{{ $data->location }}</td>
                                        <td>{{ $data->date }}</td>
                                        <td>{{ $data->time }}</td>
                                        <td>{{ $data->message }}</td>
                                        <td>{{ $data->status }}</td>

                                        @if ($data->status == 'pending')
                                            <td style="text-align: center"><a
                                                    href="{{ '/pending/approve/' . $data['id'] }}"
                                                    class="btn btn-outline-success btn-rounded" role="button"
                                                    data-mdb-ripple-color="dark">Approve</a>
                                            </td>
                                            <td style="text-align: center"><a
                                                    href="{{ '/pending/reject/' . $data['id'] }}"
                                                    class="btn btn-outline-danger btn-rounded" role="button"
                                                    data-mdb-ripple-color="dark">Reject</a>
                                            </td>
                                        @else
                                            <td></td>
                                            <td></td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th scope="col" class="hide_select">#</th>
                                    <th scope="col">Submitted at</td>
                                    <th scope="col">Type</td>
                                    <th scope="col" class="hide_select">Latitude</td>
                                    <th scope="col" class="hide_select">Longitude</td>
                                    <th scope="col">User Location</td>
                                    <th scope="col">Location</td>
                                    <th scope="col">Date</td>
                                    <th scope="col">Time</td>
                                    <th scope="col" class="hide_select">Message</td>
                                    <th scope="col">Status</td>
                                    <td class="hide_select"></td>
                                    <td class="hide_select"></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
@include('layouts.footer')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
</script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>


<script>
    //    $(document).ready(function () {
    //     $('#example').DataTable();
    // });
    $(document).ready(function() {

        $('#example').DataTable({
            initComplete: function() {
                this.api()
                    .columns()
                    .every(function() {
                        var column = this;
                        var select = $('<select><option value=""></option></select>')
                            .appendTo($(column.footer()).empty())
                            .on('change', function() {
                                var val = $.fn.dataTable.util.escapeRegex($(this).val());

                                column.search(val ? '^' + val + '$' : '', true, false)
                                    .draw();
                            });

                        column
                            .data()
                            .unique()
                            .sort()
                            .each(function(d, j) {
                                select.append('<option value="' + d + '">' + d +
                                    '</option>');
                            });
                    });
            },
        });
    });
</script>
