<div class="col-lg-4 text-lg-center">
    <h2>Edit testimonial</h2>
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
    <form action="{{ route('admin.portfolio_update', $portfolio->id) }}" enctype="multipart/form-data" method="POST" role="form">
        {{ csrf_field() }}
        <div class="form-group row">
            <label class="col-lg-3 col-form-label form-control-label">Active</label>
            <div class="col-lg-9">
                <select name="active" id="status" class="form-control" size="0">
                    @foreach($portfolio->getActiveStatusesList() as $status)
                    <option value="{{ $status }}" {{ ($status == $portfolio->active) ? "selected" : "" }}>{{ $status }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label form-control-label">Image</label>
            <div class="col-lg-9">
                @if ($portfolio->getImageURL())
                <div class="row">
                    <div class="col-lg-12">
                        <img style="width: 100px" src="{{ $portfolio->getImageURL() }}"/>
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
    function back() {
        window.location = "{{ route('admin.portfolio') }}";
    }
</script>