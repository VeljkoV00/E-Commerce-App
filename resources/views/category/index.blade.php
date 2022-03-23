@include('shop.partials.head')

<div class=" container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 class=" mb-5">Category Page </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('categories.create') }}" >Create 
                </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   

    <table  class="table table-bordered table-responsive-lg">
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Manage</th>
          </tr>
        </thead>
        <tbody> 
            @foreach ($categories as $category )
            <tr>
                <th scope="row">{{ $category->name }}</th>
                <td class=" justify-content-center">
                    <a href="{{ route('categories.edit', $category) }}" class="btn btn-success">Edit</a>
                    <form action="{{ route('categories.destroy', $category) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
                
              </tr>
            @endforeach
        </tbody>
      </table>







</div>

@include('shop.partials.scripts')
