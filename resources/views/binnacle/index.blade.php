@extends('layouts.app')

@section('template_title')
    Binnacle
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Binnacle') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('binnacles.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                    	<th>Ticket </th>
                                        <th>Maquina o Equipo </th>
										<th>Operator</th>
                                        <th>Fecha y hora </th>
									</tr>
                                </thead>
                                <tbody>
                                    @foreach ($binnacles as $binnacle) 
                                            @php
                                                 ++$i;  
                                            @endphp
                                        <tr>
                                    		<td>{{ $binnacle->ticket_id }}</td>
                                            <td>{{ $binnacle->ticket->item->name }}</td>
											<td>{{ $binnacle->operator->name }}</td>
                                            <td>{{ $binnacle->created_at }}</td>
										     <td>
                                                <form action="{{ route('binnacles.destroy',$binnacle->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('binnacles.show',$binnacle->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Ver') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('binnacles.edit',$binnacle->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $binnacles->links() !!}
            </div>
        </div>
    </div>
@endsection
