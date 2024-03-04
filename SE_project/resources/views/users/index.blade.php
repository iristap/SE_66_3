@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card">
      <div class="row">
          <div class="col-lg-12 margin-tb">
              <div class="pull-left ">
                  <h2>Users Management</h2>
              </div>
              
              <div class="pull-right ">
                  <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
              </div>
          </div>
      </div>
    </div>
  </div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif
<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card">
      <table class="table table-bordered">
        <tr>
          <th>No</th>
          <th>Name</th>
          <th>Email</th>
          <th>Roles</th>
          <th width="280px">Action</th>
        </tr>
        @foreach ($data as $key => $user)
          <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $user->name }} {{ $user->surname}}</td>
            <td>{{ $user->email }}</td>
            <td>
              @foreach($user->roles as $role)
                        <span class="badge badge-secondary">{{ $role->name }}</span>
                    @endforeach
          
            </td>
            <td>
              <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
              <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
              <form method="POST" action="{{ route('users.destroy', $user->id) }}" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            </td>
          </tr>
        @endforeach
      </table>
    </div>
  </div>
</div>
{!! $data->render() !!}


@endsection
