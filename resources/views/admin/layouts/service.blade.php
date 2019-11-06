<style>
    .tox-tinymce {
        height: 300px !important;
    }
</style>
<div class="col-lg-4 text-lg-center">
    <h2>Edit subscriber</h2>
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
    <form action="{{ route('admin.service_update', $service->id) }}" method="POST" enctype="multipart/form-data" role="form">
        {{ csrf_field() }}
        <div class="form-group row">
            <label class="col-lg-3 col-form-label form-control-label">Name</label>
            <div class="col-lg-9">
                <input name="name" class="form-control" type="text" value="{{ $service->name }}" />
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label form-control-label">Icon</label>
            <div class="col-lg-9">
                <input name="icon" class="form-control" type="text" value="{{ $service->icon }}" />
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label form-control-label">Active</label>
            <div class="col-lg-9">
                <select name="active" id="status" class="form-control" size="0">
                    @foreach($service->getActiveStatusList() as $status)
                        <option value="{{ $status }}" {{ ($service->active == $status) ? "selected" : "" }}>{{ $status }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label form-control-label">Description</label>
            <div class="col-lg-9">
                <textarea id="summernote" name="description" class="form-control">{!! $service->description !!}</textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label form-control-label">Image</label>
            <div class="col-lg-9">
                @if ($service->getImageURL())
                <div class="row">
                    <div class="col-lg-12">
                        <img style="width: 100px" src="{{ $service->getImageURL() }}"/>
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
    $(document).ready(function() {
        $('#summernote').summernote();
    });

    function back() {
        window.location = "{{ route('admin.services') }}";
    }
</script>