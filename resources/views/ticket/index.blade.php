@extends('layouts.app')

@section('template_title')
    Ticket
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __(' <Tickets>  '). $cantidad . '   '. $finalizado}}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('tickets.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        <th>Ticket</th>
                                        <th>State</th>
										<th>Admission</th>
										<th>Item </th>
										<th>Flaw</th>
										<th>Priority</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if($items->isEmpty())
                                  <p> NO HAY REGISTROS </P>  

                                @else    

                                    @foreach ($tickets as $ticket)
                                        @php
                                             ++$i;  
                                        @endphp
                                    
                                        <tr>
                                            <td>{{ $ticket->id }}</td>
											<td>{{ $ticket->state->name }}</td>
											<td>{{ $ticket->admission }}</td>
											<td>{{ $ticket->item->name }}</td>
											<td>{{ $ticket->flaw }}</td>
											<td>{{ $ticket->priority }}</td>

                                            <td>
                                                <form action="{{ route('tickets.destroy',$ticket->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('tickets.show',$ticket->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Ver') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('tickets.edit',$ticket->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    <!-- a class="btn btn-sm btn-success" href="{{ route('binnacles.index',$ticket->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Bitacora') }}</a> -->

                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $tickets->links() !!}
            </div>
        </div>
    </div>
@endsection
