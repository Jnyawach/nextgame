@extends('layouts.admin')
@section('title','Edit Policy')
@section('content')


    <div class="container p-5">

        <h5>Create Policy and terms</h5>
        <hr class="dropdown-divider">
        <form method="POST" action="{{route('policies.update', $policy->id)}}">
            @method('PATCH')
            @csrf
            <div class="form-group row">
                <div class="col-sm-11 col-md-6 ">
                    <label for="category" class="control-label">Category:</label>
                    <select class="form-select" aria-label="category" id="category" name="category" required>
                        <option selected value="{{$policy->category}}">{{$policy->category}}</option>
                        <option value="Privacy">Privacy Policy</option>
                        <option value="Terms">Terms & Conditions</option>
                        <option value="Advertising">Advertising Policy</option>
                    </select>
                    <small class="text-danger">
                        @error('category')
                        {{ $message }}
                        @enderror
                    </small>
                </div>

                <div class="col-sm-11 col-md-6 ">
                    <label for="status" class="control-label">Status:</label>
                    <select class="form-select" aria-label="status" id="status" name="status" required>
                        <option value="1" selected>Active</option>
                        <option value="0">Inactive</option>

                    </select>
                    <small class="text-danger">
                        @error('status')
                        {{ $message }}
                        @enderror
                    </small>
                </div>

            </div>
            <div class="form-group row">
                <div class="col-12">
                    <label for="policy" class="control-label">Policy Document:</label><br>
                    <textarea id="policy" name="text" class="form-control policy" >
                                    {{$policy->text}}
                                </textarea>

                    <small class="text-danger">
                        @error('text')
                        {{ $message }}
                        @enderror
                    </small>
                </div>
            </div>
            <div class="form-group mt-3">
                <button type="submit" class="btn btn-primary">SUBMIT</button>
            </div>
        </form>



    </div>

@endsection
@section('scripts')
    <script src="{{asset('ckeditor5/ckeditor.js')}}"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#policy' ) ),{
        }
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection
