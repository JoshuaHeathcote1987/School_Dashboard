<div>
    {{-- Email form --}}
    <form action="{{route('private-email', $user->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal fade" id="private-email{{$i}}" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id=""><strong><i class="fas fa-envelope-square fa-1x"></i></strong> {{$user->name}}</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for=""><strong>To</strong></label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="address" value="{{$user->email}}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for=""><strong>Subject</strong></label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="subject" required>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="body"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>                                            
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">
                            Send
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>