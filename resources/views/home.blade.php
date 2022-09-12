<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: rgba(212, 197, 185, 0.2);color:white">
    <!-- Container wrapper -->
    <div class="container-fluid">
        <!-- Toggle button -->
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Navbar brand -->
            <a class="navbar-brand mt-2 mt-lg-0 fa-sm img-fluid" href="#" title="Home Page">
                <img src="images/header/disasterLogo.png" height="20" alt="Logo" loading="lazy" /> DisasterMY
            </a>

        </div>
        <!-- Collapsible wrapper -->

        <div class="d-flex align-items-center">
            <!-- Right links -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 justify-content-end">

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                </li>
            </ul>
            <!-- Right links -->
        </div>


    </div>
    <!-- Right elements -->
    </div>
    <!-- Container wrapper -->
</nav>
<!-- Navbar -->

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" />


    <title>Admin - pending reports</title>
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
                                    <th scope="col">Status</td>
                                    <th scope="col">Type</td>
                                    <th scope="col">User Location</td>
                                    <th scope="col">Location</td>
                                    <th scope="col">Date</td>
                                    <th scope="col">Time</td>
                                    <th scope="col">Message</td>
                                    <td></td>
                                    <td></td>
                                    <th scope="col">Latitude</td>
                                    <th scope="col">Longitude</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pending as $key => $data)
                                    <tr>
                                        <th scope="row">{{ $key + 1 }}</th>
                                        <td>{{ $data->created_at }}</td>

                                        <td>{{ $data->status }}</td>
                                        <td>{{ $data->type }}</td>
                                        <td>{{ $data->locatedlatlng }}</td>
                                        <td>{{ $data->location }}</td>
                                        <td>{{ $data->date }}</td>
                                        <td>{{ $data->time }}</td>
                                        <td>{{ $data->message }}</td>
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
                                        <td>{{ $data->latitude }}</td>
                                        <td>{{ $data->longitude }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th scope="col" class="hide_select">#</th>
                                    <th scope="col">Submitted at</td>
                                    <th scope="col">Status</td>
                                    <th scope="col">Type</td>
                                    <th scope="col">User Location</td>
                                    <th scope="col">Location</td>
                                    <th scope="col">Date</td>
                                    <th scope="col" class="hide_select">Time</td>
                                    <th scope="col" class="hide_select">Message</td>
                                    <td class="hide_select"></td>
                                    <td class="hide_select"></td>
                                    <th scope="col" class="hide_select">Latitude</td>
                                    <th scope="col" class="hide_select">Longitude</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
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

<footer class="bg-light text-center text-lg-start">
    <div class="p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8 text-center">© 2022 Copyright:
                <a class="text-dark" href="https://DisasterMY.com/">DisasterMY.com</a>
            </div>
            {{-- <form method="POST"> --}}
            <div class="col-2 text-end"><a class="text-dark" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></div>
            {{-- </form> --}}
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}</form>
        </div>
    </div>
</footer>
