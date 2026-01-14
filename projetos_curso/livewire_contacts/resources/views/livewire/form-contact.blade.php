<div class="card p-5">
    <form wire:submit="new_contact" class="mb-3">
        <div class="mb-3">
            <label for="">Name</label>
            <input type="text" class="form-control" wire:model="name">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="">Email</label>
            <input type="email" class="form-control" wire:model="email">
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="">Phone</label>
            <input type="text" class="form-control" wire:model="phone">
            @error('phone')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="text-end">
            <button class="btn btn-primary px-5">Save</button>
        </div>
    </form>
    <script>
        // escutar as notificações do evento criado dentro da classe de notificação
        window.addEventListener('notification', (event) => {
            let data = event.detail;

            Swal.fire({
                position: data.position,
                title: data.title,
                icon: data.type,
                showConfirmButton: false,
                timer: 2000
            })
        });
    </script>
</div>
