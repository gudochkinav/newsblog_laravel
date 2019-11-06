@if (count($subscribers))
<div class="col-md-12">
    <h4>Subscribers list</h4>
    <div class="table-responsive">

        <table id="mytable" class="table table-bordred table-striped">

            <thead>
            <th>First Name</th>
            <th>Email</th>
            <th>Status</th>
            <th>Subscription date</th>
            <th>Edit</th>
            <th>Delete</th>
            </thead>

            <tbody>
                @foreach($subscribers as $subscriber)
                <tr>
                    <td>{{ $subscriber->name }}</td>
                    <td>{{ $subscriber->email }}</td>
                    <td>{{ ($subscriber->status == 'On') ? 'On' : 'Off' }}</td>
                    <td>{{ $subscriber->created_at }}</td>
                    <td><a class='btn btn-info btn-xs' href="{{ route('admin.subscriber_edit', $subscriber->id) }}"><span class="glyphicon glyphicon-pencil"></span></a></td>
                    <td><a href="{{ route('admin.subscriber_delete', $subscriber->id) }}" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></a></td>
                </tr>
                @endforeach
            </tbody>

        </table>

        <div class="clearfix"></div>
        {{ $subscribers->links() }}

    </div>
</div>
@endif

<a style="margin-left: 15px" href="{{ route('admin.subscriber_add') }}" class="btn btn-info">Add subscriber</a>