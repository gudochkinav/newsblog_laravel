@if (count($testimonials))
<div class="col-md-12">
    <h4>Testimonials list</h4>
    <div class="table-responsive">

        <table id="mytable" class="table table-bordred table-striped">

            <thead>
            <th>Active</th>
            <th>Author Name</th>
            <th>Image</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Edit</th>
            <th>Delete</th>
            </thead>

            <tbody>
                @foreach($testimonials as $testimonial)
                <tr>
                    <td>{{ $testimonial->active }}</td>
                    <td>{{ $testimonial->author_name }}</td>
                    <td><img style="width: 100px" src="{{ $testimonial->getImageURL() }}"></td>
                    <td>{{ $testimonial->created_at }}</td>
                    <td>{{ $testimonial->updated_at }}</td>
                    <td><a class='btn btn-info btn-xs' href="{{ route('admin.testimonial_edit', $testimonial->id) }}"><span class="glyphicon glyphicon-pencil"></span></a></td>
                    <td><a href="{{ route('admin.testimonial_delete', $testimonial->id) }}" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></a></td>
                </tr>
                @endforeach
            </tbody>

        </table>

        <div class="clearfix"></div>
        {{ $testimonials->links() }}

    </div>
</div>
@endif

<a style="margin-left: 15px" href="{{ route('admin.testimonial_add') }}" class="btn btn-info">Add testimonial</a>
