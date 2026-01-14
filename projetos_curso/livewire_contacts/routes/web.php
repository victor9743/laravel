<?php

use App\Livewire\ConfirmDelete;
use App\Livewire\EditContact;
use App\Livewire\MainComponent;
use Illuminate\Support\Facades\Route;

Route::get('/', MainComponent::class)->name("home");
Route::get('/delete-contact/{id}', ConfirmDelete::class)->name("confirm_delete");
Route::get('/edit-contact/{id}', EditContact::class)->name("edit_contact");
