@extends('includes.master')
@section('content')
<div class="card p-5 ">
    <div class="row">
        <br><br>
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <br><br>
                <h2>Add New Candidate</h2>
            </div>
        </div>
    </div>   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <br><br>
            <div class="float-right">
                <a class="btn btn-info" href="{{ route('ballot.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <form action="{{ route('ballot.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
      
         <div class="row mx-auto d-flex" style="width: 50rem;">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Student ID:</strong>
                    <input type="text" name="enrol" class="form-control" placeholder="ID">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    <textarea class="form-control border" style="height:150px" name="detail" placeholder="Detail"></textarea>
                </div>
            </div>
            <div class="col-xs12 col-sm-12 col-md-12">
                <div class="input-group">
                    <div class="custom-file">
                        <strong>Post Image: </strong>
                    <input id="file" type="file" name="image" pattern="image/png,image/jpg,image/jpeg,image/gif,image/svg">
                    </div>
                </div>
            </div>
            <br><br>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Select Post of Candidate</strong>
                        <select id="Select" name="position_id" class="form-select form-control">
                            <option vlaue="">-</option>
                            @foreach ($positions as $position)
                                
                            <option value="{{ $position->id }}">{{ $position->candidate_post }}</option>
                            @endforeach
                        </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary btn-lg">Submit</button>
            </div>
        </div>
       
    </form>
</div>

@endsection