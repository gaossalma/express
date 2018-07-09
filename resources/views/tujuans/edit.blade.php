@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Tujuan
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($tujuan, ['route' => ['tujuans.update', $tujuan->id], 'method' => 'patch']) !!}

                        @include('tujuans.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection