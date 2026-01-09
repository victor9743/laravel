<div>
    <form wire:submit="submit_form">
        <input wire:model="name" type="text" id="name" placeholder="Name">
        <input wire:model="email" type="email" id="email" placeholder="Email">
        <button>Submit</button>
    </form>

    <div>
        name
        <br>
        {{ $name }}
    </div>

    <div>
        Email
        <br>
        {{ $email }}
    </div>
</div>
