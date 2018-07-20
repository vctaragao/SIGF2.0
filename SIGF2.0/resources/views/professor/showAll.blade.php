@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  Professores
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    

                    @foreach($professors as $professor)

                   <div class="row pb-3 mb-3 border-bottom">
                     <div class="col-6 float-left">
                       <a class="" href={{ url('/professor/'.$professor->id) }}>{{ $professor->name }}</a>
                     </div>

                     @if(!empty($flag) && $flag == 'remove')
                        <div class="col-6 float-right">
                            <a href="{{ url('/removeProfessor/'.$professor->id) }}" class="float-right btn btn-danger">Remover</a>
                        </div>
                     @endif
                   </div>

                    @endforeach
                    
                  
                     
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
