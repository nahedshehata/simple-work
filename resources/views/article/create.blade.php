@extends('layout')
@section('head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css" />

@endsection
@section('content')
    <div id="wrapper">
     <div id="page" class="container">
        <h1>New Article</h1>
     <form method="POST" action="/articles" >
         @csrf
        <div class="field">
          <div class="form-group">
            <label for="exampleInputEmail1">Title</label>
          </div>

            <div class="control">
                <input type="text"  value="{{old('title')}}" name="title" class="input {{$errors->has('title')? 'is-danger':''}}" >
                <p class="help is-danger" >{{$errors->first('title')}}</p>
            </div>
        </div>

        <div class="field">

                <label class="label" for="excerpt">Excerpt</label>

            <div class="control">
                <textarea class="textarea  {{$errors->has('excerpt')? 'is-danger':''}}" name="excerpt" id="excerpt"></textarea>
                <p class="help is-danger" >{{$errors->first('excerpt')}}</p>

            </div>
        </div>



         <div class="field">

             <label class="label" for="body">Body</label>

             <div class="control">
                 <textarea class="textarea" name="body" id="body"></textarea>
             </div>
         </div>


         <div class="field">

             <label class="label" for="tag">Tags</label>

             <div class="control">
                 <select   name="tags[]" >
                     @foreach($tags as $tag)
                     <option value="{{$tag->id}}" >{{$tag->name}}</option>
                     @endforeach

                 </select>
                 @error('tags')
                 <p class="help is-danger" >{{$message}}</p>
                 @enderror
             </div>
         </div>



        <div class="field is-grouped">
            <div class="control">
                <button   class="button is-link" type="submit">Submit</button>
            </div>
        </div>

      </form>
     </div>
    </div>
@endsection
