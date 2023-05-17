@extends('adminPanel.master')
@section('title', 'Dashboard')
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
                                        <a href="{{route('updateBlog',$blog->id)}}" class="btn btn-warning">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                                <path fill="currentColor" d="M5 22q-.825 0-1.413-.588T3 20V6q0-.825.588-1.413T5 4h1V2h2v2h8V2h2v2h1q.825 0 1.413.588T21 6v6h-2v-2H5v10h7v2H5Zm17.125-5L20 14.875l.725-.725q.275-.275.7-.275t.7.275l.725.725q.275.275.275.7t-.275.7l-.725.725ZM14 23v-2.125l5.3-5.3l2.125 2.125l-5.3 5.3H14Z"/>
                                            </svg>
                                        </a>
                                      
                                      <form action="{{route('deleteBlog',$blog->id)}}" method="POST">
                                          @csrf
                                          @method('DELETE')
                                          <button type="submit" class="btn btn-danger">
                                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                                  <path fill="currentColor" d="M7 21q-.825 0-1.413-.588T5 19V6q-.425 0-.713-.288T4 5q0-.425.288-.713T5 4h4q0-.425.288-.713T10 3h4q.425 0 .713.288T15 4h4q.425 0 .713.288T20 5q0 .425-.288.713T19 6v13q0 .825-.588 1.413T17 21H7Zm2-5q0 .425.288.713T10 17q.425 0 .713-.288T11 16V9q0-.425-.288-.713T10 8q-.425 0-.713.288T9 9v7Zm4 0q0 .425.288.713T14 17q.425 0 .713-.288T15 16V9q0-.425-.288-.713T14 8q-.425 0-.713.288T13 9v7Z"/>
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
                    <div class="d-flex justify-content">
                      {{ $blogs->links('pagination::bootstrap-4') }}
      
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>

</section>
  

@endsection