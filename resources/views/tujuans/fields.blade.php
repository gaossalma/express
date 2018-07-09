<!-- Nama Pengirim Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_pengirim', 'Nama Pengirim:') !!}
    {!! Form::text('nama_pengirim', null, ['class' => 'form-control']) !!}
</div>

<!-- Alamat Pengirim Field -->
<div class="form-group col-sm-6">
    {!! Form::label('alamat_pengirim', 'Alamat Pengirim:') !!}
    {!! Form::text('alamat_pengirim', null, ['class' => 'form-control']) !!}
</div>

<!-- No Hp Pengirim Field -->
<div class="form-group col-sm-6">
    {!! Form::label('no_hp_pengirim', 'No Hp Pengirim:') !!}
    {!! Form::text('no_hp_pengirim', null, ['class' => 'form-control']) !!}
</div>

<!-- Barang Field -->
<div class="form-group col-sm-6">
    {!! Form::label('barang', 'Barang:') !!}
    {!! Form::text('barang', null, ['class' => 'form-control']) !!}
</div>

<!-- Berat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('berat', 'Berat:') !!}
    {!! Form::text('berat', null, ['class' => 'form-control']) !!}
</div>

<!-- Nama Penerima Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_penerima', 'Nama Penerima:') !!}
    {!! Form::text('nama_penerima', null, ['class' => 'form-control']) !!}
</div>

<!-- Alamat Penerima Field -->
<div class="form-group col-sm-6">
    {!! Form::label('alamat_penerima', 'Alamat Penerima:') !!}
    {!! Form::text('alamat_penerima', null, ['class' => 'form-control']) !!}
</div>

<!-- No Hp Penerima Field -->
<div class="form-group col-sm-6">
    {!! Form::label('no_hp_penerima', 'No Hp Penerima:') !!}
    {!! Form::text('no_hp_penerima', null, ['class' => 'form-control']) !!}
</div>

<!-- Longitude Field -->
<div class="form-group col-sm-6">
    {!! Form::label('longitude', 'Longitude:') !!}
    {!! Form::text('longitude', null, ['class' => 'form-control']) !!}
</div>

<!-- Latitude Field -->
<div class="form-group col-sm-6">
    {!! Form::label('latitude', 'Latitude:') !!}
    {!! Form::text('latitude', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('tujuans.index') !!}" class="btn btn-default">Cancel</a>
</div>
