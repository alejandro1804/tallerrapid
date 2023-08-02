<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('state') }}
            {{ Form::select('state_id',$states, $ticket->state_id, ['class' => 'form-control' . ($errors->has('state_id') ? ' is-invalid' : ''), 'placeholder' => 'State']) }}
            {!! $errors->first('state_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::hidden('admission', $ticket->admission, ['class' => 'form-control' ,'placeholder' => 'Admission']) }}
          
        </div>
        <div class="form-group">
            {{ Form::label('item_id') }}
            {{ Form::select('item_id',$items, $ticket->item_id, ['class' => 'form-control' . ($errors->has('item_id') ? ' is-invalid' : ''), 'placeholder' => 'Item Id']) }}
            {!! $errors->first('item_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('defecto') }}
            {{ Form::text('flaw', $ticket->flaw, ['class' => 'form-control' . ($errors->has('flaw') ? ' is-invalid' : ''), 'placeholder' => 'Flaw']) }}
            {!! $errors->first('flaw', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('priority') }}
            {{ Form::text('priority', $ticket->priority, ['class' => 'form-control' . ($errors->has('priority') ? ' is-invalid' : ''), 'placeholder' => 'Priority']) }}
            {!! $errors->first('priority', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>