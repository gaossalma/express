<table class="table table-responsive" id="tujuans-table">
    <thead>
        <th>Nama Pengirim</th>
        <th>Alamat Pengirim</th>
        <th>No Hp Pengirim</th>
        <th>Barang</th>
        <th>Berat</th>
        <th>Nama Penerima</th>
        <th>Alamat Penerima</th>
        <th>No Hp Penerima</th>
        <th>Longitude</th>
        <th>Latitude</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($tujuans as $tujuan)
        <tr>
            <td>{!! $tujuan->nama_pengirim !!}</td>
            <td>{!! $tujuan->alamat_pengirim !!}</td>
            <td>{!! $tujuan->no_hp_pengirim !!}</td>
            <td>{!! $tujuan->barang !!}</td>
            <td>{!! $tujuan->berat !!}</td>
            <td>{!! $tujuan->nama_penerima !!}</td>
            <td>{!! $tujuan->alamat_penerima !!}</td>
            <td>{!! $tujuan->no_hp_penerima !!}</td>
            <td>{!! $tujuan->longitude !!}</td>
            <td>{!! $tujuan->latitude !!}</td>
            <td>
                {!! Form::open(['route' => ['tujuans.destroy', $tujuan->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('tujuans.show', [$tujuan->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('tujuans.edit', [$tujuan->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>