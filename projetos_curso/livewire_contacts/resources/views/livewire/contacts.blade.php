<div class="card p-5">
    <div class="d-flex justify-content-between mb-3">
        <div>
            <h3>Contacts</h3>
        </div>
        <div class="d-flex gap-2 align-items-center">
            <span>Search:</span>
            <input type="text" wire:model.live="search" class="form-control form-control-sm">
        </div>
    </div>
    

    @forelse ($contacts as $contact)
        <div class="card p-3 mb-1">
            <div class="row">
                <div class="col">Name: {{ $contact->name }}</div>
                <div class="col">Email: {{ $contact->email }}</div>
                <div class="col">Phone: {{ $contact->phone }}</div>
                <div class="col">
                    <a href="{{ route('edit_contact', ['id' => $contact->id ]) }}" class="btn btn-sm btn-secondary mx-2 col-4">Edit</a>
                    <a href="{{ route('confirm_delete', ['id' => $contact->id ]) }}" class="btn btn-sm btn-danger col-6"> Delete</a>
                </div>
            </div>
        </div>
    @empty
        <div class="card p-3 mb-1">
            <div class="row">
                Nenhum contato encontrado
            </div>
        </div>
        
    @endforelse
    <div>
        {{ $contacts->links() }}
    </div>

    <hr class="m-0 p-0" />
</div>