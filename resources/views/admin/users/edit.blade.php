@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <form action="{{route('admin.users.update', $user->id)}}" method="post">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="name">Nome</label>
                    <input class="form-control" type="text" name="name" value="{{old('name') ?? $user->name}}">
                    @error ('name')
                        <span class="alert alert-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" type="email" name="email" value="{{old('email') ?? $user->email}}">
                    @error ('email')
                        <span class="alert alert-danger">{{$message}}</span>
                    @enderror
                </div>
                <input class="btn btn-primary" type="submit" value="Salva">

            </form>
        </div>
    </div>
</div>
@endsection
