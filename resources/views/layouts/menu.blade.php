<li class="{{ Request::is('tujuans*') ? 'active' : '' }}">
    <a href="{!! route('tujuans.index') !!}"><i class="fa fa-edit"></i><span>Tujuans</span></a>
</li>

<li class="{{ Request::is('kurirs*') ? 'active' : '' }}">
    <a href="{!! route('kurirs.index') !!}"><i class="fa fa-edit"></i><span>Kurirs</span></a>
</li>

<li class="{{ Request::is('pengirimen*') ? 'active' : '' }}">
    <a href="{!! route('pengirimen.index') !!}"><i class="fa fa-edit"></i><span>Pengirimen</span></a>
</li>

