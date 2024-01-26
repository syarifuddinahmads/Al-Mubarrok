@extends('admin.layouts.app')

@section('content')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">User</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                    <li class="breadcrumb-item active">User</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="card">
    <div class="card-body">
        <h4 class="card-title">Data User</h4>
        <p class="card-title-desc">Manage and monitoring users.</p>    
        
        <div class="border rounded p-3">
            <div class="table-responsive">
                <table class="table table-striped mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="text-center">#</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Active</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $key=> $user)
                        <tr>
                            <td class="text-center">{{$key+1}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->username}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->active == 1 ? 'Active':'Inactive'}}</td>
                            <td class="text-center">
                                <a href="" class="btn btn-sm btn-outline-info"><i class="bx bx-pencil"></i></a>
                                <a href="" class="btn btn-sm btn-outline-danger"><i class="bx bx-trash"></i></a>
                            </td>
                        </tr>
                        @empty
                            
                        @endforelse
                    </tbody>
                    <tfoot>
                        {{$users->links()}}
                    </tfoot>
                </table>
            </div>
        </div>

    </div>
</div>



@endsection