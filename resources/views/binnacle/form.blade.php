<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
    <label for="ticket_id">{{ __('Ticket Id') }}</label>
    <select name="ticket_id" id="ticket_id"
        class="form-control{{ $errors->has('ticket_id') ? ' is-invalid' : '' }}">
        <option value="">{{ __('Ticket Id') }}</option>
        @foreach ($tickets as $id => $ticket)
            <option value="{{ $id }}" {{ old('ticket_id', $binnacle->ticket_id) == $id ? 'selected' : '' }}>
                {{ $ticket }}
            </option>
        @endforeach
    </select>
    @if ($errors->has('ticket_id'))
        <div class="invalid-feedback">{{ $errors->first('ticket_id') }}</div>
    @endif
</div>

<div class="form-group">
    <label for="operator_id">{{ __('Operator Id') }}</label>
    <select name="operator_id" id="operator_id"
        class="form-control{{ $errors->has('operator_id') ? ' is-invalid' : '' }}">
        <option value="">{{ __('Operator Id') }}</option>
        @foreach ($operators as $id => $operator)
            <option value="{{ $id }}" {{ old('operator_id', $binnacle->operator_id) == $id ? 'selected' : '' }}>
                {{ $operator }}
            </option>
        @endforeach
    </select>
    @if ($errors->has('operator_id'))
        <div class="invalid-feedback">{{ $errors->first('operator_id') }}</div>
    @endif
</div>

<div class="form-group">
    <label for="note">{{ __('Note') }}</label>
    <input type="text" name="note" id="note"
        value="{{ old('note', $binnacle->note) }}"
        class="form-control{{ $errors->has('note') ? ' is-invalid' : '' }}"
        placeholder="Note">
    @if ($errors->has('note'))
        <div class="invalid-feedback">{{ $errors->first('note') }}</div>
    @endif
</div>
     </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>