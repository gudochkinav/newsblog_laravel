@if (count($services))
<div class="col-md-12">
    <h4>Services list</h4>
    <div class="table-responsive">

        <table id="mytable" class="table table-bordred table-striped">

            <thead>
            <th>Name</th>
            <th>Description</th>
            <th>Image</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Edit</th>
            <th>Delete</th>
            </thead>

            <tbody>
                @foreach($services as $service)
                <tr>
                    <td>{{ $service->name }}</td>
                    <td>{!! $service->getShortDescription() !!}</td>
                    <td><img style="width: 100px" src="{{ $service->getImageURL() }}"></td>
                    <td>{{ $service->created_at }}</td>
                    <td>{{ $service->updated_at }}</td>
                    <td><a class='btn btn-info btn-xs' href="{{ route('admin.service_edit', $service->id) }}"><span class="glyphicon glyphicon-pencil"></span></a></td>
                    <td><a href="{{ route('admin.service_delete', $service->id) }}" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></a></td>
                </tr>
                @endforeach
            </tbody>

        </table>

        <div class="clearfix"></div>
        {{ $services->links() }}

    </div>
</div>
@endif

<a style="margin-left: 15px" href="{{ route('admin.service_add') }}" class="btn btn-info">Add service</a>
