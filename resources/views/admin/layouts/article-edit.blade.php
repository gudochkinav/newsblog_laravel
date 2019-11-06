<div class="col-lg-4 text-lg-center">
    <h2>Edit article</h2>
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
    <form action="{{ route('admin.article_update', $article->id) }}" enctype="multipart/form-data" method="POST" role="form">
        {{ csrf_field() }}
        <div class="form-group row">
            <label class="col-lg-3 col-form-label form-control-label">Active</label>
            <div class="col-lg-9">
                <select name="active" id="status" class="form-control" size="0">
                    @foreach($article->getActiveStatusesList() as $status)
                        <option value="{{ $status }}" {{ ($status == $article->active) ? "selected" : "" }}>{{ $status }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label form-control-label">Name</label>
            <div class="col-lg-9">
                <input name="name" class="form-control" type="text" value="{{ $article->name }}" />
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label form-control-label">Slug</label>
            <div class="col-lg-9">
                <input disabled class="form-control" type="text" value="{{ $article->slug }}"/>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label form-control-label">Related Articles</label>
            <div class="col-lg-9">
                <input name="related_articles" class="form-control" type="text" value="{{ $article->related_articles }}"/>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label form-control-label">Category</label>
            <div class="col-lg-9">
                <select name="category_id" id="status" class="form-control" size="0">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ ($category->id == $article->category_id) ? "selected" : "" }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label form-control-label">Author</label>
            <div class="col-lg-9">
                <input name="author" class="form-control" type="text" value="{{ $article->author }}"/>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label form-control-label">Description</label>
            <div class="col-lg-9">
                <textarea name="text" id="summernote" class="form-control" type="text">{!! $article->getText() !!}</textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label form-control-label">Image</label>
            <div class="col-lg-9">
                @if ($article->getImageURL())
                <div class="row">
                    <div class="col-lg-12">
                        <img style="width: 100px" src="{{ $article->getImageURL() }}"/>
                    </div>
                </div>
                <br>
                @endif
                <div class="row">
                    <div class="col-lg-12">
                        <input name="image" type="file">
                    </div>
                </div>
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
        window.location = "{{ route('admin.articles') }}";
    }
</script>