<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Full Name')
                    ->autofocus()
                    ->autocomplete('name')
                    ->maxLength(255)
                    ->columnSpan(['sm' => 2])
                    ->required(),

                TextInput::make('email')
                    ->label('Email Address')
                    ->email()
                    ->unique(ignoreRecord: true)
                    ->autocomplete('email')
                    ->maxLength(255)
                    ->required(),

                Select::make('role')
                    ->label('Role')
                    ->options([
                        'admin' => 'Admin',
                        'user' => 'User',
                    ])
                    ->native(false)
                    ->searchable()
                    ->required(),

                TextInput::make('password')
                    ->label('Password')
                    ->password()
                    ->revealable()
                    ->confirmed()
                    ->minLength(8)
                    ->maxLength(255)
                    ->dehydrateStateUsing(fn($state) => filled($state) ? Hash::make($state) : null)
                    ->dehydrated(fn($state) => filled($state))
                    ->required(fn(Component $livewire) => $livewire instanceof \Filament\Resources\Pages\CreateRecord)
                    ->helperText('Minimum 8 characters'),

                TextInput::make('password_confirmation')
                    ->label('Confirm Password')
                    ->password()
                    ->revealable()
                    ->maxLength(255)
                    ->required(fn(Component $livewire) => $livewire instanceof \Filament\Resources\Pages\CreateRecord),

            ])->columns([
                'sm' => 1,
                'md' => 2,
                'lg' => 3,
            ]);
    }
}
