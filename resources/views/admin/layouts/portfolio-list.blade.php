@if (count($portfolio))
<div class="col-md-12">
    <h4>Portfolio list</h4>
    <div class="table-responsive">

        <table id="mytable" class="table table-bordred table-striped">

            <thead>
            <th>Active</th>
            <th>Name</th>
            <th>Image</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Edit</th>
            <th>Delete</th>
            </thead>

            <tbody>
                @foreach($portfolio as $item)
                <tr>
                    <td>{{ $item->active }}</td>
                    <td>{{ $item->name }}</td>
                    <td><img style="width: 100px" src="{{ $item->getImageURL() }}"></td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->updated_at }}</td>
                    <td><a class='btn btn-info btn-xs' href="{{ route('admin.portfolio_edit', $item->id) }}"><span class="glyphicon glyphicon-pencil"></span></a></td>
                    <td><a href="{{ route('admin.portfolio_delete', $item->id) }}" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></a></td>
                </tr>
                @endforeach
            </tbody>

        </table>

        <div class="clearfix"></div>
        {{ $portfolio->links() }}

    </div>
</div>
@endif

<a style="margin-left: 15px; margin-bottom: 30px" href="{{ route('admin.portfolio_add') }}" class="btn btn-info">Add portfolio</a>
