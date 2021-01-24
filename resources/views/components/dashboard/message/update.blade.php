<div>
    {{-- Message update form --}}
    <form action="{{route('message.update', $message)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="modal fade" id="messageUpdateModal{{$i}}" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="">Update Message</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">To</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="head" value="{{$message->head}}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">From</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="head" value="{{$message->head}}" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Head</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="head" value="{{$message->head}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Body</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="12" name="body">{{$message->body}}</textarea>
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