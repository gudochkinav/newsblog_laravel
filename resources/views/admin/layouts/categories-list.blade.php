@if (count($categories))
<div class="col-md-12">
    <h4>Categories list</h4>
    <div class="table-responsive">

        <table id="mytable" class="table table-bordred table-striped">

            <thead>
            <th>Name</th>
            <th>Edit</th>
            <th>Delete</th>
            </thead>

            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td><a class='btn btn-info btn-xs' href="{{ route('admin.category_edit', $category->id) }}"><span class="glyphicon glyphicon-pencil"></span></a></td>
                    <td><a href="{{ route('admin.category_delete', $category->id) }}" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></a></td>
                </tr>
                @endforeach
            </tbody>

        </table>

        <div class="clearfix"></div>
        {{ $categories->links() }}

    </div>
</div>
@endif

<a style="margin-left: 15px" href="{{ route('admin.category_add') }}" class="btn btn-info">Add category</a>
