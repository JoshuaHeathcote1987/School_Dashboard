@extends('layouts.dashboard')

@section('title', 'English Learning')

@section('content')    


@if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show alert-block text-center">
        {{ $message }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if ($message = Session::get('fail'))
    <div class="alert alert-danger alert-dismissible fade show alert-block text-center">
        {{ $message }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if (count($errors) > 0)
    <div class="alert alert-warning alert-dismissible fade show alert-block text-center">
        Whoops! There were some problems with your input.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    <ul>
@foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
@endforeach </ul>
    </div>
@endif


<!-- Content Row -->
<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success  shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Admins</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$data['adminCount']}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-child fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger  shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Teachers</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$data['teacherCount']}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user-graduate fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning  shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Parents</div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$data['parentCount']}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Students</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$data['studentCount']}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-child fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>

<!-- Content Row -->
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Users</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Database Actions:</div>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#userCreateModal">
                            <i class="fas fa-plus-square fa-sm fa-fw mr-2 text-gray-400"></i>
                            Create
                        </a>

                        <hr class="mx-2">

                        <a class="dropdown-item" href="#">
                            <i class="fas fa-share-square fa-sm fa-fw mr-2 text-gray-400"></i>
                            Send
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-database fa-sm fa-fw mr-2 text-gray-400"></i>
                            Backup
                        </a>

                        <hr class="mx-2">

                        <a class="dropdown-item" href="#">
                            <i class="far fa-minus-square fa-sm fa-fw mr-2 text-gray-400"></i>
                            Truncate
                        </a>
                    </div>
                </div>
            </div>

            {{-- USER FUNCTIONALITY --}}

            <!-- CREATE USER -->
            <form action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
                @csrf 
                <div class="modal fade" id="userCreateModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="">Create</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Name</label>
                                                <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Wanda H Woods" name="name" required>
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="">Telephone</label>
                                                <input type="tel" class="form-control input-medium bfh-phone @error('telephone') is-invalid @enderror" data-format="+dd (ddd) ddd-dddd" name="telephone" required>
                                                @error('telephone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Email</label>
                                                <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="johan.lync2@gmail.com" name="email" required>
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="">Role</label>
                                                <select class="form-control" name="role" required>
                                                    <option value="1">Admin</option>
                                                    <option value="2">Teacher</option>
                                                    <option value="3">Parent</option>
                                                    <option value="4">Student</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Address</label>
                                                <input type="" class="form-control @error('address') is-invalid @enderror" value="" placeholder="Buckingham Palace, London, England, SW1" name="address" required>
                                                @error('address')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Password</label>
                                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Password Confirmation</label>
                                                <input type="password" class="form-control @error('password-confirm') is-invalid @enderror" name="password-confirm" required>
                                                @error('password-confirm')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>              
                                <div class="form-group files">
                                    <label for="">Upload Image</label>
                                    <input type="file" class="form-control" name="image" required>
                                </div>                                              
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>


            <!-- Users Table -->
            <div class="card-body">
                <table id="user_table" class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Updated at</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data['users'] as $i => $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->roles->first()->name}}</td>
                                <td>{{$user->updated_at}}</td>
                                <td>
                                    <div class="float-right">
                                        <button class="btn btn-success" data-toggle="modal" data-target="#whatsapp{{$i}}"><i class="fab fa-whatsapp-square"></i></button>
                                        <button class="btn btn-primary" data-toggle="modal" data-target="#private-email{{$i}}"><i class="fas fa-comments"></i></button>
                                        <button class="btn btn-info" data-toggle="modal" data-target="#private-email{{$i}}"><i class="fas fa-envelope-square"></i></button>
                                        <button class="btn btn-warning" data-toggle="modal" data-target="#userUpdateModal{{$i}}"><i class="fas fa-pen-square"></i></button>
                                        <form class="d-inline" action="{{route('user.destroy', $user->id)}}" method="POST">
                                            @csrf 
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" data-toggle="confirmation"><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>

                            {{-- User Functionality --}}
                            <x-dashboard.user.update :user="$user" :i="$i" />
                            <x-tools.mail :user="$user" :i="$i" />

                        @endforeach
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>

    <!-- Users Bar Chart with Chart.js -->
    <div class="col-lg-6 mb-4">
        <!-- Project Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Users by Role amount</h6>
            </div>
            <div class="card-body">
            <canvas id="lineChart" width="400" height="300"></canvas>
            </div>
        </div>
    </div>

    <div class="col-lg-6 mb-4">
        <!-- Illustrations -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">How To</h6>
            </div>
            <div class="card-body">
                <p class="text-justify">
                Welcome to the user control panel where you as the admin are able to control many aspects of the user functionality. At very top of the page you will see four separate columns explaining how many users you have in each role. This is great for getting a quick overview of your user base.</p> 
                <p class="text-justify">Next is the main table displaying all the users. Here you are able to view the users in chronological order and for each user you are able to update or delete. Clicking the update button opens up a new windows which allows you to change the user names as well as other user details. The delete button will open a small panel asking you if you want to continue deleting the user, clicking yes will proceed with this command.</p>
            </div>
        </div>
    </div>
</div>

@endsection