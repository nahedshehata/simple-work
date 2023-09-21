@extends('layout')
@section('content')
    <div id="wrapper">
        <div id="page" class="container">
            <div id="content">
                <div class="title">
                    <h2>{{$article->title}}</h2>
                    <span class="byline">Mauris vulputate dolor sit amet nibh</span> </div>
                <p>
                    <img src="/images/banner.jpg"
                         alt=""
                         class="image image-full" />
                </p>
                {!!$article->body!!}
                <P>
                    @foreach($article->tags as $tag)
                        <a href="/articles?tag={{$tag->name}}">{{$tag->name}}</a>
                    @endforeach
                </P>
            </div>
        </div>
    </div>
@endsection
