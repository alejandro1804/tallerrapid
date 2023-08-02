<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name',$item->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('sector_id') }}
            {{ Form::select('sector_id',$sectors ,$item->sector_id, ['class' => 'form-control' . ($errors->has('sector_id') ? ' is-invalid' : ''), 'placeholder' => 'Sector Id']) }}
            {!! $errors->first('sector_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('characteristic') }}
            {{ Form::text('characteristic', $item->characteristic, ['class' => 'form-control' . ($errors->has('characteristic') ? ' is-invalid' : ''), 'placeholder' => 'Characteristic']) }}
            {!! $errors->first('characteristic', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('note') }}
            {{ Form::text('note', $item->note, ['class' => 'form-control' . ($errors->has('note') ? ' is-invalid' : ''), 'placeholder' => 'Note'] , '') }}
            {!! $errors->first('note', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('trademark') }}
            {{ Form::text('trademark', $item->trademark, ['class' => 'form-control' . ($errors->has('trademark') ? ' is-invalid' : '' ), 'placeholder' => 'Trademark' ]) }}
            {!! $errors->first('trademark', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('provider_id') }}
            {{ Form::select('provider_id',$providers ,$item->provider_id, ['class' => 'form-control' . ($errors->has('provider_id') ? ' is-invalid' : ''), 'placeholder' => 'Provider Id']) }}
            {!! $errors->first('provider_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>