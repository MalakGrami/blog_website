@extends('user.master')

@section('title', 'blogs')

@section('content')

<section class="home">
  <div class="text" style="text-align: center">blogs</div>
 
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
              <h5 class="mb-0">Tous les blogs</h5>
              <a href="{{route('create_blog')}}" class="btn btn-success">Ajouter un blog</a>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Titre</th>
                    <th>Date de création</th>
                    <th>Description</th>
                    <th>image</th>
                    <th>Accepté</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($blogs as $blog)
                  <tr>
                    <td>{{$blog->id}}</td>
                    <td><a href="{{ route('blog.show', $blog->id) }}">{{$blog->title}}</a></td>
                    <td>{{$blog->created_at}}</td>
                    <td>{{ substr($blog->description, 0, 5) . '...' }}</td>
                    <td>
                      <img src="{{asset('storage/'.$blog->image)}}" style="height: 30px; ">
                    </td>
                    <td>{{$blog->accepted ? 'Accepté' : 'Non accepté'}}</td>
                    <td>
                      <div class="d-flex" style="gap: 5px">
                        @if ($blog->user_id == auth()->user()->id)
                        <a href="{{route('updateBlog',$blog->id)}}">
                          <button type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                              <path fill="currentColor" d="M5 22q-.825 0-1.413-.588T3 20V6q0-.825.588-1.413T5 4h1V2h2v2h8V2h2v2h1q.825 0 1.413.588T21 6v6h-2v-2H5v10h7v2H5Zm17.125-5L20 14.875l.725-.725q.275-.275.7-.275t.7.275l.725.725q.275.275.275.7t-.275.7l-.725.725ZM14 23v-2.125l5.3-5.3l2.125 2.125l-5.3 5.3H14Z"/>
                            </svg>
                          </button>
                        </a>
                        <form action="{{route('deleteBlog',$blog->id)}}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                              <path fill="currentColor" d="M7 21q-.825 0-1.413-.588T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.588 1.413T17 21H7Zm2-4h2V8H9v9Zm4 0h2V8h-2v9Z"/>
                            </svg>
                          </button>
                        </form>
                        @endif
                      </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="d-flex justify-content-center">
    <ul class="pagination">
        @if($blogs->onFirstPage())
            <li class="page-item disabled"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="m16.9 17.3l-4.6-4.6q-.15-.15-.213-.325T12.026 12q0-.2.063-.375t.212-.325l4.6-4.6q.275-.275.688-.287t.712.287q.275.275.275.7t-.275.7L14.425 12l3.875 3.9q.275.275.288.688t-.288.712q-.275.275-.7.275t-.7-.275Zm-6.6 0l-4.6-4.6q-.15-.15-.213-.325T5.425 12q0-.2.063-.375T5.7 11.3l4.6-4.6q.275-.275.688-.287t.712.287q.275.275.275.7t-.275.7L7.825 12l3.875 3.9q.275.275.288.688t-.288.712q-.275.275-.7.275t-.7-.275Z"/></svg>Previous</span></li>
        @else
            <li class="page-item"><a href="{{ $blogs->previousPageUrl() }}" class="page-link"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="m16.9 17.3l-4.6-4.6q-.15-.15-.213-.325T12.026 12q0-.2.063-.375t.212-.325l4.6-4.6q.275-.275.688-.287t.712.287q.275.275.275.7t-.275.7L14.425 12l3.875 3.9q.275.275.288.688t-.288.712q-.275.275-.7.275t-.7-.275Zm-6.6 0l-4.6-4.6q-.15-.15-.213-.325T5.425 12q0-.2.063-.375T5.7 11.3l4.6-4.6q.275-.275.688-.287t.712.287q.275.275.275.7t-.275.7L7.825 12l3.875 3.9q.275.275.288.688t-.288.712q-.275.275-.7.275t-.7-.275Z"/></svg>Previous</a></li>
        @endif

        @foreach($blogs as $blog)
            @if($blog->url)
                <li class="page-item"><a href="{{ $blog->url }}" class="page-link">{{ $blog->page }}</a></li>
            @else
                <li class="page-item active">{{ $blog->page }}</span></li>
            @endif
        @endforeach

        @if($blogs->hasMorePages())
            <li class="page-item"><a href="{{ $blogs->nextPageUrl() }}" class="page-link">Next<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M6.4 18L5 16.6L9.575 12L5 7.4L6.4 6l6 6l-6 6Zm6.6 0l-1.4-1.4l4.575-4.6L11.6 7.4L13 6l6 6l-6 6Z"/></svg></a></li>
        @else
            <li class="page-item disabled">Next <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M6.4 18L5 16.6L9.575 12L5 7.4L6.4 6l6 6l-6 6Zm6.6 0l-1.4-1.4l4.575-4.6L11.6 7.4L13 6l6 6l-6 6Z"/></svg></span></li>
        @endif
    </ul>
  </div>
</section>

@endsection
