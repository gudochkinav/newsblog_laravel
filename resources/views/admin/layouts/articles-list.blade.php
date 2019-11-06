@if (count($articles))
<div class="col-md-12">
    <h4>Articles list</h4>
    <div class="table-responsive">

        <table id="mytable" class="table table-bordred table-striped">

            <thead>
            <th>Active</th>
            <th>Name</th>
            <th>Text</th>
            <th>Category</th>
            <th>Related Articles</th>
            <th>Author</th>
            <th>Preview Image</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Edit</th>
            <th>Delete</th>
            </thead>

            <tbody>
                @foreach($articles as $article)
                <tr>
                    <td>{{ $article->active }}</td>
                    <td>{{ $article->name }}</td>
                    <td>{!! $article->getShortText() !!}</td>
                    <td>{{ $article->category->name }}</td>
                    <td>{{ $article->related_articles }}</td>
                    <td>{{ $article->author }}</td>
                    <td><img style="width: 100px" src="{{ $article->getImageURL() }}"></td>
                    <td>{{ $article->created_at }}</td>
                    <td>{{ $article->updated_at }}</td>
                    <td><a class='btn btn-info btn-xs' href="{{ route('admin.article_edit', $article->id) }}"><span class="glyphicon glyphicon-pencil"></span></a></td>
                    <td><a href="{{ route('admin.article_delete', $article->id) }}" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></a></td>
                </tr>
                @endforeach
            </tbody>

        </table>

        <div class="clearfix"></div>
        {{ $articles->links() }}

    </div>
</div>
@endif

<a style="margin-left: 15px" href="{{ route('admin.article_add') }}" class="btn btn-info">Add article</a>
