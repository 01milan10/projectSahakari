@extends("layouts.backend.app")

@section('header')
    @include('layouts.backend.header')
@endsection

@section('sidebar')
    @include('layouts.backend.sidebar')
@endsection

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Our Gallery</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active">Gallery</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row" id="gallery">
                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <div class="card-title">
                                    Our Gallery
                                </div>
                            </div>
                            <div class="card-body">
                                <div>
                                    <div class="btn-group w-100 mb-2">
                                        <a class="btn btn-info active" href="javascript:void(0)" data-filter="all"> All items </a>
                                        <a class="btn btn-info" href="javascript:void(0)" data-filter="1"> Category 1 (WHITE) </a>
                                        <a class="btn btn-info" href="javascript:void(0)" data-filter="2"> Category 2 (BLACK) </a>
                                        <a class="btn btn-info" href="javascript:void(0)" data-filter="3"> Category 3 (COLORED) </a>
                                        <a class="btn btn-info" href="javascript:void(0)" data-filter="4"> Category 4 (COLORED, BLACK) </a>
                                    </div>
                                    <div class="mb-2">
                                        <a class="btn btn-secondary" href="javascript:void(0)" data-shuffle> Shuffle items </a>
                                        <div class="float-right">
                                            <select class="custom-select" style="width: auto;" data-sortOrder>
                                                <option value="index"> Sort by Position </option>
                                                <option value="sortData"> Sort by Custom Data </option>
                                            </select>
                                            <div class="btn-group">
                                                <a class="btn btn-default" href="javascript:void(0)" data-sortAsc> Ascending </a>
                                                <a class="btn btn-default" href="javascript:void(0)" data-sortDesc> Descending </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="filter-container p-0 row">
                                        <div class="filtr-item col-sm-2" data-category="1" data-sort="white sample">
                                            <a href="{{asset('image/1.jpg')}}" data-toggle="lightbox" data-type="image" data-title="">
                                                <img src="{{asset('image/1.jpg')}}" class="img-fluid" alt="white sample"/>
                                            </a>
                                        </div>
                                        <div class="filtr-item col-sm-2" data-category="2, 4" data-sort="black sample">
                                            <a href="{{asset('image/2.jpg')}}" data-toggle="lightbox" data-type="image" data-title="sample 2 - black">
                                                <img src="{{asset('image/2.jpg')}}" class="img-fluid" alt="black sample"/>
                                            </a>
                                        </div>
                                        <div class="filtr-item col-sm-2" data-category="3, 4" data-sort="red sample">
                                            <a href="{{asset('image/3.jpg')}}" data-toggle="lightbox" data-type="image" data-title="sample 3 - red">
                                                <img src="{{asset('image/3.jpg')}}" class="img-fluid" alt="red sample"/>
                                            </a>
                                        </div>
                                        <div class="filtr-item col-sm-2" data-category="3, 4" data-sort="red sample">
                                            <a href="{{asset('image/4.jpg')}}" data-toggle="lightbox" data-type="image" data-title="sample 4 - red">
                                                <img src="{{asset('image/5.jpg')}}" class="img-fluid" alt="red sample"/>
                                            </a>
                                        </div>
                                        <div class="filtr-item col-sm-2" data-category="2, 4" data-sort="black sample">
                                            <a href="{{asset('image/6.jpg')}}" data-toggle="lightbox" data-type="image" data-title="sample 5 - black">
                                                <img src="{{asset('image/6.jpg')}}" class="img-fluid" alt="black sample"/>
                                            </a>
                                        </div>
                                        <div class="filtr-item col-sm-2" data-category="1" data-sort="white sample">
                                            <a href="{{asset('image/7.jpg')}}" data-toggle="lightbox" data-type="image" data-title="sample 6 - white">
                                                <img src="{{asset('image/7.jpg')}}" class="img-fluid" alt="white sample"/>
                                            </a>
                                        </div>
                                        <div class="filtr-item col-sm-2" data-category="1" data-sort="white sample">
                                            <a href="{{asset('image/8.jpg')}}" data-toggle="lightbox" data-type="image" data-title="sample 7 - white">
                                                <img src="{{asset('image/8.jpg')}}" class="img-fluid" alt="white sample"/>
                                            </a>
                                        </div>
                                        <div class="filtr-item col-sm-2" data-category="2, 4" data-sort="black sample">
                                            <a href="{{asset('image/9.jpg')}}" data-toggle="lightbox" data-type="image" data-title="sample 8 - black">
                                                <img src="{{asset('image/9.jpg')}}" class="img-fluid" alt="black sample"/>
                                            </a>
                                        </div>
                                        <div class="filtr-item col-sm-2" data-category="3, 4" data-sort="red sample">
                                            <a href="{{asset('image/10.jpg')}}" data-toggle="lightbox" data-type="image" data-title="sample 9 - red">
                                                <img src="{{asset('image/10.jpg')}}" class="img-fluid" alt="red sample"/>
                                            </a>
                                        </div>
                                        <div class="filtr-item col-sm-2" data-category="1" data-sort="white sample">
                                            <a href="{{asset('image/11.jpg')}}" data-toggle="lightbox" data-type="image" data-title="sample 10 - white">
                                                <img src="{{asset('image/11.jpg')}}" class="img-fluid" alt="white sample"/>
                                            </a>
                                        </div>
                                        <div class="filtr-item col-sm-2" data-category="1" data-sort="white sample">
                                            <a href="{{asset('image/12.jpg')}}" data-toggle="lightbox" data-type="image" data-title="sample 11 - white">
                                                <img src="{{asset('image/12.jpg')}}" class="img-fluid" alt="white sample"/>
                                            </a>
                                        </div>
                                        <div class="filtr-item col-sm-2" data-category="2, 4" data-sort="black sample">
                                            <a href="{{asset('image/13.jpg')}}" data-toggle="lightbox" data-type="image" data-title="sample 12 - black">
                                                <img src="{{asset('image/13.jpg')}}" class="img-fluid" alt="black sample"/>
                                            </a>
                                        </div>
                                        <div class="filtr-item col-sm-2" data-category="2, 4" data-sort="black sample">
                                            <a href="{{asset('image/14.jpg')}}" data-toggle="lightbox" data-type="image" data-title="sample 12 - black">
                                                <img src="{{asset('image/14.jpg')}}" class="img-fluid" alt="black sample"/>
                                            </a>
                                        </div>
                                        <div class="filtr-item col-sm-2" data-category="2, 4" data-sort="black sample">
                                            <a href="{{asset('image/15.jpg')}}" data-toggle="lightbox" data-type="image" data-title="sample 12 - black">
                                                <img src="{{asset('image/15.jpg')}}" class="img-fluid" alt="black sample"/>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <div class="float-right">
                                        <a class="btn btn-secondary" href="javascript:void(0)" data-shuffle> Add To Gallery </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('footer')
    @include('layouts.backend.footer')
@endsection

@section('script')
    <script>
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox({
                alwaysShowClose: true,
                navigateLeft:true,
                showArrows: true,
                leftArrow: "<<",
                rightArrow: ">>",
                onShown: function() {
                    console.log('Checking our the events huh?');
                },
                onNavigate: function (direction, itemIndex) {
                    console.log('Navigating '+direction+'. Current item: '+itemIndex);
                }
            });
        });

        $('.filter-container').filterizr({gutterPixels: 3});
        $('.btn[data-filter]').on('click', function() {
            $('.btn[data-filter]').removeClass('active');
            $(this).addClass('active');
        });
    </script>
@endsection

