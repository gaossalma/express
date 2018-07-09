<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $pengiriman->id !!}</p>
</div>

<!-- Id Tujuan Field -->
<div class="form-group">
    {!! Form::label('id_tujuan', 'Id Tujuan:') !!}
    <p>{!! $pengiriman->id_tujuan !!}</p>
</div>

<!-- Id Kurir Field -->
<div class="form-group">
    {!! Form::label('id_kurir', 'Id Kurir:') !!}
    <p>{!! $pengiriman->id_kurir !!}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{!! $pengiriman->status !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $pengiriman->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $pengiriman->updated_at !!}</p>
</div>

