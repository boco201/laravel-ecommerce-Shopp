@extends('site.app')
@section('title', 'Orders')
@section('content')
 <div class="container mt-4">
            <div class="row">
                <div class="col-sm-12">
                    @if (Session::has('message'))
                        <p class="alert alert-success">{{ Session::get('message') }}</p>
                    @endif
                </div>
            </div>

 <div class="container mt-4">
 	<h1>Contacter nous</h1>
 	<form method="post" action="{{ route('contact.create')}}">
 		@csrf
     
 		<div class="form-group">
 			<label for="name">Nom: </label>
 			<input type="text" name="name" class="form-control" placeholder="Ajouter Nom" value="{{old('name')}}">
 			<div>{{ $errors->first('name') }}</div>
 		</div>

 		<div class="form-group">
 			<label for="email">Email</label>
 			<input type="text" name="email" class="form-control" placeholder="Ajouter email" value="{{old('email')}}">
 			<div>{{ $errors->first('email') }}</div>
 		</div>

 		<div class="form-group">
 			<label for="message">Message</label>
 			<textarea name="message" class="form-control" placeholder="Ajouter un message" cols="13" rows="7">{{old('message')}}</textarea>
 			<div>{{ $errors->first('message') }}</div>
 		</div>

 		<div><button type="submit" class="btn btn-primary">Envoyer votre message</button>
 		</div>
 	</div>
 </div>
 	</form><br>
 		
@endsection