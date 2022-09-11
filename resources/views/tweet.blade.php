<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    @include('layouts.header')

    <style type="text/css">
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

        .scroll {
            max-height: 600px;
            overflow-y: auto;
        }
    </style>
</head>

<body>

    <div class="bg-image shadow-2-strong" id="intro">
        <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
            <div class="d-flex justify-content-center align-items-center h-100">
                <div class="card" style="width:40%; background-color:transparent">
                    <div class="card-header">
                        <h3 style="color: #fff">Recent Tweets about latest disaster:<br></h3>
                        <h5 style="color:aliceblue">{{ $type }} in {{ $location }} on {{ $date }}
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="container scroll">
                            @foreach ($data as $key2 => $k2)
                                <div class="row">
                                    <div class="col-2"></div>
                                    <div class="col-8">
                                        <blockquote class="twitter-tweet" data-theme="dark">
                                            <p lang="in" dir="ltr"><a
                                                    href="https://twitter.com/{{ $k2['author_id'] }}/status/{{ $k2['id'] }}?ref_src=twsrc%5Etfw"></a>
                                        </blockquote>
                                    </div>
                                    <div class="col-2"></div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="card" style="width:40%; background-color:transparent">
                    <div class="card-header">
                        <h3 style="color: #fff">Recent Tweets from Jabatan Meteorologi Malaysia:<br></h3>
                       <h5 style="color: #fff">MET official website: <a
						href="https://www.met.gov.my/" target="_blank" style="color: rgb(164, 182, 245)">met.gov.my</a></h5>
                    </div>
                    <div class="card-body">
                        <div class="container scroll">
                            <div class="row">
                                <div class="col-2"></div>
                                <div class="col-8">
                                    <blockquote class="twitter-tweet" data-theme="dark">
                                        <p lang="in" dir="ltr"><a class="twitter-timeline" data-theme="dark"
                                                href="https://twitter.com/metmalaysia?ref_src=twsrc%5Etfw">Tweets by
                                                metmalaysia</a>
                                    </blockquote>


                                </div>
                                <div class="col-2"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footer')
</body>




</body>
<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
</script>
