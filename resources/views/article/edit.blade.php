@extends('layout')
@section('head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css" />

@endsection
@section('content')
    <div id="wrapper">
        <div id="page" class="container">
            <h1>New Article</h1>
            <form method="POST" action="/articles/{{$article->id}}" >
                @csrf
                @method('PUT')
                <div class="field">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Title</label>
                    </div>

                    <div class="control">
                        <input type="text"  name="title" class="input" value="{{$article->title}}" >
                    </div>
                </div>

                <div class="field">

                    <label class="label" for="excerpt">Excerpt</label>

                    <div class="control">
                        <textarea class="textarea" name="excerpt" id="excerpt">{{$article->excerpt}}</textarea>
                    </div>
                </div>
                <div class="field">

                    <label class="label" for="body">Body</label>

                    <div class="control">
                        <textarea class="textarea" name="body" id="body">{{$article->body}}</textarea>
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
