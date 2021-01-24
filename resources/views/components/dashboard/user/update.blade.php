<div>
    {{-- Update user form --}}
    <form action="{{route('user.update', $user->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="modal fade" id="userUpdateModal{{$i}}" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="">Update</h5>
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
                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" value="{{$user->name}}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="{{$user->email}}" required>
                                    </div>

                                    
                                    <div class="form-group">
                                        <label for="">Address</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="" placeholder="Buckingham Palace, London, England" name="address" value="{{$user->detail->address}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Telephone No.</label>
                                        <input type="tel" class="form-control bfh-phone" data-format="+dd (ddd) ddd-dddd" placeholder="" name="telephone" value="{{$user->detail->telephone}}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <img src="{{ asset($user->image->url) }}" alt="" class="img-thumbnail" style="width: 100%; height: 15.1rem; max-width: 100%;">
                                    </div>
                                    <div class="form-group">
                                    <label for="">Role</label>
                                        <select class="form-control" id="sel1" name="role" required>
                                            <option value="admin" @if($user->roles->first()->name == 'admin') selected @endif>Admin</option>   
                                            <option value="teacher" @if($user->roles->first()->name == 'teacher') selected @endif>Teacher</option>
                                            <option value="parent" @if($user->roles->first()->name == 'parent') selected @endif>Parent</option>
                                            <option value="student" @if($user->roles->first()->name == 'student') selected @endif>Student</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group files">
                                        <label for="">Upload Image</label>
                                        <input type="file" class="form-control" name="image">
                                    </div>  
                                </div>
                            </div>
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
</div>