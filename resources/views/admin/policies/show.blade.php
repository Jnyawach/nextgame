@extends('layouts.admin')
@section('title' ,$policy->category)
@section('content')

    <div class="container">
        <section>
            <h4> @if($policy->category=='Policy')
                    Privacy Policy
                @else
                    Terms and Condition
                @endif</h4>

                <div class="d-inline-flex">
                    <a class="btn-sm btn-primary hire m-1 text-decoration-none"
                       href="{{route('policies.edit', $policy->id) }}">
                       Edit <i class="fas fa-external-link-alt ms-2"></i></a>

                    <form action="{{route('policies.destroy', $policy->id)}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn-sm btn-primary m-1">Delete <i class="far fa-trash-alt"></i>
                        </button>

                    </form>

                </div>


            <p>{!! $policy->text!!}</p>

        </section>
    </div>

@endsection
