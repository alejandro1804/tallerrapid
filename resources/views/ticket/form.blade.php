<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
    <label for="state_id">{{ __('State') }}</label>
    <select name="state_id" id="state_id" class="form-control{{ $errors->has('state_id') ? ' is-invalid' : '' }}">
        <option value="">{{ __('') }}</option>
        @foreach ($states as $id => $state)
            <option value="{{ $id }}" {{ old('state_id', $ticket->state_id) == $id ? 'selected' : '' }}>
                {{ $state }}
            </option>
        @endforeach
    </select>
    @if ($errors->has('state_id'))
        <div class="invalid-feedback">
            {{ $errors->first('state_id') }}
        </div>
    @endif
</div>

<input type="hidden" name="admission" value="{{ $ticket->admission }}">

<div class="form-group">
    <label for="item_id">{{ __('Item') }}</label>
    <select name="item_id" id="item_id" class="form-control{{ $errors->has('item_id') ? ' is-invalid' : '' }}">
        <option value="">{{ __('') }}</option>
        @foreach ($items as $id => $item)
            <option value="{{ $id }}" {{ old('item_id', $ticket->item_id) == $id ? 'selected' : '' }}>
                {{ $item }}
            </option>
        @endforeach
    </select>
    @if ($errors->has('item_id'))
        <div class="invalid-feedback">
            {{ $errors->first('item_id') }}
        </div>
    @endif
</div>

<div class="form-group">
    <label for="flaw">{{ __('Defecto') }}</label>
    <input type="text" name="flaw" id="flaw" value="{{ old('flaw', $ticket->flaw) }}"
        class="form-control{{ $errors->has('flaw') ? ' is-invalid' : '' }}" placeholder="Flaw">
    @if ($errors->has('flaw'))
        <div class="invalid-feedback">
            {{ $errors->first('flaw') }}
        </div>
    @endif
</div>

<div class="form-group">
    <label for="priority">{{ __('Priority') }}</label>
    <input type="text" name="priority" id="priority" value="{{ old('priority', $ticket->priority) }}"
        class="form-control{{ $errors->has('priority') ? ' is-invalid' : '' }}" placeholder="Priority">
    @if ($errors->has('priority'))
        <div class="invalid-feedback">
            {{ $errors->first('priority') }}
        </div>
    @endif
</div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>