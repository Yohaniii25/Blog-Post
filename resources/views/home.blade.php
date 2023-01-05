@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form>
                        <div class="mb-3">
                            <label>Post Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Enter post title">

                        </div>
                        <div class="mb-3">
                            <label>Post Description</label>
                            <textarea class="form-control" placeholder="Enter post description" rows="5" name="description"></textarea>

                        </div>


                        <button type="submit" class="btn btn-primary">Post</button>
                    </form><br>

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection