@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @if(Session::has('message'))
                <div class="alert alert-success">
                {{Session::get('message')}}
                </div> 
        @endif
            <form action="{{route('band.store')}}" method="post" enctype="multipart/form-data">@csrf
            <div class="card">
                <div class="card-header">バンドを追加する</div>

                <div class="card-body">
                    <div class="form-group">
                        <label for="name">バンド名</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">内容</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description"></textarea>
                        @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="url">URL</label>
                        <input type="text" name="url" class="form-control @error('url') is-invalid @enderror">
                        @error('url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="category">カテゴリー</label>
                        <select name="category" class="form-control @error('category') is-invalid @enderror">
                            <option>カテゴリーを選択してください</option>
                            @foreach(App\Models\Category::all() as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @error('category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="image">画像</label>
                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                        @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button class="btn btn-outline-primary" type="submit">送信</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
