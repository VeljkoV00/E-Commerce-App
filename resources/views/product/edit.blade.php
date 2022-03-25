@include('shop.partials.head')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Category</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('products.index') }}" >Go back </a>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data" >
    @method('PUT')
    @csrf

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" value="{{ $product->name }}">
            </div>
        </div>
        <div class="form-group">
            <strong>Price:</strong>
            <input type="text" name="price" class="form-control" placeholder="price"  value="{{ $product->price }}">
        </div>
        <div class="form-group">
            <strong>Description:</strong>
            <input type="text" name="description" class="form-control" placeholder="description" value="{{ $product->description }}">
        </div>
        <div class="form-group">
            <strong>Image:</strong>
            <input type="file" name="image" class="form-control" placeholder="image"  value="{{ $product->image }}">
        </div>
        <div class="form-group">
            <strong>Category:</strong>
            <select name="category_id" class=" form-control" id="">
                @foreach ($categories as $category )
                <option value="{{ $category->id }}">{{$category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
@include('shop.partials.scripts')