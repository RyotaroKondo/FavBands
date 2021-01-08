@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-14">
        @if(Session::has('message'))
                <div class="alert alert-success">
                {{Session::get('message')}}
                </div> 
        @endif
            <div class="card">
                <div class="card-header">バンド全一覧</div>
                    <!-- <span class="float-right">
                        <a href="{{route('band.create')}}">
                            <button class="btn btn-outline-secondary">バンドを追加する</button>
                        </a>
                    </span> -->
                <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">画像</th>
                        <th scope="col">バンド名</th>
                        <th scope="col">内容</th>
                        <th scope="col">URL</th>
                        <th scope="col">カテゴリー</th>
                        <th scope="col">編集</th>
                        <th scope="col">削除</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($bands)>0)
                        @foreach($bands as $key=>$band)
                        <tr>
                        <td><img src="{{asset('band_images')}}/{{$band->image}}" width="100"></td>
                        <td>{{$band->name}}</td>
                        <td>{{$band->description}}</td>
                        <td>{{$band->url}}</td>
                        <td>{{$band->category->name}}</td>
                        <td>
                            <a href="{{route('band.edit', [$band->id])}}">
                                <button class="btn btn-outline-success">編集</button>
                            </a>
                        </td>
                        <td>
                         
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$band->id}}">
                                削除
                                </button>
                               
                       
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{$band->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <form action="{{route('band.destroy', [$band->id])}}" 
                                method="post">
                                @csrf
                                {{method_field('DELETE')}}
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">削除確認</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    本当に削除してよろしいですか?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">戻る</button>
                                    <button type="submit" class="btn btn-outline-danger">削除</button>
                                </div>
                                </div>
                            </form>
                            </div>
                            </div>

                        </td>
                    </tr>
                        @endforeach

                        @else
                        <td>バンドが一つもありません。</td>
                       @endif

                    </tbody>
                    </table>
                        {{$bands->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
