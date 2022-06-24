@extends('layouts.app')
@section('title','Imágenes de productos')
@section('body-class', 'product-page')



@section('content')
<div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">
</div>

<div class="main main-raised">
    <div class="container">

        <div class="section text-center">
            <h2 class="title">Imágenes de Producto "{{ $product->name }}"</h2>
    
                <form method="post" action="" enctype="multipart/form-data"> 
                    {{ csrf_field() }}
                    <input class="btn btn-primary mb-2" type="file" name="photo"  require>
                    <button type="submit"  class="btn btn-primary btn-round"> 
                        Subir nueva imagen
                    </button>
                    <a href="{{ url('/admin/products') }}" class="btn btn-default btn-round"> 
                        Volver al listado de productos
                    </a>
                </form>
       <HR> 
            <div class="row">

                @foreach ($images as $image)
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <img src="{{ $image->url }}" width="250"><br>
                            <form method="post" action="">
                                {{ csrf_field() }}
                                 {{ method_field('DELETE') }}  
                                 <input type="hidden" name="image_id" value="{{ $image->id }}"> 
                                <button type="submit"  class="btn btn-danger btn-round"> 
                                    Eliminar imagen
                                </button>
                                @if ($image->featured)
                                <button  type="button"
                                     class="btn btn-success btn-fab btn-fab-mini btn-round" rel="tooltip" title="Imagen destacada actualmente">
	                                <i class="material-icons">check</i>
                                </button>
                                @else
                                <a href="{{ url('/admin/products/'.$product->id.'/images/select/'.$image->id) }}"
                                     class="btn btn-primary btn-fab btn-fab-mini btn-round">
	                                <i class="material-icons">favorite</i>
                                </a>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            </div>
    </div>
</div>

@include('includes.footer')

@endsection


<!-- 

<form class="form-horizontal">
 

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email" class="col-md-4 control-label">E-Mail Address</label>

        <div class="col-md-6">
           
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label for="password" class="col-md-4 control-label">Password</label>

        <div class="col-md-6">

            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                </label>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-8 col-md-offset-4">
            <button type="submit" class="btn btn-primary">
                Login
            </button>

            
        </div>
    </div>
</form>
    
            -->