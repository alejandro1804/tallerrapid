<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('ticket_id') }}
            {{ Form::select('ticket_id', $tickets , $binnacle->ticket_id, 
                 ['class' => 'form-control' . ($errors->has('ticket_id') ? ' is-invalid' : ''), 
                 'placeholder' => 'ticket Id']) }}
            {!! $errors->first('ticket_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('operator_id') }}
            {{ Form::select('operator_id', $operators , $binnacle->operator_id,
                 ['class' => 'form-control' . ($errors->has('operator_id') ? ' is-invalid' : ''),
                  'placeholder' => 'Operator Id']) }}
            {!! $errors->first('operator_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('note') }}
            {{ Form::text('note', $binnacle->note, ['class' => 'form-control' . ($errors->has('note') ? ' is-invalid' : ''), 'placeholder' => 'Note']) }}
            {!! $errors->first('note', '<div class="invalid-feedback">:message</div>') !!}
        </div>
     </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>