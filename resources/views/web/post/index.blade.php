@extends('web.layouts.app')
@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Title Page</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                    <li class="breadcrumb-item active">Title Page</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-xl-8 col-lg-8">
        <div class="row">
            <div class="col-sm-6">
                <div class="card p-1">
                    
                    <div class="position-relative">
                        <img src="assets/images/small/img-2.jpg" alt="" class="img-thumbnail">
                    </div>
        
                    <div class="p-3">
                        <h5><a href="blog-details.html" class="text-dark">Beautiful Day with Friends</a></h5>
                    </div>
        
                    <div class="p-3">
                        <ul class="list-inline">
                            <li class="list-inline-item me-3">
                                <a href="javascript: void(0);" class="text-muted">
                                    <i class="bx bx-purchase-tag-alt align-middle text-muted me-1"></i> Project
                                </a>
                            </li>
                            <li class="list-inline-item me-3">
                                <a href="javascript: void(0);" class="text-muted">
                                    <i class="bx bx-comment-dots align-middle text-muted me-1"></i> 12 Comments
                                </a>
                            </li>
                            <li class="list-inline-item me-3">
                                <a href="javascript: void(0);" class="text-muted">
                                    <i class="bx bx-comment-dots align-middle text-muted me-1"></i> 10 Apr, 2020
                                </a>
                            </li>
                        </ul>
                        <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet</p>
        
                        <div>
                            <a href="javascript: void(0);" class="text-primary">Read more <i class="mdi mdi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-4">
        @include('web.post.sidebar')
    </div>
</div>
@endsection