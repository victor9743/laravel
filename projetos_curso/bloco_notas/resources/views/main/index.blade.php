@extends("layouts.main_layout")

    @section("content")
        <div class="mt-5">
            <table class="table table-bordered">
                <thead>
                    <th>#</th>
                    <th>Title</th>
                    <th>Created at.</th>
                    <th>Updated at.</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    @forelse($notes as $note)
                        <tr>
                            <td>{{ $note['id'] }}</td>
                            <td>{{ $note['title'] }}</td>
                            <td>{{ date('Y-m-s H:i:s', strtotime($note['created_at'])) }}</td>
                            <td class="text-center">{{ $note['created_at'] != $note['updated_at'] ? date('Y-m-s H:i:s', strtotime($note['updated_at'])) : "-"}}</td>
                            <td class="d-flex justify-content-center">
                                <a href="{{ route('edit', ['id' => Crypt::encrypt($note['id']) ]) }}" class="btn btn-sm btn-primary mx-2">Edit</a>
                                <form action="{{ route('delete',  ['id' => Crypt::encrypt($note['id']) ]) }}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="btn btn-sm btn-danger">Remove</button>

                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">No notes</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            
            <div class="d-flex justify-content-end">
                <a href="{{ route('new') }}" class="btn btn-sm btn-success">Add Note</a>
            </div>
        </div>
    @endsection
