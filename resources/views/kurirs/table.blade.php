<table class="table table-responsive" id="kurirs-table">
    <thead>
        <th>Nama</th>
        <th>No Hp</th>
        <th>Email</th>
        <th>Password</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($kurirs as $kurir)
        <tr>
            <td>{!! $kurir->nama !!}</td>
            <td>{!! $kurir->no_hp !!}</td>
            <td>{!! $kurir->email !!}</td>
            <td>{!! $kurir->password !!}</td>
            <td>
                {!! Form::open(['route' => ['kurirs.destroy', $kurir->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('kurirs.show', [$kurir->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('kurirs.edit', [$kurir->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>