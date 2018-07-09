<table class="table table-responsive" id="pengirimen-table">
    <thead>
        <th>Id Tujuan</th>
        <th>Id Kurir</th>
        <th>Status</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($pengirimen as $pengiriman)
        <tr>
            <td>{!! $pengiriman->id_tujuan !!}</td>
            <td>{!! $pengiriman->id_kurir !!}</td>
            <td>{!! $pengiriman->status !!}</td>
            <td>
                {!! Form::open(['route' => ['pengirimen.destroy', $pengiriman->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('pengirimen.show', [$pengiriman->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('pengirimen.edit', [$pengiriman->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>