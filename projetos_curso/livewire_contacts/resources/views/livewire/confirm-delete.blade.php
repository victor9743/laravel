<div>
    <div class="text-center">
        <p>Do you really want to delete this contact?</p>
        <p>Name: {{ $contact->name }}</p>
        <p>Email: {{ $contact->email }}</p>
        <p>Phone: {{ $contact->phone }}</p>

        <button wire:click="cancel" class="btn btn-primary px-5">No</button>
        <button wire:click="delete" class="btn btn-danger px-5">Yes</button>
    </div>
</div>
