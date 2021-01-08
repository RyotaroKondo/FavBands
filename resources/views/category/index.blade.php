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
            <div class="card">
                <div class="card-header">All Category</div>
                    <span class="float-right">
                            <a href="{{route('category.create')}}">
                                <button class="btn btn-outline-secondary">カテゴリーを追加する</button>
                            </a>
                        </span>
                <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">カテゴリー名</th>
                        <th scope="col">編集</th>
                        <th scope="col">削除</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($categories)>0)
                        @foreach($categories as $key=>$category)
                        <tr>
                        <th scope="row">{{$key+1}}</th>
                        <td>{{$category->name}}</td>
                        <td>
                            <a href="{{route('category.edit', [$category->id])}}">
                                <button class="btn btn-outline-success">Edit</button>
                            </a>
                        </td>
                        <td>
                         
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$category->id}}">
                                削除
                                </button>
                               
                       
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <form action="{{route('category.destroy', [$category->id])}}" 
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
                                    本当に削除しますか?
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
                        <td>カテゴリーが一つもありません。</td>
                       @endif

                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
