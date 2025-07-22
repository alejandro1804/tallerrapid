@extends('layouts.app')

@section('content')

<main class="py-4">
  <div class="container">
    <h2 class="mb-4 text-center text-uppercase fw-semibold text-dark">Menú Principal</h2>
    <div class="row row-cols-1 row-cols-md-3 g-4">

      <x-nav-card route="tickets.index" label="Tickets" />
      <x-nav-card route="items.index" label="Máquinas - Equipos" />
      <x-nav-card route="parts.index" label="Partes" />
      <x-nav-card route="operators.index" label="Personal" />
      <x-nav-card route="providers.index" label="Proveedores" />
      <x-nav-card route="sectors.index" label="Sectores" />
      <x-nav-card route="states.index" label="Estados Ticket" />
      <x-nav-card route="positions.index" label="Oficios" />

    </div>
  </div>
</main>
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

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
