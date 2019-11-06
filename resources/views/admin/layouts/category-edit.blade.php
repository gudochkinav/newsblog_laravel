<div class="col-lg-4 text-lg-center">
    <h2>Edit category</h2>
</div>
<div class="col-lg-8">
    @if (session()->has('message'))
    <div class="alert alert-info alert-dismissable"> 
        <a class="panel-close close" data-dismiss="alert">×</a>
        {{ session()->get('message') }}
    </div>
    @elseif (session()->has('errors'))
    <div class="alert alert-info alert-danger"> 
        <a class="panel-close close" data-dismiss="alert">×</a>
        {{ session()->get('errors')->first() }}
    </div>
    @endif
</div>
<div class="col-lg-4 text-lg-center">
</div>
<div class="col-lg-8 push-lg-4 personal-info">
    <form action="{{ route('admin.category_update', $category->id) }}" enctype="multipart/form-data" method="POST" role="form">
        {{ csrf_field() }}
        <div class="form-group row">
            <label class="col-lg-3 col-form-label form-control-label">Name</label>
            <div class="col-lg-9">
                <input name="name" class="form-control" type="text" value="{{ $category->name }}" />
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label form-control-label"></label>
            <div class="col-lg-9">
                <input type="submit" class="btn btn-primary" value="Save" />
                <input onclick="back()" type="button" class="btn btn-secondary" value="Cancel">
            </div>
        </div>
    </form>
</div>

<script>
    $(document).ready(function () {
        $('#summernote').summernote();
    });

    function back() {
        window.location = "{{ route('admin.categories') }}";
    }
</script>