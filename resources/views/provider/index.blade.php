@extends('layouts.app')

@section('template_title')
    Provider
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Proveedores') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('providers.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <form method="get">
                                <div class="float-right">
                                    <input type="text" name="search" value="{{ request()->get('search')}}" class="form-control"
                                            plaaceholder="Search ...." aria-label="Search" aria-describedby="button-addon2">
                                    <button class="btn btn-success" type="submit" id="button-addon2">Search</button>       

                                <div>
                            </form>
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                      	<th>Name</th>
										<th>Phone</th>
										<th>Adress</th>
										<th>Location</th>
										<th>Country</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($providers as $provider)  
                                            @php
                                                 ++$i;  
                                            @endphp
                                        <tr>
                                           	<td>{{ $provider->name }}</td>
											<td>{{ $provider->phone }}</td>
											<td>{{ $provider->adress }}</td>
											<td>{{ $provider->location }}</td>
											<td>{{ $provider->country }}</td>

                                            <td>
                                                <form action="{{ route('providers.destroy',$provider->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('providers.show',$provider->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('providers.edit',$provider->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $providers->links() !!}
            </div>
        </div>
    </div>
@endsection
