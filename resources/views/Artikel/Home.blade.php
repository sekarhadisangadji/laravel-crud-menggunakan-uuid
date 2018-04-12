@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Tulis artikel baru</div>

                <div class="panel-body">
                    <form action="{{route('artikel-insert')}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <input type="text" class="form-control" name="title" placeholder="judul artikel">
                        </div>
                        <div class="form-group">
                            <textarea name="content" class="form-control" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">tambah artikel</button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
    {{--  artikel  --}}
    <div class="row">
            @if(count($dataArtikel) != 0 )
            @foreach($dataArtikel as $tampilArtikel)
            <div class="col-sm-3 col-md-3">
                    <div class="thumbnail">
                      <div class="caption">
                        <h3>{{$tampilArtikel->title}}</h3>
                        <p>{{$tampilArtikel->content}}</p>
                        <p>
                            <a href="#" class="btn btn-xs btn-primary" role="button">Edit</a>
                            <a href="{{route("delete-artikel",["id_artikel" => $tampilArtikel->id, "id_user" => $tampilArtikel->id_user])}}" class="btn btn-xs btn-danger" role="button">Hapus</a>
                        </p>
                      </div>
                    </div>
                  </div>
            @endforeach
            @endif
          </div>
    {{--  end artikel  --}}
</div>
@endsection