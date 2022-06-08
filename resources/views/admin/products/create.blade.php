@extends('layouts.app')
@section('title','Bienvenido a App Shop')
@section('body-class', 'product-page')



@section('content')
<div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">

</div>

<div class="main main-raised">
    <div class="container">
        <div class="section  ">
          
                    <h2 class="title text-center">Registrar nuevo producto</h2>
                       @if($errors->any())
                       <div class="alert alert-danger">
                        <ul>
                           @foreach ($errors->all() as $error )
                           <li>{{ $error }} </li> 
                           @endforeach
                        </ul>
                       </div> 
                      @endif

                    <form method="post" action="{{ url('/admin/products') }}">
                        {{ csrf_field() }}
                        <div class="col-sm-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Nombre del producto</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                        <div class="form-group label-floating">
                                <label class="control-label">Precio del producto</label>
                                <input type="number" name="price" class="form-control" value="{{ old('price') }}">
                            </div>   
                           
                        </div>
                    </div>
                        <div class="form-group label-floating">
                            <label class="control-label">Descripción corta</label>
                                <input type="text" name="description" class="form-control" value="{{ old('description') }}">
                            </div>
                  
                        <textarea class="form-control" placeholder="Descripción extensa del producto." rows="5" name="long_description">
                         {{ old('long_description') }}
                        </textarea>
				
                        
                        <button class="btn btn-primary" >Registrar producto</button>
                        <a href="{{ url('/admin/products') }}" class="btn btn-secondary" >Cancelar</a>
                    </form>

                </div>
            </div>

          
        </div>


<footer class="footer">
    <div class="container">
        <nav class="pull-left">
            <ul>
                <li>
                    <a href="http://www.creative-tim.com">
                        Creative Tim
                    </a>
                </li>
                <li>
                    <a href="http://presentation.creative-tim.com">
                        About Us
                    </a>
                </li>
                <li>
                    <a href="http://blog.creative-tim.com">
                        Blog
                    </a>
                </li>
                <li>
                    <a href="http://www.creative-tim.com/license">
                        Licenses
                    </a>
                </li>
            </ul>
        </nav>
        <div class="copyright pull-right">
            &copy; 2016, made with <i class="fa fa-heart heart"></i> by Creative Tim
        </div>
    </div>
</footer>

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