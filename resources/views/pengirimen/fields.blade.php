<!-- Id Tujuan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_tujuan', 'Id Tujuan:') !!}
    {!! Form::text('id_tujuan', null, ['class' => 'form-control']) !!}
</div>

<!-- Id Kurir Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_kurir', 'Id Kurir:') !!}
    {!! Form::text('id_kurir', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::text('status', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('pengirimen.index') !!}" class="btn btn-default">Cancel</a>
</div>
